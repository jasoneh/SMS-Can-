<?php
/* User Test cases generated on: 2011-08-22 21:08:32 : 1314039632*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $fixtures = array('app.user');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function endTest() {
		unset($this->User);
		ClassRegistry::flush();
	}

	function testCheckUser() {

	}

	function testCheckUsernameExist() {

	}

}
?>