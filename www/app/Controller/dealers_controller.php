<?php
require_once('dealers_admin_controller.php');
class DealersController extends AdminDealersController {


    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('*');
    }

    /*
     * Dealer dashboard
     */
	function index(){
        $user_id = AuthComponent::user('id');
        #$cart_contents = $this->Carts->findByUserId('all');
        $cart_items = $this->Cart->find('all', array( 'conditions' => array( 'user_id' => $user_id), ));
        $this->set(compact('cart_items'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Dealer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dealer', $this->Dealer->read(null, $id));
	}

	function add() {
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

	function edit($id = null) {
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

	function delete($id = null) {
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
