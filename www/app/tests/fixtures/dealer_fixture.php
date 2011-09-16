<?php
/* Dealer Fixture generated on: 2011-08-22 20:08:04 : 1314039064 */
class DealerFixture extends CakeTestFixture {
	var $name = 'Dealer';

	var $fields = array(
		'id' => array('type'=>'integer', 'type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type'=>'integer', 'type' => 'integer', 'null' => true, 'default' => NULL),
		'organisation' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL),
		'firstname' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'lastname' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 75),
		'email' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 125),
		'phone' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 125),
		'address' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 125),
		'zip' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'city' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'state' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'country' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'url' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'type' => 'datetime', 'null' => true, 'default' => NULL),
		'active' => array('type'=>'boolean', 'type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'organisation' => 'Lorem ipsum dolor sit amet',
			'firstname' => 'Lorem ipsum dolor sit amet',
			'lastname' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'zip' => 'Lorem ipsum dolor ',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet',
			'country' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-08-22 20:51:04',
			'modified' => '2011-08-22 20:51:04',
			'active' => 1
		),
	);
}
?>