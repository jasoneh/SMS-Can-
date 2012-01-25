<?php

/**
 * Handles the contact form
 */
App::uses('CakeEmail', 'Network/Email');
class ContactsController extends AppController{

    public function beforeFilter(){
        parent::beforeFilter();
    }

    #public $helpers = array('Email');

    /**
     * User submits the contact form
     * @return void
     */
    public function add(){

        if($this->request->is('post')){
            try{
                $email = new CakeEmail();
                $email->config('default');

                $this->Contact->set($this->data);
                if($this->Contact->validates()){
                        $email->to('webmaster@example.com');
                        $email->subject('Contact msg from ' .$this->data['Contact']['name'] );
                        $email->from = $this->data['Contact']['email'];
                        $email->send($this->data['Contact']['details']);
                }

            }catch(Exception $e){
                    $error = "Error occured, SMTP is not configured properly";
                    $this->set(compact('error'));
                }

        }
    }
}