<?php
/**
 * Lists products of a given category
 */
?>
<div id="main">
    <div class="products view">
    <?php if(!empty($category_name)): ?>
        <h2><?php echo $category_name ?></h2>
    <?php endif; ?>
        
        <?php echo $this->element('product_paginator'); ?>
        
        <ul class="product-list">
        <?php
            foreach ($products as $key => $product):

                # Set price depending on dealer type
                # default to house dealers price
                # TODO: Set prices correctly, there shall only be one dealer type with one price
                /*
                if($dealer_type_id == 2){
                    $price = $value['Product']['price_whole_sale'];
                }else{
                    $price = $value['Product']['price_house'];
                }
                */

        ?>
            <li class="item">

                <div class="item-box">
                    <img src="http://i00.i.aliimg.com/photo/v0/487636730/High_tempreture_resistance_Fiberglass_Sewing_machine_Thread.jpg" class="item-thumbnail"/>

                    <?php echo $this->Html->link(
                            $product['Product']['name'],
                            array('controller' => 'products', 'action' => 'view', $product['Product']['id']),
                            array('class' => 'item-link')
                        );
                    ?>
                    <p class="item-description"><?php echo $product['Product']['description']?></p>
                </div>

                <p><?php echo $this->Cartform->makeCartForm($product); ?></p>
                <div style="clear: both"></div>
            </li>
        <?php endforeach; ?>

        </ul>

        <?php echo $this->element('product_paginator'); ?>

	</div>



</div>

<div style="clear: both;" />
