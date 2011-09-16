<?php
/* Product Test cases generated on: 2011-08-22 20:08:51 : 1314039171*/
App::import('Model', 'Product');

class ProductTestCase extends CakeTestCase {
	var $fixtures = array('app.product', 'app.category', 'app.manufacturer', 'app.image');

	function startTest() {
		$this->Product =& ClassRegistry::init('Product');
	}

	function endTest() {
		unset($this->Product);
		ClassRegistry::flush();
	}

}
?>