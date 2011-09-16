<?php
/* Image Test cases generated on: 2011-06-19 15:06:09 : 1308491649*/
App::import('Model', 'Image');

class ImageTestCase extends CakeTestCase {
	var $fixtures = array('app.image');

	function startTest() {
		$this->Image =& ClassRegistry::init('Image');
	}

	function endTest() {
		unset($this->Image);
		ClassRegistry::flush();
	}

}
?>