<?php
/* Dealers Test cases generated on: 2011-08-22 21:08:40 : 1314039760*/
App::import('Controller', 'Dealers');

class TestDealersController extends DealersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class DealersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.dealer', 'app.user');

	function startTest() {
		$this->Dealers =& new TestDealersController();
		$this->DealersController->constructClasses();
	}

	function endTest() {
		unset($this->Dealers);
		ClassRegistry::flush();
	}

}
?>