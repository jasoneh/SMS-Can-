<div id="sidebar">
	<h4>Products by Category</h4>
	<?php 
		#echo $this->renderElement('categories');
	?>
</div>

<div id="main">
	<div class="products view">
	<h2><?php  __('Products by category');?></h2>
	<ul>
	<?php foreach ($products as $key => $value): ?>
		<li>
			<?php echo $html->link(
				$value['Product']['description'], 
				array('controller' => 'products', 'action' => 'view', $value['Product']['id']), 
				array('escape' => false));
			?>
		</li>
	<?php endforeach; ?>
	</ul>
	
	<?php	
		echo $paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
	?>
	</div>
	<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
		| <?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>


<?
echo "<pre>";
print_r($products);
echo "</pre>";
/*
	php foreach($products as $product): ?>
	<h4><?php echo $html->link(__($product['Product']['name'], true), 
			array('controller' => 'products', 
				  'action' => 'view', 
				  $product['Product']['id']
				)
		); 
	*/
	
	?>
	
	</h4>
	<h4><?php echo $product['Product']['parts_number'] ?></h4>
	<p><?php echo $product['Product']['name'] ?></p>
	<p><?php echo $product['Product']['description'] ?></p>
	<hr/>
<?php #endforeach ?>

</div>

<div style="clear: both;" />

