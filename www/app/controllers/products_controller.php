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

    var $uses = array('Product', 'Category', 'Manufacturer');
	var $scaffold;

	// Allow following actions to non logged in users
    function beforeFilter() {
        $this->Auth->allow('*');
    }

	/* List products, paginate them and order by name */
	var $paginate = array(
		'field' => array('Product.id', 'Product.name'),
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

		$this->session->langue = 'french';
		$this->set('product', $this->Product->findById($id) );
		
	}

    /**
     * List products by category
     * @param null $category_id
     */
	function category($category_id=null){
        $this->Category->id = $category_id;
        $category_name = $this->Category->field('description');

		$products = $this->paginate('Product',
                                    array('Product.category_id' => $category_id),
                                    array('order' => 'Product.name')
        );
		$this->set(compact('products', 'category_name'));
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
