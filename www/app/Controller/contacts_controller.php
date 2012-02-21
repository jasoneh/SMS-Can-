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
        if($this->data){

            $this->Contact->set($this->data);

            $from = $this->data['Contact']['email'];
            $name = $this->data['Contact']['name'];
            $message = $this->data['Contact']['text'];

            // TODO: Fix validation on this data
            App::uses('CakeEmail', 'Network/Email');

            // TODO: Store this data in the database and allow admins to make changes to data.
            $email = new CakeEmail();
            $email->from(array($from => $name));
            $email->to('mathias.tervo@gmail.com');
            $email->subject('Contact Form - SMSCanada.com');
            $email->send($message);

            $this->Session->setFlash('Thank you for your message!');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));

        }
    }

    public function add_old(){

        App::uses('CakeEmail', 'Network/Email');
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