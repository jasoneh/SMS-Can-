<h1>Add dealer</h1>

<div class="dealer form">

<?php echo $this->Form->create('Dealer', array('action' => 'edit'));?>
	<fieldset class="module">
 		<legend><?php __('Edit Dealer');?></legend>
    <?
        echo $this->Form->select('user_id', $users);
        echo $this->Html->link('--- [ Add user ] ', array('controller' => 'users', 'action' => 'admin_add'));

        /*
         * Skip Dealer Type, we might not need them in the future
         * TODO: If we need dealer types, fetch code from ./admin_edit.ctp
        */
		echo $this->Form->input('organisation');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('postal');
		echo $this->Form->input('city');
		echo $this->Form->input('province');
		echo $this->Form->input('country');
		echo $this->Form->input('url');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Product.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Product.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dealers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?
/*
<div class="dealers form">
<?php echo $form->create('Dealer');?>
	<fieldset>
 		<legend><?php __('Edit Dealer');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('dealer_type_id');
		echo $this->Form->input('organisation');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('postal');
		echo $this->Form->input('city');
		echo $this->Form->input('province');
		echo $this->Form->input('country');
		echo $this->Form->input('url');
		echo $this->Form->input('active');
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
*/
?>