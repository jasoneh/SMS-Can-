<?php


class AdminDealersController extends AppController{

    var $helpers = array('Html', 'Form');
    #var $uses = array('Dealer', 'Product', 'Cart', );
    public $components = array('Auth');

    /*public $paginate = array(
        'Dealer' => array(
            'limit' => 25,
            'order' => array('name' => 'asc')
        )
    );*/

    public function beforeFilter(){

        parent::beforeFilter();

    }

    private function customPagination($dealer_type_id=null){
        $conditions = array();
        if($dealer_type_id != null){
            $conditions = array('Dealer.dealer_type_id' => dealer_type_id);
        }

        $pagination_array = array(
            #'fields' => array('DISTINCT id', 'name', 'description', 'description_french', 'parts_number', 'price', ),
            'conditions' => $conditions,
            'order' => array('Dealer.email DESC'),
            'limit' => 25   # Limit to 25 products per page
        );
        return $pagination_array;
    }

    function admin_index($category_id=null){

        $this->layout = 'admin';
        // What fields do we want to display?
        $fields = array('*', );

        # TODO: Order dealers by name
        $order = 'Dealer.name ASC';
        #$this->paginate = array('fields' => $fields,'order' => $order);

        #$this->paginate('Dealer', array(), array('name', 'email'));

        $this->paginate = array(
            'Dealers' => array(
                'limit' => 20,
                'order' => array('name' => 'desc'),
                #'group' => array('week', 'home_team_id', 'away_team_id')
            )
        );

        $dealers = $this->paginate('Dealer');
		$this->set(compact('dealers'));


        #$log = $this->Dealer->getDataSource()->getLog(false, false);
        #debug($log);


    }

    function old_admin_index() {

        $this->paginate = $this->customPagination();
        $dealers = $this->paginate('Dealer');

		$this->set(compact('dealers'));
	}

	function admin_view($id = null) {
        $this->layout = 'admin';

		if (!$id) {
			$this->Session->setFlash(__('Invalid Dealer', true));
			$this->redirect(array('action' => 'index'));
		}
        $dealer = $this->Dealer->read(null, $id);
        $orders = $this->Order->find('list', array('conditions' => array('dealer_id' => $dealer['Dealer']['id'])));
		$this->set(compact('dealer', 'orders'));
	}


    public function admin_add(){

        $this->layout = 'admin';
        if($this->request->is('post') && !empty($this->data)){
            // save
            if($this->Dealer->save($this->data)){
                // retrieve id from this dealer
                $id = $this->Dealer->id;
                $this->Session->setFlash(__("Dealer saved successfully"));
                // redirect to edit page for this dealer
                $this->redirect(array('controller' => 'Dealers', 'action' => 'admin_edit', $id));
                exit();
            }
        }else{
            $users = $this->Dealer->User->find('list', array('fields' => array('id', 'username'), 'conditions' => array('role' => 'dealer')));
            $this->set(compact('users'));
        }
    }

    public function admin_edit($id=null){

        $this->layout = 'admin';
        $this->Dealer->id = $id;

        # GET request
        if($this->request->is('get')){
            # fetch product from DB
            $this->request->data = $this->Dealer->read();
            $this->request->data['User'] = $this->Dealer->User->find('list', array('fields' => array('id', 'username')));
            $this->request->data['DealerType'] = $this->Dealer->DealerType->find('list', array('fields' => array('id', 'name')));

        }else if($this->request->is('post')){
            if($this->Dealer->save($this->request->data)){
                $this->Session->setFlash('Dealer was saved successfully');
                $this->redirect(array('controller' => 'dealers', 'action' => 'admin_edit', $id ));
                exit();
            }else{
                $this->Session->setFlash('Could not save Dealer');
            }
        }
    }



	function admin_delete($id = null) {
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


    function old_admin_add() {
        if (!empty($this->data)) {
            $this->Dealer->create();
            if ($this->Dealer->save($this->data)) {
                $this->Session->setFlash(__('The Dealer has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Dealer could not be saved. Please, try again.', true));
            }
        }
        $users = $this->Dealer->User->find('list');
        $this->set(compact('users'));
    }

    function old_admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Dealer', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Dealer->save($this->data)) {
                $this->Session->setFlash(__('The Dealer has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Dealer could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Dealer->read(null, $id);
        }
        $users = $this->Dealer->User->find('list');
        $this->set(compact('users'));
    }

}