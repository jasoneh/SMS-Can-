<?php

/**
 * ProductsController
 * @author Mathias Tervo
 *
 * This Controller class holds logic for all publicly accessible actions.
 *
 * This class extends ProductsAdminController so that we can put all
 * admin logic in a separate file for cleanliness.
 * This is not the default cakePHP way but makes the code more
 * manageable if/when the controller files grows.
 *
 * Admin Controller functions are found in products_admin_controller.php
 *
 */

# include the admin controller
require_once('products_admin_controller.php');

class ProductsController extends ProductsAdminController {
	var $name = 'Products';

	var $helpers = array('Html', 'Session', );
    var $components = array('Auth',);
    var $uses = array('Product', 'Category', 'Manufacturer', 'User', 'DealerType');
	var $scaffold;

	// Allow following actions to non logged in users
    function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'default';
        $this->Auth->allow(array('index', 'view', 'category',));
    }

    private function customPagination($category_id=null){
        $conditions = array();
        if($category_id != null){
            $conditions = array('Product.category_id' => $category_id);
        }

        $pagination_array = array(
            'fields' => array('DISTINCT id', 'name', 'description', 'description_french', 'parts_number', 'price_house', 'price_wholesale'),
            'conditions' => $conditions,
            'order' => array('Product.created DESC'),
            'limit' => 25   # Limit to 25 products per page
        );

        return $pagination_array;
    }

    private function getDealerType(){
        # TODO: Move this into a generic function in the app_controller so that we always can check the dealers information
        $user = $this->User->findById($this->Session->read('Auth.User.id'));
        $dealer_type = $this->DealerType->find('list', array('fields' => array('name'), 'conditions' => array('id' => $user['Dealer']['dealer_type_id'])));

        $dealer_type_name = current($dealer_type);  # extract value from array
        $dealer_type_id = key($dealer_type);        # extract key from array
        return $dealer_type_id;
    }

	/* Default page, paginates newest products */
	public function index(){
        // Paginate results, products belonging to a given category
        /*
        $this->paginate = array(
            'fields' => array('DISTINCT id', 'name', 'description', 'description_french', 'parts_number', 'price_house', 'price_wholesale'),
            #'conditions' => array('Product.category_id' => $category_id),
            'order' => array('Product.created DESC'),
            'limit' => 25   # Limit to 25 products per page
        );
        */

        $this->paginate = $this->customPagination();
        $products = $this->paginate('Product');
        $this->set(compact('products', 'category'));

	}
	
	/* Show product details */
	public function view($id = null){

		#$this->session->langue = 'french'; # TODO: Fix session access, changed in cakephp2.x
		$this->set('product', $this->Product->findById($id) );
		
	}

    /**
     * List products by category
     * @param null $category_id
     */
	public function category($category_id=null){
        $this->Category->id = $category_id;
        $category_name = $this->Category->field('description');

        $this->paginate = $this->customPagination($category_id);
        $products = $this->paginate('Product');

        
        $dealer_type_id = $this->getDealerType();

		$this->set(compact('products', 'category_name', 'dealer_type_id', 'dealer_type_name'));

	}

}
