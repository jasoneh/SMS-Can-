<div id="main">
	<div class="products index">
	<h2><?php __('Featured products');?></h2>

	<ul class="product-list">
	<?php foreach ($data as $key => $value): ?>
		<li class="item">
			<div class="item-link">
                <? echo $this->Html->image('product_thumbnail.png'); ?>
            </div>
            <div class="item-thumbnail">
                <? echo $this->Html->link( $value['Product']['name'],
                                           array('controller' => 'products', 'action' => 'view', $value['Product']['id']),
                                           array('escape' => false)); ?>
            </div>

            <div class="item-purchase">
                <h4>100<? #echo $value['Product']['price'] ?></h4>
                <? echo $this->Html->link( 'Add to cart',
                                           array('controller' => 'carts', 'action' => 'add', $value['Product']['id']),
                                           array('class' => 'green awesome small'),
                                           array('escape' => false)); ?>
            </div>

		</li>
	<?php endforeach; ?>
	</ul>
    <?php
        echo $this->Paginator->counter(array(
        'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
    ?>

	</div>


	<div class="paging">
		<?php #echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php #echo $this->paginator->numbers();?>
		<?php #echo $this->paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>


	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Images', true), array('controller' => 'images', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </li>
		</ul>
	</div>

</div>

<div style="clear: both;" ></div>