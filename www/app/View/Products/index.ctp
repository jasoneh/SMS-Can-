<div id="main">
	<div class="products index">
	<h2><?php __('Featured products');?></h2>

	<ul>
	<?php foreach ($data as $key => $value): ?>
		<li>
			<?php echo $this->Html->link(
				$value['Product']['name'],
				array('controller' => 'products', 'action' => 'view', $value['Product']['id']),
				array('escape' => false));
			?>
		</li>
	<?php endforeach; ?>
	</ul>
    <?php
        echo $this->Paginator->counter(array(
        'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
    ?>

	</div>

    <?php
/*
	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->paginator->numbers();?>
		<?php echo $this->paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
*/
    ?>

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