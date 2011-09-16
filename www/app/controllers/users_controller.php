<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $scaffold;
    var $helpers = array('Html', 'Form');
    var $components = array('Auth');

	// Allow a non-authed user to register
    function beforeFilter() {
        $this->Auth->allow('register');
    }

	function login(){
		
	}
	function logout(){
		
	}
	
	function register() {
		if (!empty($this->data)) {
		    if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
		        $this->User->create();
		        $this->User->save($this->data);
		        $this->redirect(array('action' => 'index'));
		    }
		}
    }

}
?>