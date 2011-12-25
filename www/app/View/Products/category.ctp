<div id="main">
    <div class="products view">
    <?php if(!empty($category_name)): ?>
        <h2><? echo $category_name ?></h2>
    <?php endif; ?>
        
        <? echo $this->element('product_paginator'); ?>
        
        <ul class="product-list">
        <?
            foreach ($products as $key => $value):

                # Set price depending on dealer type
                # default to house dealers price

                if($dealer_type_id == 2){
                    $price = $value['Product']['price_whole_sale'];
                }else{
                    $price = $value['Product']['price_house'];
                }
        ?>
            <li class="item">

                <img src="/smscanada/app/webroot/media/products/product_thumbnail.png" class="item-thumbnail"/>
                
                <?php echo $this->Html->link(
                        $value['Product']['name'],
                        array('controller' => 'products', 'action' => 'view', $value['Product']['id']),
                        array('class' => 'item-link')
                    );
                ?>
                <p class="item-description"><? echo $value['Product']['description']?></p>

                <div class="item-purchase">

                    <p class="item-price">$ <? echo $price?> </p>

                    <?php echo $this->Form->create('Carts', array('type' => 'post', 'action' => '/add/'));?>
                        <fieldset>
                        <legend><?php echo __('Please enter your username and password'); ?></legend>
                        <?php
                            echo $this->Form->input('qty', array('class' => 'quantity-input') );
                            echo $this->Form->hidden('product_id', array('value' => $value['Product']['id']));
                        ?>
                        </fieldset>
                    <?php echo $this->Form->end(__('Buy'));?>

                    <!--<a href="" class="awesome green">Add to cart</a>-->
                    <? echo $this->Html->link(
                            'Add to cart',
                            array('controller' => 'cart', 'action' => 'add', $value['Product']['id']),
                            array('class' => 'awesome green')
                        )
                    ?>
                </div>
                <div style="clear: both"></div>
            </li>
        <?php endforeach; ?>

        </ul>

        <? echo $this->element('product_paginator'); ?>
        <?php
        /*
            echo $paginator->counter(array(
                'format' => __('Page %page% of %pages%. Showing %start% to %end% of %count% products in category', true)
            ));
        */
        ?>
	</div>
	<div class="paging">
        <?php
		/*<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));*/?><!--
		| <?php /*echo $paginator->numbers();*/?>
		--><?php /*echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));*/
        ?>
	</div>

    <?php
     /*
      if(isset($product)): ?>
        <h4><?php echo $product['Product']['parts_number'] ?></h4>
	    <p><?php echo $product['Product']['name'] ?></p>
	    <p><?php echo $product['Product']['description'] ?></p>
	<hr/>
    <? endif ?>
     */?>


</div>

<div style="clear: both;" />
