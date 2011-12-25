<?php

class ProductsAdminController extends AppController{

    /*
     * Admin controllers
     * Is extended by the ProductsController
     */

    function beforeFilter(){
        parent::beforeFilter();
    }

    /**
     * Lists products
     * @param null $category_id
     * @return void
     */
    function admin_index($category_id=null){
        $this->layout = 'admin';
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


    function admin_view($id=null){
        $this->layout = 'admin';
        $product = $this->Product->findById($id);
		$this->set(compact('product'));
    }


    function admin_add(){
        // on POST
        $this->layout = 'admin';
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

    /**
     * Allow admins to edit existing products
     * @param $id product id
     * @return void
     */
    function admin_edit($id=null){
        $this->layout = 'admin';
        $this->Product->id = $id;

        # GET request
        if($this->request->is('get')){
            # fetch product from DB
            $this->request->data = $this->Product->read();

            # set the category list
            $this->request->data['Category'] = $this->Category->find(
                'list', array('fields' => array('id', 'description'))
            );
            $this->request->data['Manufacturer'] = $this->Manufacturer->find(
                'list', array('fields' => array('id', 'name'))
            );            
        }else if($this->request->is('post')){
            if($this->Product->save($this->request->data)){
                $this->Session->setFlash('Product was saved successfully');
                $this->redirect(array('action' => 'admin_edit', $id));
            }else{
                $this->Session->setFlash('Could not save Product');
            }
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