<?php
/* Manufacturer Test cases generated on: 2011-08-22 20:08:00 : 1314039120*/
App::import('Model', 'Manufacturer');

class ManufacturerTestCase extends CakeTestCase {
	var $fixtures = array('app.manufacturer', 'app.product', 'app.category', 'app.image');

	function startTest() {
		$this->Manufacturer =& ClassRegistry::init('Manufacturer');
	}

	function endTest() {
		unset($this->Manufacturer);
		ClassRegistry::flush();
	}

}
?>