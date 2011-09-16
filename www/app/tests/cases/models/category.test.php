<?php
/* Category Test cases generated on: 2011-08-22 20:08:30 : 1314038910*/
App::import('Model', 'Category');

class CategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.category', 'app.product', 'app.manufacturer', 'app.image');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function endTest() {
		unset($this->Category);
		ClassRegistry::flush();
	}

}
?>