<?php
/**
 * Order main data
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

    public function createNewOrder($order_data){
        echo "Model.Order.createNewOrder " . $order_data;

        print_r($order_data);
        $this->create();
        $this->set($order_data);
        if($this->save()){
            echo "saved successfully";
            return true;
        }else{
            echo "failed dramatically";
            return false;
        }
    }
    /**
     * Create an order from a dealers cart after checkout
     * @param $items
     * @return void
     */
    public function newFromCart($items){

    }

}
