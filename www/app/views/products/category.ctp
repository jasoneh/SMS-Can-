<div id="main">
	<div class="products view">
        <h2><? echo $category_name ?></h2>

        <ul class="product-list">
        <?php foreach ($products as $key => $value): ?>
            <li class="item">

                    <img src="/smscanada/app/webroot/media/products/product_thumbnail.png" class="item-thumbnail"/>
                    <?php echo $html->link(
                            $value['Product']['name'],
                            array('controller' => 'products', 'action' => 'view', $value['Product']['id']),
                            array('class' => 'item-link')
                        );
                    ?>
                    <p class="item-description">The description goes here ::: <? echo $value['Product']['description']?></p>

                    <div class="item-purchase">
                        <p>Price: 3030</p>
                        <a href="#" class="awesome green">Add to cart</a>
                    </div>
                    <div style="clear: both"></div>
                

            </li>
        <?php endforeach; ?>
        </ul>

        <?php
            echo $paginator->counter(array(
                'format' => __('Page %page% of %pages%. Showing %start% to %end% of %count% products in category', true)
            ));
        ?>
	</div>
	<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
		| <?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>


<?
/*echo "<pre>";
print_r($products);
echo "</pre>";*/
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
	
    <? if(isset($product)): ?>
        <h4><?php echo $product['Product']['parts_number'] ?></h4>
	    <p><?php echo $product['Product']['name'] ?></p>
	    <p><?php echo $product['Product']['description'] ?></p>
	<hr/>
    <? endif ?>

<?php #endforeach ?>

</div>

<div style="clear: both;" />

