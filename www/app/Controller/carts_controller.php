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
/**
 * @property mixed Cart
 */
class CartsController extends AdminCartsController {

	var $name = 'Carts';

	var $helpers = array('Html', 'Session', );
    var $components = array('Auth', 'Session',);
    var $uses = array('Auth', 'Product', 'Cart', );
	#var $scaffold;

	// Allow following actions to non logged in users
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('view', 'all', 'count_and_sum'));
        #$this->Auth->allow('*');
    }

    /* Show cart details from Session  - called from elements/cart.ctp */
	function all($user_id = null){
        $user_id = AuthComponent::user('id');
        $cart_items = $this->Cart->find('all', array( 'conditions' => array( 'user_id' => $user_id), ));
        return $cart_items;
	}

    /**
     * Count number of items in the cart and calculate the sum
     * TODO: Make this function more generic by possibly moving it into the model
     * @return array
     */
    public function count_and_sum(){
        $user_id = AuthComponent::user('id');
        $cart_items = $this->Cart->find('all', array( 'conditions' => array( 'user_id' => $user_id), ));
        $sum = $count = 0;

        foreach($cart_items as $item){
//            $sum += $item['Product']['price'];
            if(is_numeric($item['Product']['price'])){
                $sum += $item['Product']['price'];
                $count+=$item['Cart']['qty'];
            }
        }
        return array(
            'nof_items' => $count,
            'sum' => $sum
        );
    }
    /*
     * Add product or edit existing cart entry if one exists
     */
    public function add(){
        # we can assert there is a user_id since user must be logged in to visit this page
        $user_id = AuthComponent::user('id');

        # TODO: Assert that dealer is allowed to place an order
        # if($this->Dealer->allowedToOrder($user_id));

        if($this->request->is('post') && !empty($this->data)){
            $product = $this->Product->findById($this->data['Carts']['product_id']);
            $product_id = $product['Product']['id'];

            if(!empty($product)){
                // Fetch the id of the cart entry we want to update. If no cart entry exists we'll add a new entry
                $cart_id = $this->Cart->find(
                    'list',
                    array(
                        'conditions' => array(
                            'product_id' => $product_id,
                            'user_id' => $user_id
                        ),
                        'fields' => array('id'))); // We only want the id of the cart
                $quantity = $this->validate_quantity($this->data['Carts']['qty']);
                // In case we got more than one entries from the db for this particular cart, get the first one
                // TODO: We need a cron job or similar to delete all duplicate entries
                if(sizeof($cart_id) > 1){
                    $cart_id = array_slice($cart_id, 0, 1);
                }
                if(empty($cart_id)){
                    // If this product isn't in the cart, add a new entry
                    $this->add_new_entry($product_id, $user_id, $quantity);
                }else{
                    // If this product is in the cart, update the entry
                    $this->update_entry($cart_id, $product_id, $user_id, $quantity);
                }
            }
        }
        # we're done, lets direct back to the page we came from
        $this->redirect($this->referer());
    }


    public function remove($id=null){
        // TODO: Allow user to remove a quantity of items
        $user_id = AuthComponent::user('id');
        $items_to_delete = $this->Cart->find('list', array('conditions' => array('user_id' => $user_id, 'product_id' => $id)));
        foreach($items_to_delete as $key => $value){
            if($this->Cart->delete($key)){
                $this->Session->setFlash(__('Item(s) removed from cart'));
            }
        }
        return false;
    }



    private function validate_quantity($quantity){
        if(is_numeric($quantity)){
            if($quantity > 100000){
                $quantity = 100000;
            }else if($quantity < 0){
                $quantity = 0;
            }
        }else{
            $quantity = 0;
        }
        return $quantity;
    }

    private function add_new_entry($product_id, $user_id, $quantity){
        // cart item does not exist, create a new row
        $cart_data =array( 'user_id' => $user_id, 'product_id' => $product_id, 'qty' => $quantity);
        if($this->Cart->save($cart_data)){
            $this->Session->setFlash(__('Product added to cart'));
            return true;
        }
        return false;
    }

    private function update_entry($cart_id, $product_id, $user_id, $quantity){
        $this->Cart->id = $cart_id;
        $save_data = array('user_id' => $user_id, 'product_id' => $product_id, 'qty' => $quantity );
        if($this->Cart->save($save_data)){
            $this->Session->setFlash(__('Product updated in cart'));
            return true;
        }

        return false;
    }

    /**
     * Show the contents of a customer cart
     * @return void
     */
    public function show(){

        $user_id = AuthComponent::user('id');
        $items = $this->Cart->find('all', array('conditions' => array(
                                                    'user_id' => $user_id),
                                                'fields' => array(
                                                    'id', 'user_id', 'qty',
                                                    'Product.id',
                                                    'Product.parts_number',
                                                    'Product.name', 'Product.description',
                                                    'Product.price'
                                                )
                                          ));

        $total_quantity = 0;
        $total_cost = 0;
        $n_items = array('Items' => array(), 'Meta' => array());   #this holds the final data
        foreach($items as $key => $item){
            $row_cost = $item['Product']['price'] * $item['Cart']['qty'];
            $total_cost+=$row_cost;

            # copy data to new array
            $n_items['Items'] += array($key => $item);
            # Add the cost for this item to the array
            $n_items['Items'][$key] += array('Meta' => array(
                'cost' => $row_cost
            ));
            $total_quantity += $item['Cart']['qty'];
        }

        $meta = array('total_cost' => $total_cost, 'total_quantity' => $total_quantity);
        $n_items['Meta'] = $meta;

        $items = $n_items;
        $n_items = null;
        #echo "<pre>"; echo "<br/>"; print_r($items); echo "</pre>";
        $this->set(compact('items'));

    }

    public function deleterow($id=null){
        echo "deleting a single row from the cart";

    }
    /**
     * Customer checks out ordered goods
     * @return void
     */
    public function checkout(){

    }
}
