<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User');?></legend>
	<?php

		echo $form->input('username');
		echo $form->input('password');
		
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Products', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Images', true), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>