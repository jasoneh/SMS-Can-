<?php
/* Manufacturers Test cases generated on: 2011-08-22 21:08:15 : 1314039795*/
App::import('Controller', 'Manufacturers');

class TestManufacturersController extends ManufacturersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ManufacturersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.manufacturer', 'app.product', 'app.category', 'app.image');

	function startTest() {
		$this->Manufacturers =& new TestManufacturersController();
		$this->ManufacturersController->constructClasses();
	}

	function endTest() {
		unset($this->Manufacturers);
		ClassRegistry::flush();
	}

}
?>