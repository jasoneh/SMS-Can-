<?php

require_once('orders_admin_controller.php');
class OrdersController extends AdminOrderController{

    public function beforeFilter(){
        parent::beforeFilter();
    }

}