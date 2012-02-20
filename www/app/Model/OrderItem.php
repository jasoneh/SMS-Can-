<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mathias
 * Date: 12/29/11
 * Time: 7:52 PM
 * To change this template use File | Settings | File Templates.
 */
 
class OrderItem extends AppModel{

    public $name = "OrderItem";
    public $useTable = "orders_items";

    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),

        // TODO: This doesn't feel correct, it should be hasOne not belongsTo ?

        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id'
        )
    );



}
