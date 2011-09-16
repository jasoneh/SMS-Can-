<?php
/* User Fixture generated on: 2011-08-22 21:08:32 : 1314039632 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type'=>'integer', 'type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'username' => array('type'=>'string', 'type' => 'string', 'null' => false, 'default' => NULL),
		'password' => array('type'=>'string', 'type' => 'string', 'null' => false, 'default' => NULL),
		'last_login' => array('type'=>'datetime', 'type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

	var $records = array(
		array(
			'id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'last_login' => '2011-08-22 21:00:32'
		),
	);
}
?>