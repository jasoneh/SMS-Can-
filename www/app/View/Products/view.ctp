<div id="sidebar">

<?php /*
	<h4>Categories</h4>
	<?php 
		echo $this->renderElement('categories');
	?>
	*/
?>
</div>

<div id="main">
	<div class="products view">
	<h2><?php  __('Product');?></h2>

	<img src="/smscanada/app/webroot/media/products/dummy_product.jpg" />
<?php

    echo "<pre>";
        print_r($product);
    echo "</pre>";
	echo "<h1>" . $product['Product']['name'] . "</h1>";
	/*if($session == 'french'){
		echo "<h4>" . $product['Product']['description_fr'] . "</h4>";
	}else{
		echo "<h4>" . $product['Product']['description'] . "</h4>";
	}*/
?>
	<p><a href="dumy_url=<?php echo $product['Product']['category_id']; ?>">List products of this category</a></p>
	<p>
	<?php echo $this->Html->link("List products of this category",
		array('controller' => 'products', 'action' => 'category', $product['Category']['id'])); ?>
	</p>
	
<?php
	// TODO: Do dealer type checkup in user model
	$user = 'house-dealer'; # FIXME: temporary fix
    $price = 'must fix price setting by linking correctly in Products/view.ctp';
	if($user == 'house-dealer'){
		#$price = $product['Product']['price_house'];
	}else{
		#$price = $product['Product']['price_wholesale'];
	}
?>
	<p>Price: <?php echo $price; ?></p>
	
<?php 
	// Loop over all images belonging to this Product
	foreach ($product['Image'] as $image){
		echo $image['filename'] . "<br/>";		
		echo $image['caption'] . "<br/>";
		echo "<hr/>";
	}

?>


<hr/>
<p>Below is for development only</p>


<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
				
<?php 	echo "<pre>"; print_r($product); echo "</pre>";?>

	</div>

	<div class="related">
		<h3><?php __('Related Images');?></h3>
		<?php if (!empty($product['Image'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php __('Id'); ?></th>
			<th><?php __('Product Id'); ?></th>
			<th><?php __('Filename'); ?></th>
			<th><?php __('Caption'); ?></th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($product['Image'] as $image):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $image['id'];?></td>
				<td><?php echo $image['product_id'];?></td>
				<td><?php echo $image['filename'];?></td>
				<td><?php echo $image['caption'];?></td>
				<td class="actions">
					<?php echo $html->link(__('View', true), array('controller' => 'images', 'action' => 'view', $image['id'])); ?>
					<?php echo $html->link(__('Edit', true), array('controller' => 'images', 'action' => 'edit', $image['id'])); ?>
					<?php echo $html->link(__('Delete', true), array('controller' => 'images', 'action' => 'delete', $image['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $image['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
</div>

<div style="clear: both;" />

