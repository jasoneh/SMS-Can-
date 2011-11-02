<?php
class AppController extends Controller {

    var $components = array('Auth', 'Session');

    function beforeFilter(){
        echo "before filter";
		$this->_checkAdmin();

        $this->_setLanguage();
	}

    function _checkAdmin(){
        if(isset($this->params['prefix']) && $this->params['prefix'] == 'admin'){
			$this->layout = 'admin';
		}
    }
    /**
     * Determine the language from the URL as specified in app/Config/core.php
     * Configure::write('Config.language', 'eng');
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
