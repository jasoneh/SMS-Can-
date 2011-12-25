<h1>Carts</h1>
<div class="carts index">
<h2><?php __('Carts');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('user');?></th>

	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($carts as $cart):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $cart['Cart']['id']; ?>
		</td>
		<td>
			<?php echo $cart['Cart']['user_id']; ?>
		</td>


		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $cart['Cart']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $cart['Cart']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $cart['Cart']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cart['Cart']['id'])); ?>
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