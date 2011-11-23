<?php

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class ProductsController extends AppController {

	var $name = 'Products';

	var $helpers = array('Html', 'Session', );
    var $components = array('Auth',);
    var $uses = array('Product', 'Category', 'Manufacturer', 'User', 'DealerType');
	var $scaffold;

	// Allow following actions to non logged in users
    function beforeFilter() {
        $this->Auth->allow(array('index', 'view', 'category',));
    }

	/* List products, paginate them and order by creation */
	/*var $paginate = array(
		'field' => array('Product.id'),
		'limit' => 15,
        'page' => 1,
		'order' => array(
			'Product.created' => 'desc'
		)
	);*/

    public $paginate = array(
        'fields' => array('DISTINCT Product.id', 'Product.name'),
        'limit' => 25,
        'order' => array(
            'Product.created' => 'desc'
        )
    );
	/* Default page, paginates the products */
	function index(){
        $data = $this->paginate('Product');
        $this->set('data', $data);
	}
	
	/* Show product details */
	function view($id = null){

		#$this->session->langue = 'french'; # TODO: Fix session access, changed in cakephp2.x
		$this->set('product', $this->Product->findById($id) );
		
	}

    /**
     * List products by category
     * @param null $category_id
     */
	function category($category_id=null){
        $this->Category->id = $category_id;
        $category_name = $this->Category->field('description');

        /*
        // Get products belonging to given category from db. Use distinct to avoid duplicates. Its the find() method which sometimes pulls out duplicates
        $products = $this->Product->find('all', array(
                          'fields' => array('DISTINCT id', 'name', 'description', 'description_french', 'parts_number', 'price_house', 'price_wholesale'),
                          'conditions' => array('Product.category_id' => $category_id)));
        */

        // Paginate results, products belonging to a given category
        $this->paginate = array(
            'fields' => array('DISTINCT id', 'name', 'description', 'description_french', 'parts_number', 'price_house', 'price_wholesale'),
            'conditions' => array('Product.category_id' => $category_id),
            'order' => array('Product.name ASC'),
            'limit' => 25   # Limit to 25 products per page
        );

        $products = $this->paginate('Product');
        #$user = $this->User->find('all', array('conditions' => array('User.id' => $this->Session->read('Auth.User.id'))));
        # TODO: Move this into a generic function in the app_controller so that we always can check the dealers information
        $user = $this->User->findById($this->Session->read('Auth.User.id'));
        $dealer_type = $this->DealerType->find('list', array('fields' => array('name'), 'conditions' => array('id' => $user['Dealer']['dealer_type_id'])));

        $dealer_type_name = current($dealer_type);  # extract value from array
        $dealer_type_id = key($dealer_type);        # extract key from array

		$this->set(compact('products', 'category_name', 'dealer_type_id', 'dealer_type_name'));

	}


    
    /**
     * Admin controllers
     *
     * */

    function admin_index($category_id=null){
        $category = $this->Category->findById($category_id);
        if($category_id){
            $this->paginate = array(
                        'conditions' => array('Product.category_id' => $category_id),
                        'order' => 'Product.name ASC');
        }else{
            $this->paginate = array(
                        'order' => 'Product.name');
        }
        $products = $this->paginate('Product');
		$this->set(compact('products', 'category'));
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


/*        if(isset($this->Product->data)){
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
				'action' => 'index'
			));
		} // endif*/
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
