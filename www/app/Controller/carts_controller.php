<?php

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
require_once('carts_admin_controller.php');
/**
 * @property mixed Cart
 */
class CartsController extends AdminCartsController {

	var $name = 'Carts';
	var $helpers = array('Html', 'Session', );
    var $components = array('Auth', 'Session',);
    var $uses = array('Auth', 'Product', 'Cart', 'Dealer', 'Order', 'OrderItem', 'OrderStatus');
	#var $scaffold;

	// Allow following actions to non logged in users
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('view', 'all', 'count_and_sum'));
        #$this->Auth->allow('*');
    }

    /* Show cart details from Session  - called from elements/cart.ctp */
	function all($user_id = null){
        $user_id = AuthComponent::user('id');
        $cart_items = $this->Cart->find('all', array( 'conditions' => array( 'user_id' => $user_id), ));
        return $cart_items;
	}

    /**
     * Count number of items in the cart and calculate the sum
     * TODO: Make this function more generic by possibly moving it into the model
     * @return array
     */
    public function count_and_sum(){
        $user_id = AuthComponent::user('id');
        $cart_items = $this->Cart->find('all', array( 'conditions' => array( 'user_id' => $user_id), ));
        $sum = $count = 0;

        foreach($cart_items as $item){
//            $sum += $item['Product']['price'];
            if(is_numeric($item['Product']['price'])){
                $sum += $item['Product']['price'];
                $count+=$item['Cart']['qty'];
            }
        }
        return array(
            'nof_items' => $count,
            'sum' => $sum
        );
    }
    /*
     * Add product or edit existing cart entry if one exists
     */
    public function add(){
        # we can assert there is a user_id since user must be logged in to visit this page
        $user_id = AuthComponent::user('id');

        # TODO: Assert that dealer is allowed to place an order
        # if($this->Dealer->allowedToOrder($user_id));

        if($this->request->is('post') && !empty($this->data)){
            $product = $this->Product->findById($this->data['Carts']['product_id']);
            $product_id = $product['Product']['id'];

            if(!empty($product)){
                // Fetch the id of the cart entry we want to update. If no cart entry exists we'll add a new entry
                $cart_id = $this->Cart->find(
                    'list',
                    array(
                        'conditions' => array(
                            'product_id' => $product_id,
                            'user_id' => $user_id
                        ),
                        'fields' => array('id'))); // We only want the id of the cart
                $quantity = $this->validate_quantity($this->data['Carts']['qty']);
                // In case we got more than one entries from the db for this particular cart, get the first one
                // TODO: We need a cron job or similar to delete all duplicate entries
                if(sizeof($cart_id) > 1){
                    $cart_id = array_slice($cart_id, 0, 1);
                }
                if(empty($cart_id)){
                    // If this product isn't in the cart, add a new entry
                    $this->add_new_entry($product_id, $user_id, $quantity);
                }else{
                    // If this product is in the cart, update the entry
                    $this->update_entry($cart_id, $product_id, $user_id, $quantity);
                }
            }
        }
        # we're done, lets direct back to the page we came from
        $this->redirect($this->referer());
    }


    public function remove($id=null){
        // TODO: Allow user to remove a quantity of items
        $user_id = AuthComponent::user('id');
        $items_to_delete = $this->Cart->find('list', array('conditions' => array('user_id' => $user_id, 'product_id' => $id)));
        foreach($items_to_delete as $key => $value){
            if($this->Cart->delete($key)){
                $this->Session->setFlash(__('Item(s) removed from cart'));
            }
        }
        return false;
    }



    private function validate_quantity($quantity){
        if(is_numeric($quantity)){
            if($quantity > 100000){
                $quantity = 100000;
            }else if($quantity < 0){
                $quantity = 0;
            }
        }else{
            $quantity = 0;
        }
        return $quantity;
    }

    private function add_new_entry($product_id, $user_id, $quantity){
        // cart item does not exist, create a new row
        $cart_data =array( 'user_id' => $user_id, 'product_id' => $product_id, 'qty' => $quantity);
        if($this->Cart->save($cart_data)){
            $this->Session->setFlash(__('Product added to cart'));
            return true;
        }
        return false;
    }

    private function update_entry($cart_id, $product_id, $user_id, $quantity){
        $this->Cart->id = $cart_id;
        $save_data = array('user_id' => $user_id, 'product_id' => $product_id, 'qty' => $quantity );
        if($this->Cart->save($save_data)){
            $this->Session->setFlash(__('Product updated in cart'));
            return true;
        }

        return false;
    }

    /**
     * Show the contents of a customer cart
     * @return void
     */
    public function show(){
        $items = $this->get_cart_contents();

        $this->set(compact('items'));

    }

    /**
     * This method is called from cart_contents.ctp
     * @return array|null
     */
    public function content(){

        $items = $this->get_cart_contents();
        return $items;
    }

    public function delete_row($id=null){
        if(!$id){
            $this->Session->setFlash(__('Invalid id for item', true));
        }
        if($this->dealer_owns_cart_item($id)){
            if($this->Cart->delete($id)){
                $this->Session->setFlash(__("Item(s) was removed", true));
            }else{
                $this->Session->setFlash(__("Could not remove item(s) from cart"));
            }
        }
        $this->redirect(array('controller' => 'carts', 'action' => 'index'));
    }

    /**
     * Customer checks out ordered goods
     * TODO: Allow the dealer to set his/her preferred shipping method
     * @return void
     */
    public function checkout(){

        $user_id = AuthComponent::user('id');
        $dealer = $this->Dealer->find('all', array('conditions' => array('user_id' => $user_id)));
        $dealer = $dealer[0];
        $items = $this->get_cart_contents();

        // if no items in cart, redirect user back to previous page
        if(!sizeof($items['Items']) > 0){
            $this->Session->setFlash('You cannot checkout with an empty cart');
            $this->redirect($this->referer());
        }

        if($this->request->is('post')){
            /*
             * Send email notification to SMScanada
             * Send email notification to dealer about recently checked out goods
             * Store cart state as order list in DB
             */
            if($this->create_order_instance($items)){

                $this->purge_cart_contents($dealer['Dealer']['id']);
                $this->send_success_email($items);
                $this->Session->setFlash('Your order was placed successfully');
                $this->redirect(array('controller' => 'carts', 'action' => 'complete'));
            }else{
                $this->Session->setFlash('Order was not placed. Something went wrong');
                $this->redirect(array('controller' => 'carts', 'action' => 'checkout'));
            }
        }

        $this->set(compact('items', 'dealer'));
    }


    /**
     * Checkout has been completed successfully
     * This page shall show information on the purchase
     * @return void
     */
    public function complete(){
        // TODO: Move this into a generic place, such as the AppController
        $user_id = AuthComponent::user('id');
        $dealer = $this->Dealer->find('all', array('conditions' => array('user_id' => $user_id)));
        if(!empty($dealer)){
            $order = $this->Order->find('all', array(
                'conditions' => array('dealer_id' => $dealer[0]['Dealer']['id']),
                'order' => array('Order.created' => 'DESC'),
                'limit' => 1,
                'recursive' => 2));

            $this->set(compact('order'));
        }
    }


    // PRIVATE MEMBER FUNCTIONS

    private function dealer_owns_cart_item($id){
        # TODO: Fix this method
        $user_id = AuthComponent::user('id');
        $cart_items = $this->Cart->find('list', array( 'conditions' => array('id' => $id, 'user_id' => $user_id)));
        if(!empty($cart_items)){
            return true;
        }
        return false;
    }

    /**
     * Returns the contents from
     * @return array|null
     */
    private function get_cart_contents(){

        $user_id = AuthComponent::user('id');
        $dealer = $this->Dealer->find('list', array('conditions' => array('user_id' => $user_id)));
        $items = $this->Cart->find('all', array('conditions' => array(
                                                    'user_id' => $user_id),
                                                'fields' => array(
                                                    'id', 'user_id', 'qty',
                                                    'Product.id',
                                                    'Product.parts_number',
                                                    'Product.name', 'Product.description',
                                                    'Product.price'
                                                )
                                          ));

        $total_quantity = 0;
        $total_cost = 0;
        $n_items = array('Items' => array(), 'Meta' => array());   #this holds the final data
        foreach($items as $key => $item){
            $row_cost = $item['Product']['price'] * $item['Cart']['qty'];
            $total_cost+=$row_cost;

            # copy data to new array
            $n_items['Items'] += array($key => $item);
            # Add the cost for this item to the array
            $n_items['Items'][$key] += array('Meta' => array(
                'cost' => $row_cost
            ));
            $total_quantity += $item['Cart']['qty'];
        }

        $dealer_id = $dealer_email = "";
        foreach($dealer as $key => $value){
            $dealer_id = $key;
            $dealer_email = $value;
        }

        $meta = array(
            'total_cost' => $total_cost,
            'total_quantity' => $total_quantity,
            'dealer' => array(
                'id' => $dealer_id,
                'email' => $dealer_email
            )
        );
        $n_items['Meta'] = $meta;

        $items = $n_items;
        $n_items = null;
        #echo "<pre>"; echo "<br/>"; print_r($items); echo "</pre>";
        return $items;
    }


    /**
     * Delete users current cart contents
     * @return bool
     */
    private function purge_cart_contents($dealer_id){
        $cart_items = $this->Cart->find('all', array('conditions' => array('user_id' , $dealer_id)));
        foreach($cart_items as $item){
            $this->Cart->delete($item['Cart']['id']);
        }
        return true;
    }


    /**
     * Create an order from a dealers cart upon checkout
     * @param $items
     * @return bool
     */
    private function create_order_instance($items){

        // First we create a record in the 'orders' table.
        // This table holds information on a particular order.
        // Items are stored as individual rows in the 'order_items' table
        $order_status = $this->OrderStatus->find('list', array('conditions' => array('id' => 1)));

        $order_id = null;
        $order_keys = array_keys($order_status);
        $order_id = $order_keys[0];

        $this->Order->create(array('Order' => array(
                                 'dealer_id' => $items['Meta']['dealer']['id'],
                                 'order_status_id' => $order_id,
                             )));

        if($this->Order->save()){

            // Saving all the individual items in the Cart to the 'order_items' table
            foreach($items['Items'] as $key => $value){
                $order_item = array(
                    'order_id' => $this->Order->id,
                    'product_id' => $value['Product']['id'],
                    'qty' => $value['Cart']['qty'],
                    'price_per_unit' => $value['Product']['price'],
                    'created' => '',
                    'modified' => ''
                );
                $this->OrderItem->create($order_item);
                $this->OrderItem->save();

            }
            return true;
        }
        return false;
    }

    /**
     * Upon successful checkout, send a confirmation email to the dealer
     * @param $items
     * @return void
     */
    private function send_success_email($items){

        App::uses('CakeEmail', 'Network/Email');
        $body = "<pre> Thank you for placing your order with us! <br/> </pre>\n" . $items;

        // TODO: Store this data in the database and allow admins to make changes to data.
        $email = new CakeEmail();
        $email->from(array('purchase@smscanada.com' => 'SMS-Canada'));
        $email->to('mathias.tervo@gmail.com');
        $email->subject('Thank you for your order - Merci pour votre commande');
        $email->send($body);

    }

}
