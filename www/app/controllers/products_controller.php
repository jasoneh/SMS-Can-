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
	/*
	function list(){
		var $paginate = array(
			'fields' => array('Product.id', 'Product.name'),
			'limit' => 50,
			'order' => array(
				'Product.name' => 'asc'
			)
		);
	}
	*/
	
	
	/* Fetch a product with given ID number, if product doesn't exist, throw an exception and render a 404 page */
	function view($id = null){

		$this->session->langue = 'french';
		$this->set('product', $this->Product->findById($id) );
		
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
