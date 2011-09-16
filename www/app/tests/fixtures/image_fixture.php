<?php
/* Image Fixture generated on: 2011-06-19 15:06:09 : 1308491649 */
class ImageFixture extends CakeTestFixture {
	var $name = 'Image';

	var $fields = array(
		'id' => array('type'=>'integer', 'type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'product_id' => array('type'=>'integer', 'type' => 'integer', 'null' => true, 'default' => NULL),
		'filename' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL),
		'caption' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

	var $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'filename' => 'Lorem ipsum dolor sit amet',
			'caption' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>