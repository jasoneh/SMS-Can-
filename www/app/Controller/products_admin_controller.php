<?php
/*
 * Admin action
 * ProductsAdminController is extended by the ProductsController
 */

class ProductsAdminController extends AppController{

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

        // What fields do we want to display?
        $fields = array('*', );

        # TODO: Order products by name, not description (change db-table name?)
        $order = 'Product.description ASC';
        if($category_id){
            $this->paginate = array(
                        'conditions' => array('Product.category_id' => $category_id),
                        'fields' => $fields,
                        'order' => $order);
        }else{
            $this->paginate = array('fields' => $fields,'order' => $order);
        }
        $products = $this->paginate('Product');

		$this->set(compact('products', 'category'));

        $log = $this->Product->getDataSource()->getLog(false, false);
        #debug($log);

    }


    function admin_view($id=null){
        $this->layout = 'admin';
        $product = $this->Product->findById($id);
		$this->set(compact('product'));
    }


    public function admin_add(){

        $this->layout = 'admin';
        if($this->request->is('post') && !empty($this->data)){
            // save
            echo "saving";
            if($this->Product->save($this->data)){
                // retrieve id from this product
                $id = $this->Product->id;
                $this->Session->setFlash(__("Product saved successfully"));
                // redirect to edit page for this product
                $this->redirect(array('controller' => 'products', 'action' => 'admin_edit', $id));
                exit();
            }
        }else{
            //
            $manufacturers = $this->Manufacturer->find('list');
            $categories = $this->Category->find('list');
            $scissors_categories = $this->ScissorsCategories->find('list');
            $this->set(compact('manufacturers', 'categories', 'scissors_categories'));
        }
    }
    /**
     * Allow admins to edit existing products
     * @param $id product id
     * @return void
     */
    public function admin_edit($id=null){
        $this->layout = 'admin';
        $this->Product->id = $id;

        # GET request
        if($this->request->is('get')){
            # fetch product from DB
            $this->request->data = $this->Product->read();

            # set the category list
            $this->request->data['Category'] =  $this->Category->find('list', array('fields' => array('id', 'description')));

            # TODO: Find out why $this->ScissorsCategory->find() ends up with errors
            $this->request->data['ScissorsCategory'] = $this->Product->ScissorsCategory->find('list', array('fields' => array('id', 'name')));

            $this->request->data['Manufacturer'] = $this->Manufacturer->find('list', array('fields' => array('id', 'name')));

        }else if($this->request->is('post')){
            if($this->Product->save($this->request->data)){
                $this->Session->setFlash('Product was saved successfully');
                $this->redirect(array('action' => 'admin_index'));
                exit();
            }else{
                $this->Session->setFlash('Could not save Product');
            }
        }
    }

    function admin_delete($id = null){
        $product = $this->Product->findById($id);
        if($this->Product->delete($id)){
            $this->Session->setFlash('Product ' .$id. ' deleted successfully');
            $this->redirect(array('controller' => 'products', 'action' => 'index', ));
            exit();
        }
    }


function old_admin_add(){

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

}