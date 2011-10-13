<?php
	echo $form->create('User',array('action'=>'register'));
	echo $form->input('username');
	echo $form->end('Register');
	
	/*
		<?php
		echo $form->create('User', array('action' => 'register'));
		echo $form->input('username');
		echo $form->input('password');
		echo $form->input('password_confirm', array('type' => 'password'));
		echo $form->submit();
		echo $form->end();
		?>
	ac322523942cc36bd8973701c2078b78b0d89637
	*/
?>