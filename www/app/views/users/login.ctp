users/login.ctp
<?php
    #echo $this->Session->flash('auth');
    echo $form->create('User',array('action'=>'login'));
	echo $form->input('username');
	echo $form->password('password');
	echo $form->end('Login');
	
?>
