<h1>Add product</h1>
<?php
#echo "categories"; print_r($categories);
?>
<div class="products form">

<?php echo $this->Form->create('Product', array('action' => 'add'));?>
	<fieldset class="module">
 		<legend><?php __('Add Product');?></legend>
  <?php echo $this->Form->input('parts_number'); ?>

        <label for="category_id">Category</label>
  <?php echo $this->Form->select('category_id', $categories); ?>

        <label for="scissors_category_id">Scissors Category</label>
  <?php echo $this->Form->select('scissors_category_id', $scissors_category); ?>

        <label for="manufacturer_id">Manufacturer</label>
  <?php echo $this->Form->select('manufacturer_id', $manufacturers); ?>

    <?php
		echo $this->Form->input('price'); # TODO: Prices shall merge into one singular price setting
		echo $this->Form->input('name');
		echo $this->Form->input('name_french');
		echo $this->Form->input('description');
		echo $this->Form->input('detail');
		echo $this->Form->input('detail_french');
		echo $this->Form->input('new');
		echo $this->Form->input('sale');
		
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
