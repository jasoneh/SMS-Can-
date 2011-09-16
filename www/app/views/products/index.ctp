<div id="sidebar">
	<h4>Categories</h4>
	<?php 
		echo $this->renderElement('categories');
	?>
</div>

<div id="main">
	
	<div class="products index">
	<h2><?php __('Featured products');?></h2>
	<p>
	<?php
	echo $paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?></p>

	</div>
	<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Product', true), array('action' => 'add')); ?></li>
			<li><?php echo $html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
			<li><?php echo $html->link(__('List Images', true), array('controller' => 'images', 'action' => 'index')); ?> </li>
			<li><?php echo $html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	
</div>

<div style="clear: both;" />