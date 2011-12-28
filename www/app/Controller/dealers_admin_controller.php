<?php

class AdminDealersController extends AppController{
    var $name = 'Dealers';
    var $helpers = array('Html', 'Form');
    var $uses = array('Dealer', 'Product', 'Cart', );
    public $components = array('Auth');

    public function beforeFilter(){
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    private function customPagination($dealer_type_id=null){
        $conditions = array();
        if($dealer_type_id != null){
            $conditions = array('Dealer.dealer_type_id' => dealer_type_id);
        }

        $pagination_array = array(
            #'fields' => array('DISTINCT id', 'name', 'description', 'description_french', 'parts_number', 'price', ),
            'conditions' => $conditions,
            'order' => array('Dealer.email DESC'),
            'limit' => 25   # Limit to 25 products per page
        );
        return $pagination_array;
    }

    function admin_index() {

        $this->paginate = $this->customPagination();
        $dealers = $this->paginate('Dealer');

		$this->set(compact('dealers'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Dealer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dealer', $this->Dealer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Dealer->create();
			if ($this->Dealer->save($this->data)) {
				$this->Session->setFlash(__('The Dealer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Dealer could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Dealer->User->find('list');
		$this->set(compact('users'));
	}


    public function admin_edit($id=null){

        $this->Dealer->id = $id;

        # GET request
        if($this->request->is('get')){
            # fetch product from DB
            $this->request->data = $this->Dealer->read();
            $this->request->data['User'] = $this->Dealer->User->find('list', array('fields' => array('id', 'username')));
            $this->request->data['DealerType'] = $this->Dealer->DealerType->find('list', array('fields' => array('id', 'name')));

        }else if($this->request->is('post')){
            if($this->Dealer->save($this->request->data)){
                $this->Session->setFlash('Dealer was saved successfully');
                $this->redirect(array('controller' => 'dealers', 'action' => 'admin_edit', $id ));
                exit();
            }else{
                $this->Session->setFlash('Could not save Dealer');
            }
        }
    }


	function old_admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Dealer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Dealer->save($this->data)) {
				$this->Session->setFlash(__('The Dealer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Dealer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Dealer->read(null, $id);
		}
		$users = $this->Dealer->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Dealer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Dealer->del($id)) {
			$this->Session->setFlash(__('Dealer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dealer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}