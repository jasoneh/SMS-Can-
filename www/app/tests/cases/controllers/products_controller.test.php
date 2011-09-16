<?php
/* Products Test cases generated on: 2011-08-22 21:08:24 : 1314039804*/
App::import('Controller', 'Products');

class TestProductsController extends ProductsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProductsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.product', 'app.category', 'app.manufacturer', 'app.image');

	function startTest() {
		$this->Products =& new TestProductsController();
		$this->ProductsController->constructClasses();
	}

	function endTest() {
		unset($this->Products);
		ClassRegistry::flush();
	}

}
?>