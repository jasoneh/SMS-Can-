<?php

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
require_once('carts_admin_controller.php');
class CartsController extends AdminCartsController {

	var $name = 'Carts';

	var $helpers = array('Html', 'Session', );
    var $components = array('Auth', 'Session',);
    var $uses = array('Auth', 'Product', 'Cart', );
	var $scaffold;

	// Allow following actions to non logged in users
    function beforeFilter() {
        parent::beforeFilter();
        #$this->Auth->allow(array('view', 'add', 'all'));
        $this->Auth->allow('*');
    }

	/* Default page, paginates the products */
	/*function index(){
        #echo "hej";
		$data = $this->Paginate('Product');
		$this->set('data', $data);
	}*/
	
	/* Show cart details from Session  - called from elements/cart.ctp */
	function all($user_id = null){
		return $this->Session->read('cart');
	}

    /*
     * Add product or edit existing cart entry if one exists
     */
    public function add(){
        $user_id = AuthComponent::user('id');
        /** Add this product to session */

        if(!empty($this->data)){
            // we have data, lets save it
            #print_r($this->data);

            // check that the requested product exists
            $product = $this->Product->findById($this->data['Carts']['product_id']);
            if(!empty($product)){
                /*$item_in_cart = $this->Cart->find('all', array(
                                                           'fields' => array('id', 'user_id', 'product_id', 'qty'),
                                                           'conditions' => array(
                                                                'user_id' => $user_id,
                                                                'product_id' => $product['Product']['id'])));*/

                $cart_id = $this->Cart->find('list', array(
                                                    'conditions' => array(
                                                        'product_id' => $product['Product']['id'],
                                                        'user_id' => $user_id
                                                    ),
                                                    'fields' => array('id')
                                                               ));
                #echo "cart_id <pre>"; print_r($cart_id); echo "</pre>";
                // TODO: Clean the quantity field for numerics only

                $quantity = $this->data['Carts']['qty'];

                if(!empty($cart_id)){
                    #echo "product exists, update existing one";

                    // since we're updating we need the id for this particular item
                    
                    $this->Cart->read(null, $cart_id[1]);
                    $this->Cart->set(array(
                                             'user_id' => $user_id,
                                             'product_id' => $product['Product']['id'],
                                             'qty' => $quantity
                                     ));
                    if($this->Product->validates()){
                        $this->Cart->save();
                        $this->Session->setFlash(__('Product added to cart'));
                    }
                }else{
                    // cart item does not exist, create a new row
                    $cart_data =array(

                            'user_id' => $user_id,
                            'product_id' => $product['Product']['id'],
                            'qty' => $this->data['Carts']['qty']
                        
                    );
                    if($this->Cart->save($cart_data)){
                        $this->Session->setFlash(__('Product added to cart'));
                    }

                }
            }else{
                // product doesn't exist in database
                $this->Session->setFlash(__('You tried to add a non-existing product. Please try again'));
            }
            $this->redirect($this->referer());
        }
    }


    function remove($product_id){
        // TODO: calculate and set quantity
        echo "removing ". $product_id;
    }


}
