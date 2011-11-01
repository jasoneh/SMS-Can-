
<?php
    #echo $this->Session->flash('auth');
    echo $this->Form->create('User',array('action'=>'login'));
    echo $this->Form->input('username');
    echo $this->Form->label('password', 'Password');
	echo $this->Form->password('password', array('label' => 'password'));
	echo $this->Form->end('Login');
	
