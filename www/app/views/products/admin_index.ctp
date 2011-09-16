<div class="products index">
<h2><?php __('Products');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('category_id');?></th>
	<th><?php echo $paginator->sort('parts_number');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('name_french');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('description_french');?></th>
	<th><?php echo $paginator->sort('detail');?></th>
	<th><?php echo $paginator->sort('detail_french');?></th>
	<th><?php echo $paginator->sort('new');?></th>
	<th><?php echo $paginator->sort('sale');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
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
			<?php echo $html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $product['Product']['parts_number']; ?>
		</td>
		<td>
			<?php echo $product['Product']['name']; ?>
		</td>
		<td>
			<?php echo $product['Product']['name_french']; ?>
		</td>
		<td>
			<?php echo $product['Product']['description']; ?>
		</td>
		<td>
			<?php echo $product['Product']['description_french']; ?>
		</td>
		<td>
			<?php echo $product['Product']['detail']; ?>
		</td>
		<td>
			<?php echo $product['Product']['detail_french']; ?>
		</td>
		<td>
			<?php echo $product['Product']['new']; ?>
		</td>
		<td>
			<?php echo $product['Product']['sale']; ?>
		</td>
		<td>
			<?php echo $product['Product']['created']; ?>
		</td>
		<td>
			<?php echo $product['Product']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Product', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Images', true), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>