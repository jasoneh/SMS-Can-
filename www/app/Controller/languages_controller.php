<?php

class LanguagesController extends AppController{

    public function beforeFilter(){
        parent::beforeFilter();
    }

    public function toggle(){
        $language_code = $this->Session->read('lang');
        if($language_code == 'en'){
            $language_code = 'fr';
        }else if($language_code == 'fr'){
            $language_code = 'en';
        }else{
            // default value
            $language_code = 'en';
        }
        $this->Session->write('lang', $language_code);
        $this->redirect($this->referer());
    }
}