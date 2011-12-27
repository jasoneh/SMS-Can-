<?php

/**
 * Handles the contact form
 */

class ContactsController extends AppController{

    public function beforeFilter(){
        parent::beforeFilter();
    }

    /**
     * User submits the contact form
     * @return void
     */
    public function add(){
        if($this->request->is('post')){
            $this->Contact->set($this->data);
            if($this->Contact->validates()){
                $this->Email->to('webmaster@example.com');
                $this->Email->subject('Contact msg from ' .$this->data['Contact']['name'] );
                $this->Email->from = $this->data['Contact']['email'];
                $this->Email->send($this->data['Contact']['details']);
            }
        }
    }
}