<?php

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class CartsController extends AppController {

	var $name = 'Carts';

	var $helpers = array('Html', 'Session', );
    var $components = array('Auth',);
    var $uses = array('Product', );
	var $scaffold;

	// Allow following actions to non logged in users
    function beforeFilter() {
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

    function add($product_id){
        /** Add this product to session */
        $this->Session->write('cart', $product_id);
        $this->redirect($this->referer());
    }
    function remove($product_id){
        echo "removing ". $product_id;
    }

    

    /**
     * Admin controllers
     *
     * */

    function admin_index(){
        $products = $this->paginate('Product',
                                    array('Product.category_id' => $category_id),
                                    array('order' => 'Product.name')
        );
		$this->set(compact('products', 'category_name'));
    }


    function admin_add(){
        // on POST
        if(!empty($this->data)){
            if($this->Product->save($this->data)){
                 //Set a session flash message and redirect.
                $this->Session->setFlash("Product added successfully!");
            }
        }else{
            $categories = $this->Category->find('list');
            $manufacturers = $this->Manufacturer->find('list');
            $this->set(
                compact('manufacturers', 'categories')
            );
        }
    }

    function admin_edit($id=null){
        if(empty($this->data)){
            $this->data = $this->Product->findById($id);
        }else{
            if(isset($this->Product->data)){
                $this->Product->set($this->data);
                if($this->Product->validates()){
                    if($this->Product->save()){
                        $this->Session->setFlash('Product saved successfully');
                    }
                }else{
                    $errors = $this->Product->invalidFields();
                    $this->Session->setFlash(implode(',', $errors));
                }

                // redirect to the product index page
                $this->redirect(array(
                    'controller' => 'products',
                    'action' => 'edit',
                    $id
                ));
            } // endif
        }
    }

    function admin_delete($id = null){
        $product = $this->Product->findById($id);
        if($this->Product->delete($id)){
            $this->Session->setFlash('Product ' .$id. ' deleted successfully');
            $this->redirect(array(
                  'controller' => 'products',
                  'action' => 'index',
                            ));
        }
    }
}
