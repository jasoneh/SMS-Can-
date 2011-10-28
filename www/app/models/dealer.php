<?php
class Dealer extends AppModel {
	var $name = 'Dealer';
	var $displayField = 'email';
	var $validate = array(
		'created' => array(
			'date' => array('rule' => array('date')),
		),
		'modified' => array(
			'date' => array('rule' => array('date')),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'DealerType' => array(
            'className' => 'DealerType',
            'foreignKey' => 'dealer_type_id',
            'conditions' => '',
            'fields' => '',
			'order' => ''
        )
	);

}
?>