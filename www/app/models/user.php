<?php
class User extends AppModel {
	var $name = 'User';
	var $validate = array(
		'password' => array(
			'notempty' => array('rule' => array('notempty')),
		),
		'last_login' => array(
			'date' => array('rule' => array('date')),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasOne = array(
		'Dealer' => array(
			'className' => 'Dealer',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>