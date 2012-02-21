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
        $description = $product['Product']['description_french'];
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

        <!-- Category breadcrumbs -->
        <p><?php echo $this->Html->link("Category",
                    array('controller' => 'products', 'action' => 'category')); ?>
        &raquo; <?php echo $product['Category']['name'];?></p>

	    <!--<img src="localhost:8888/smscanada/media/products/dummy_product.jpg" />-->
        <?php #echo $this->Html->image('dummy_product.jpg'); ?>
        <img src="http://smscanada.com/prodimg/Pd/386001.jpg"/>

        <h1><?php echo $name?> </h1>

        <p><?php echo $description; ?></p>
	

	    <p><?php echo $this->Cartform->makeCartForm($product); ?></p>
        <p><?php echo $this->Html->link("List more products of this category",
            array('controller' => 'products', 'action' => 'category', $product['Category']['id'])); ?>
        </p>

        <?php
            // Loop over all images belonging to this Product
        /*
            foreach ($product['Image'] as $image){
                echo $image['filename'] . "<br/>";
                echo $image['caption'] . "<br/>";
                echo "<hr/>";
            }
        */
        ?>

    </div>
    <hr/>
    <p>Below is to show the available details for a product</p>
<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
<?php echo "<pre>"; print_r($product); echo "</pre>";?>

	</div>
</div>

<div style="clear: both;" />

