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
        $order = $this->Order->find('all', array(
                    'conditions' => array(
                        'dealer_id' => $dealer[0]['Dealer']['id'],
                        'Order.id' => $id
                    ),
                    'recursive' => 3));
        $order_status = 1;
        /*$this->OrderStatus->find('list', array(
                   'conditions' => array(
                       'id' => $order[0]['Order']['order_status_id']
                   )));              */
        $this->set(compact('order', 'order_status'));
    }
}