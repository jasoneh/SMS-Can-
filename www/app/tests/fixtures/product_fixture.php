<?php
/* Product Fixture generated on: 2011-08-22 20:08:50 : 1314039170 */
class ProductFixture extends CakeTestFixture {
	var $name = 'Product';

	var $fields = array(
		'id' => array('type'=>'integer', 'type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'category_id' => array('type'=>'integer', 'type' => 'integer', 'null' => true, 'default' => NULL),
		'manufacturer_id' => array('type'=>'integer', 'type' => 'integer', 'null' => false, 'default' => NULL),
		'parts_number' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 25),
		'name' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 125),
		'name_french' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 75),
		'description' => array('type'=>'text', 'type' => 'text', 'null' => true, 'default' => NULL),
		'description_french' => array('type'=>'text', 'type' => 'text', 'null' => true, 'default' => NULL),
		'detail' => array('type'=>'text', 'type' => 'text', 'null' => true, 'default' => NULL),
		'detail_french' => array('type'=>'text', 'type' => 'text', 'null' => true, 'default' => NULL),
		'new' => array('type'=>'boolean', 'type' => 'boolean', 'null' => true, 'default' => NULL),
		'sale' => array('type'=>'boolean', 'type' => 'boolean', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

	var $records = array(
		array(
			'id' => 1,
			'category_id' => 1,
			'manufacturer_id' => 1,
			'parts_number' => 'Lorem ipsum dolor sit a',
			'name' => 'Lorem ipsum dolor sit amet',
			'name_french' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'description_french' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'detail_french' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'new' => 1,
			'sale' => 1,
			'created' => '2011-08-22 20:52:50',
			'modified' => '2011-08-22 20:52:50'
		),
	);
}
?>