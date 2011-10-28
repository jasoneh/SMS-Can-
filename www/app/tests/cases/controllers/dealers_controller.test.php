<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'Europe/Berlin' for 'CEST/2.0/DST' instead in /Users/mathias/Sites/SMS-Can-/www/cake/console/templates/default/classes/test.ctp on line 22
/* Dealers Test cases generated on: 2011-10-29 00:10:27 : 1319840727*/
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

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>