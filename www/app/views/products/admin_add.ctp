<div class="products form">
<?php echo $form->create('Product');?>
	<fieldset>
 		<legend><?php __('Add Product');?></legend>
	<?php


		echo $form->input('category_id', $categories);
        
        #echo $form->inputs(array('manufacturer_id' => array('label', 'manufacturers')));
        echo $form->input('manufacturer_id', array(
                 'type' => 'select',
                 'label' => 'Manufacturer',
                )
        );
		echo $form->input('parts_number');
		echo $form->input('name');
		echo $form->input('name_french');
		echo $form->input('description');
		echo $form->input('description_french');
		echo $form->input('detail');
		echo $form->input('detail_french');
		echo $form->input('new');
		echo $form->input('sale');
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