<?php
class DealersController extends AppController {

	var $name = 'Dealers';
	var $helpers = array('Html', 'Form');
    var $uses = array('Carts');
    /*
     * Dealer dashboard
     */
	function index() {
        $cart_contents = $this->Carts->findByUserId('list');
        $this->set(compact('cart_contents'));
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
	function admin_index() {
		$this->Dealer->recursive = 0;
		$this->set('dealers', $this->paginate());
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

	function admin_edit($id = null) {
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
