<?php
require_once('dealers_admin_controller.php');
class DealersController extends AdminDealersController {

    var $uses = array('Product', 'Cart', 'Dealer', 'Order');
    #var $uses = array('Order', 'Dealers');
    function beforeFilter(){
        parent::beforeFilter();
        #$this->Auth->allow('*');
        $this->layout = 'default';
    }

    /*
     * Dealer dashboard
     */
	function index(){
        $user_id = AuthComponent::user('id');
        #$cart_contents = $this->Carts->findByUserId('all');
        $new_products = $this->Product->find('all', array('conditions' => array('new' => true)));
        # TODO: We should paginate this result
        $new_products = $this->Product->find('all', array(
                                                         'conditions' => array('new' => true),
                                                         'limit' => 30
                                                    ));
        $cart_items = $this->Cart->find('all', array( 'conditions' => array( 'user_id' => $user_id), ));
        $this->set(compact('cart_items', 'new_products'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Dealer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dealer', $this->Dealer->read(null, $id));
	}

    function edit(){
        // allows edit for currently logged in dealer

        $user_id = AuthComponent::user('id');
        if($user_id != null){
            $dealer = $this->Dealer->find('all', array('conditions' => array('user_id' => $user_id)));

            // if post - save
            if(!empty($this->data)){

                // check if we have a referer saved in the post data - we'll redirect to it
                $referer = $this->data['referer'];
                $this->Dealer->id = $dealer[0]['Dealer']['user_id'];
                if($this->Dealer->save($this->data)){
                    $this->Session->setFlash(__('Settings was saved'));

                    #$this->redirect(array('action' => 'index'));
                    $this->redirect($referer);
                }else{
                    $this->Session->setFlash(__('Settings could not be saved'));
                    $this->redirect(array('action' => 'index'));
                }

            }else if(empty($this->data)){
                // if no post, just display
                // add the referer so we can redirect properly after save
                $this->data = $this->Dealer->read(null, $dealer[0]['Dealer']['id']);
                $this->set('referer', $this->referer());
            }
        }
    }

    /**
     * List a dealers order history
     */
    function orders(){
        $dealer = $this->getCurrentDealer();
        $orders = $this->Order->find('list', array('conditions' => array('dealer_id' => $dealer[0]['Dealer']['id'])));

        $this->set(compact('orders'));
    }

    /**
     * Lists special offers
     * @return void
     */
    function specials(){
        $dealer = $this->getCurrentDealer();
    }

    /**
     * List content of dealers cart content
     * @return void
     */
    function cart(){

    }

    /*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Dealer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Dealer->del($id)) {
			$this->Session->setFlash(__('Dealer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dealer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
    */

    // private methods

    /**
     * Return currently logged in dealer
     * @return void
     */
    private function getCurrentDealer(){
        $user_id = AuthComponent::user('id');
        $dealer = $this->Dealer->find('all', array('conditions' => array('user_id' => $user_id)));
        return $dealer;
    }
}
