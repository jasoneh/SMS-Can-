admin_login.ctp


<?php
    #echo $this->Session->flash('auth');
    echo $form->create('User',array('action'=>'login'));


	echo $form->input('username');

    echo $form->label('password', 'Password');
	echo $form->password('password', array('label' => 'password'));
	echo $form->end('Login');

?>
