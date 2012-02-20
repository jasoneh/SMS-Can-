<?php

class OrdersAdminController extends AppController{

    var $uses = array('Order', 'Dealers');
    #var $components = array('Dealer', );

    public function beforeFilter(){
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    private function pd($name=null, $array){
        echo "<pre>";
        echo $name."<br/>";
        print_r($array);
        echo "</pre>";
    }
    public function admin_index(){
        echo "admin_index <br/>";
        echo "list of all orders <br/>";

        $dealer = $this->Dealers->findById(2);
        $this->pd('dealer', $dealer);

        $orders = $this->Order->findById(1);
        $this->pd('orders', $orders);

    }

    public function admin_view($id=null){
        $orders = $this->Order->findById($id);
        $this->pd('orders', $orders);
        $this->set(compact('orders'));
    }
}