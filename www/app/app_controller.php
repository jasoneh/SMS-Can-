<?php
class AppController extends Controller{
	
	var $components = ('Acl', 'Auth');

	function beforeFilter() {
		//Configure AuthComponent
		$this->Auth->authorize = 'actions';
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'notes', 'action' => 'index');
	}
}
