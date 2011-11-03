<?php
/*
echo $this->Form->create('User',array('action'=>'register'));
	echo $this->Form->input('username');
	echo $this->Form->end('Register');
*/
		echo $this->Form->create('User', array('action' => 'register'));
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirm', array('type' => 'password'));
		echo $this->Form->submit();
		echo $this->Form->end();
		?>
	ac322523942cc36bd8973701c2078b78b0d89637

?>