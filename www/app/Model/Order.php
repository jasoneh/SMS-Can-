<?php
/**
 * User: mathias
 */

class Order extends AppModel{
    var $name = 'Order';
    var $displayField = 'dealer_id';
    var $useTable = 'orders';

    var $validate = array(
        'created' => array(
            'date' => array('rule' => array('date')),
        )
    );

    var $belongsTo = array(
        /*
         * This is semantically correct but not sure if we need this here since
         * it pulls up the user for every cart entry.
         */

        'Dealer' => array(
            'className' => 'Dealer',
            'foreignKey' => 'dealer_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id'
        ),
        'OrderStatus' => array(
            'className' => 'OrderStatus',
            'foreignKey' => 'order_status_id'
        ),
    );

    var $hasMany = array(
        'OrderItem' => array(
            'className' => 'OrderItem',
            'foreignKey' => 'order_id'
        )
    );
}
