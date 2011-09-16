<?php
/* Images Test cases generated on: 2011-08-22 21:08:09 : 1314039789*/
App::import('Controller', 'Images');

class TestImagesController extends ImagesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ImagesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.image', 'app.product', 'app.category', 'app.manufacturer');

	function startTest() {
		$this->Images =& new TestImagesController();
		$this->ImagesController->constructClasses();
	}

	function endTest() {
		unset($this->Images);
		ClassRegistry::flush();
	}

}
?>