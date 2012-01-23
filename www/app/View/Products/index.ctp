<?php
    require_once('category.ctp');
?>

<div id="main">
	<div class="products index">
	<h2><?php __('Featured products');?></h2>

	<ul class="product-list">


    <?php if(!empty($data)): ?>
	<?php foreach ($data as $key => $value): ?>
		<li class="item">
			<div class="item-link">
                <?php echo $this->Html->image('product_thumbnail.png'); ?>
            </div>
            <div class="item-thumbnail">
                <?php echo $this->Html->link( $value['Product']['name'],
                                           array('controller' => 'products', 'action' => 'view', $value['Product']['id']),
                                           array('escape' => false)); ?>
            </div>

            <div class="item-purchase">
                <h4>100<?php #echo $value['Product']['price'] ?></h4>
                <?php /*
                    echo $this->Html->link( 'Add to cart',
                                           array('controller' => 'carts', 'action' => 'add', $value['Product']['id']),
                                           array('class' => 'green awesome small'),
                                           array('escape' => false)); */?>

                <?php echo $this->Form->create('Carts', array('type' => 'post', 'action' => '/add/'));?>
                    <fieldset>
                    <legend><?php echo __('Please enter your username and password'); ?></legend>
                    <?php
                        echo $this->Form->input('qty', array('class' => 'quantity-input', 'label' => 'Quantity', 'value' => 1) );
                        echo $this->Form->hidden('product_id', array('value' => $value['Product']['id']));
                    ?>
                    </fieldset>
                <?php echo $this->Form->end(__('Buy'));?>

            </div>

		</li>
        <?php
        endforeach;
        endif;
        ?>


	</ul>

    <?php #echo $this->element('product_paginator'); ?>

	</div>





</div>

<div style="clear: both;" ></div>
