<?php
class AppController extends Controller {

    public $components = array(
        'Session',
        #'Auth' => array(
        #    'loginRedirect' => array('controller' => 'products', 'action' => 'index'),    # Causes redirect loop
        #    'logoutRedirect' => array('controller' => 'products', 'action' => 'display', 'home')
        #)
    );

    function s__construct(){
        parent::construct();
        $this->beforeFilter();
    }

    public function beforeFilter(){
        $this->_checkUser();
        $this->_checkAdmin();
        #$this->_setLanguage();

	}

    private function _checkUser(){
        // TODO: If we need some custom checking on the user we can do it here
        #echo $this->Auth->user('username');
    }
    private function _checkAdmin(){
        # TODO: changing layou doesn't seem to work in AppController, set it in each admin_action in controllers instead
        if(isset($this->params['prefix']) && $this->params['prefix'] == 'admin'){
            $this->layout = 'admin';
		}else{
            $this->layout = 'default';
        }
    }
    /**
     * Determine the language from the URL as specified in app/Config/core.php
     * Configure::write('Config.language', 'eng');
     * TODO: Refactor this , make it good
     * @return void
     */
    private function _setLanguage(){
        #echo "Set language";
        # TODO: This function breaks, go through it again when needed
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        }else if (isset($this->params['language']) && ($this->params['language'] !=  $this->Session->read('Config.language'))){
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }

    }

}
