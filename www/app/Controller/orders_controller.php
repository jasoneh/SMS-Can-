<?php

require_once('orders_admin_controller.php');
class OrdersController extends OrdersAdminController{

    public function beforeFilter(){
        parent::beforeFilter();
    }


}