<?php

class UsersController extends AppController {

    var $components = array('Auth');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*'); // Letting users register themselves
    }

    /**
     * Handle user role and redirect to admin site if admin
     * @return void
     */
    public function index() {
        if($this->Auth->user('role') == 'admin'){
            $this->redirect('/admin/products/');
            exit();
        }else{
            $this->redirect('/dealers/');
            exit();
        }
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
                exit();
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
                exit();
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action'=>'index'));
            exit();
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
        exit();
    }


    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect('/users/'));
            exit();
        } else {
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
        exit();
    }

    /**
     * Checking if a user is logged in to present login/logout link in top menu
     * called from elements/login_logout.ctp
     * @return void
     */
    public function loggedin(){
        return $this->Auth->user('username');
    }

    /*
     *  Redirect to the ordinary login page
     */
    public function admin_login(){
        $this->redirect('/users/login');
    }
    /*
     * Redirect to ordinary logout
     */
    public function admin_logout(){
        $this->logout();
    }
}





class OldUsersController extends AppController {

	var $name = 'Users';
	var $scaffold;
    var $helpers = array('Html', 'Form');
    var $components = array('Auth');
    var $uses = array('User', );

	// Allow a non-authed user to register
    function beforeFilter() {
        $this->Auth->allow('*');
    }

    /**
     * CakePHP handles the login functionality for us
     * @return void
     */
	function login(){
        echo "logogoog";
		if($this->Auth->login($this->data)){
            $this->redirect('/');
        }else{
            echo "on horsone!";
            $this->Session->setFlash('Something was wrong');
        }
	}
	function logout(){
		$this->redirect($this->Auth->logout());
	}
	
	function register_old() {
		if (!empty($this->data)) {
		    if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
		        $this->User->create();
		        $this->User->save($this->data);
		        $this->redirect(array('action' => 'index'));
		    }
		}
    }

    public function register() {
        if ($this->User->save($this->request->data)) {
            $this->Auth->login($this->request->data['User']);
            $this->redirect('/users/home');
        }
    }
    /**
     * @return void
     */
    function register_blah() {
        if (!empty($this->data)) {
            if(!$this->usernameExists($this->data['User']['username'])){
                if($this->User->save($this->data)){
                    $this->Session->setFlash('Your account was saved successfully');
                    # Successful registration, login user and redirect to user home
                    $this->Auth->login($this->data);
                    $this->redirect(array('controller' => 'users', 'action' => 'index'));
                }
            }else{
                $this->Session->setFlash('Your requested username already exists', 'default', array('class' => 'error'));
                $this->redirect(array('controller' => 'users', 'action' => 'register'));
            }
        }
    }
    /**
     * Admin controllers
     */

    function usernameExists($username){
        $username_check = $this->User->findByUsername($username);
        if(empty($username_check)){
            return false;
        }
        return true;
    }
    
    function admin_login(){
        
    }


    function admin_add(){

    }
}
