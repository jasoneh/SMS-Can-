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

	var $scaffold;
	
	/* List products, paginate them and order by name */
	var $paginate = array(
		'field' => array('Product.id', 'Product.name'),
		'limit' => 50,
		'order' => array(
			'Product.name' => 'asc'
		)
	);
	
	/* Default page, paginates the products */
	function index(){
		echo "products.index()";
		$data = $this->paginate('Product');
		$this->set('data', $data);
	}
	
	/* Show product details */
	function view($id = null){

		$this->session->langue = 'french';
		$this->set('product', $this->Product->findById($id) );
		
	}
	
	/**
	*	List products by category
	**/
	function category($category_id=null){
		$products = $this->paginate('Product', array('Product.category_id' => $category_id));
		$this->set('products', $products);
	}
	
	/*var $uses = array();*/
/*
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', $path));
	}
	*/
/*	
	function index(){
		
	}
*/
	/*
	function add(){
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
				'action' => 'index'
			));			
		} // endif
	}
	*/
}
