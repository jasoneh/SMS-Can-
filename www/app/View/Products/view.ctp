<div id="sidebar">

<?php /*
	<h4>Categories</h4>
	<?php 
		echo $this->renderElement('categories');
	?>
	*/
    $lang = $this->Session->read('lang');

    /**
     * We'll set the bilingual fields here
     * so we don't have to do multiple if/else checks later
     */
    if($lang == 'en'){
        $name = $product['Product']['name_french'];
        $description = $product['Product']['description_fr'];
    }else{
        $name = $product['Product']['name'];
        $description = $product['Product']['description'];
    }

    // TODO: Do dealer type checkup in user model
    #$user = 'house-dealer'; # FIXME: temporary fix

?>
</div>

<div id="main">
	<div class="products view">
	    <h2><?php  __('Product');?></h2>

	    <!--<img src="localhost:8888/smscanada/media/products/dummy_product.jpg" />-->
        <? echo $this->Html->image('dummy_product.jpg'); ?>

        <h1><? echo $name?> </h1>
        <p>
        <!-- Category breadcrumbs -->
        <p><a href="">Categories</a> &raquo; <? echo $product['Category']['name'];?></p>
        <?php echo $this->Html->link("List products of this category",
            array('controller' => 'products', 'action' => 'category', $product['Category']['id'])); ?>
        </p>
        <p><? echo $description; ?></p>
	
	    <p>Price: <?php echo $product['Product']['price']; ?></p>
	
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

