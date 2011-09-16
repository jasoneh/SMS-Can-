
<div id="main">
	
	<div class="products index">
	<h2><?php __('Featured products');?></h2>
	<ul>
	<?php foreach ($data as $key => $value): ?>
		<li>
			<a href="id=<?php echo $value['Product']['id']?>"><?php echo $value['Product']['description'] ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
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
	<?php
	/*
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Product', true), array('action' => 'add')); ?></li>
			<li><?php echo $html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
			<li><?php echo $html->link(__('List Images', true), array('controller' => 'images', 'action' => 'index')); ?> </li>
			<li><?php echo $html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	*/
	?>
	
</div>

<div style="clear: both;" />