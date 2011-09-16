<?php
/* Users Test cases generated on: 2011-08-22 21:08:55 : 1314039835*/
App::import('Controller', 'Users');

class TestUsersController extends UsersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UsersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.user');

	function startTest() {
		$this->Users =& new TestUsersController();
		$this->UsersController->constructClasses();
	}

	function endTest() {
		unset($this->Users);
		ClassRegistry::flush();
	}

}
?>