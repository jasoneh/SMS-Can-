<div class="dealers form">
<?php echo $form->create('Dealer');?>
	<fieldset>
 		<legend><?php __('Edit Dealer');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('dealer_type_id');
		echo $form->input('organisation');
		echo $form->input('firstname');
		echo $form->input('lastname');
		echo $form->input('email');
		echo $form->input('phone');
		echo $form->input('address');
		echo $form->input('postal');
		echo $form->input('city');
		echo $form->input('province');
		echo $form->input('country');
		echo $form->input('url');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Dealer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Dealer.id'))); ?></li>
		<li><?php echo $html->link(__('List Dealers', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>