<div id="sidebar">
	<h4>Categories</h4>
	<?php 
		echo $this->renderElement('categories');
	?>
</div>

<div id="main">
<?php foreach($products as $product): ?>
	<h4><?php echo $html->link(__($product['Product']['name'], true), 
			array('controller' => 'products', 
				  'action' => 'view', 
				  $product['Product']['id']
				)
		); 
	?></h4>
	<h4><?php echo $product['Product']['parts_number'] ?></h4>
	<p><?php echo $product['Product']['name'] ?></p>
	<p><?php echo $product['Product']['description'] ?></p>
	<hr/>
<?php endforeach ?>

</div>

<div style="clear: both;" />

