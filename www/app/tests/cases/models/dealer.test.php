<?php
/* Dealer Test cases generated on: 2011-08-22 20:08:06 : 1314039066*/
App::import('Model', 'Dealer');

class DealerTestCase extends CakeTestCase {
	var $fixtures = array('app.dealer', 'app.user');

	function startTest() {
		$this->Dealer =& ClassRegistry::init('Dealer');
	}

	function endTest() {
		unset($this->Dealer);
		ClassRegistry::flush();
	}

}
?>