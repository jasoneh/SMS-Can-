<?php
class AppController extends Controller {

    var $components = array('Auth', 'Session');

    function beforeFilter(){
		if(isset($this->params['prefix']) && $this->params['prefix'] == 'admin'){
			$this->layout = 'admin';
		}
	}

}
?>