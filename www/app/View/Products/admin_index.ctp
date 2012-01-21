<h1>Products</h1>
<div class="products index">
<h2><?php __('Products');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('category_id');?></th>
	<th><?php echo $this->Paginator->sort('parts_number');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('name_french');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('description_french'); ?></th>
	<th><?php echo $this->Paginator->sort('detail');?></th>
	<!--<th><?php /*echo $this->Paginator->sort('detail_french');*/?></th>-->
	<th><?php echo $this->Paginator->sort('new');?></th>
	<th><?php echo $this->Paginator->sort('sale');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $product['Product']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $product['Product']['parts_number']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Product']['name'], array('action' => 'edit', $product['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $product['Product']['name_french']; ?>
		</td>
		<td>
			<?php echo $product['Product']['description']; ?>
		</td>
        <?php /*
		<td>
			<?php echo $product['Product']['description_french']; ?>
		</td> */?>
		<td>
			<?php echo $product['Product']['detail']; ?>
		</td>
		<td>
			<?php echo $product['Product']['detail_french']; ?>
		</td>
		<td>
			<?php
                if($product['Product']['new'] == 1){
                    echo '<img src="/smscanada/grappelli/img/icons/icon-yes.png" />';
                };
            ?>
		</td>
		<td>
			<?php
                if($product['Product']['sale'] == 1){
                    echo '<img src="/smscanada/grappelli/img/icons/icon-yes.png" />';
                };
            ?>
		</td>
		<td>
			<?php echo $product['Product']['created']; ?>
		</td>
		<td>
			<?php echo $product['Product']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
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