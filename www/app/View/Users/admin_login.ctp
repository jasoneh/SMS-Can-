View/Users/admin_login.ctp
<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User',array('action'=>'login'));
    echo $this->Form->input('username');
    echo $this->Form->password('password', null, array('label' => 'password'));
	echo $this->Form->end('Login');

?>
