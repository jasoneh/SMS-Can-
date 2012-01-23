<?php

require_once('orders_admin_controller.php');
class OrderController extends AdminOrderController{

    public function beforeFilter(){
        parent::beforeFilter();
    }

}