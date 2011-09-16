<?php
/* Categories Test cases generated on: 2011-08-22 21:08:31 : 1314039751*/
App::import('Controller', 'Categories');

class TestCategoriesController extends CategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CategoriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.category', 'app.product', 'app.manufacturer', 'app.image');

	function startTest() {
		$this->Categories =& new TestCategoriesController();
		$this->CategoriesController->constructClasses();
	}

	function endTest() {
		unset($this->Categories);
		ClassRegistry::flush();
	}

}
?>