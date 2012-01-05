<?php

class OrderStatus extends AppModel{

    public $useTable = 'orders_status';

    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_status_id'
        )
    );

}
