<?php

class Cart extends AppModel {

    var $name = 'Cart';
    var $displayField = 'product_id';
    var $validate = array(
        'created' => array(
            'date' => array('rule' => array('date')),
        )
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        /*
         * This is semantically correct but not sure if we need this here since
         * it pulls up the user for every cart entry.
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),*/
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'order' => 'Product.name ASC'
        )
    );


}