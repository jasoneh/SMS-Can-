<?php
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        )
    );

    function beforeFilter(){
        echo "beforefilter";
        $this->_checkUser();
        $this->_checkAdmin();
        $this->_setLanguage();
	}

    function _checkUser(){
        echo $this->Auth->user('username');
    }
    function _checkAdmin(){
        if(isset($this->params['prefix']) && $this->params['prefix'] == 'admin'){
			$this->layout = 'admin';
		}
    }
    /**
     * Determine the language from the URL as specified in app/Config/core.php
     * Configure::write('Config.language', 'eng');
     * TODO: Refactor this , make it good
     * @return void
     */
    function _setLanguage(){
        echo "Set language";
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        }else if (isset($this->params['language']) && ($this->params['language'] !=  $this->Session->read('Config.language'))){
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }
    }

}
