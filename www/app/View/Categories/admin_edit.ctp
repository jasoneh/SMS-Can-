<h1>Edit category</h1>

<div class="categories form">

<?php echo $this->Form->create('Category', array('action' => 'edit'));?>
	<fieldset>
 		<legend><?php __('Edit Category');?></legend>
        id::
    <?php
        echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('description_fr');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Category.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Category.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dealers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
