<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mathias
 * Date: 12/25/11
 * Time: 4:38 PM
 * To change this template use File | Settings | File Templates.
 */
 
class AdminCartsController extends AppController{

    function beforeFilter(){
        parent::beforeFilter();
    }


    /**
     * Admin controllers
     *
     * */

    function admin_index(){
        #$this->layout = 'admin';
        $order = 'Cart.id ASC';
        $this->paginate = array('order' =>$order);
        $carts = $this->Paginate('Cart');
		$this->set(compact('carts'));
    }


    function admin_add(){
        #$this->layout = 'admin';
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
        #$this->layout = 'admin';
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