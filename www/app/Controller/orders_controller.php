<?php

require_once('orders_admin_controller.php');
class OrdersController extends OrdersAdminController{

    public function beforeFilter(){
        parent::beforeFilter();
        $this->layout = 'default';
    }


    /**
     * Shows the currently logged in dealers order history
     * @return void
     */
    public function show($id){

        #$dealer = $this->Order->Dealer->getCurrentDealer();
        $dealer = AppController::getCurrentDealer();
        $order = $this->Order->find('all', array('conditions' => array('dealer_id' => $dealer[0]['Dealer']['id'])));
        $this->set(compact('order'));
    }
}