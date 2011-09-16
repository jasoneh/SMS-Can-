<div class="images form">
<?php echo $form->create('Image');?>
	<fieldset>
 		<legend><?php __('Edit Image');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('product_id');
		echo $form->input('filename');
		echo $form->input('caption');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Image.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Image.id'))); ?></li>
		<li><?php echo $html->link(__('List Images', true), array('action' => 'index'));?></li>
	</ul>
</div>