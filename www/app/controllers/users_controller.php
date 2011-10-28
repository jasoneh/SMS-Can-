<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $scaffold;
    var $helpers = array('Html', 'Form');
    var $components = array('Auth');

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
            $this->Session->setFlash('Something was wrong');
        }
	}
	function logout(){
		#$this->redirect($this->Auth->logout());
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

    /**
     * @return void
     */
    function register() {
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
    
}
