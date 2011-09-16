<div class="dealers index">
<h2><?php __('Dealers');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('organisation');?></th>
	<th><?php echo $paginator->sort('firstname');?></th>
	<th><?php echo $paginator->sort('lastname');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('phone');?></th>
	<th><?php echo $paginator->sort('address');?></th>
	<th><?php echo $paginator->sort('zip');?></th>
	<th><?php echo $paginator->sort('city');?></th>
	<th><?php echo $paginator->sort('state');?></th>
	<th><?php echo $paginator->sort('country');?></th>
	<th><?php echo $paginator->sort('url');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($dealers as $dealer):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $dealer['Dealer']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($dealer['User']['id'], array('controller' => 'users', 'action' => 'view', $dealer['User']['id'])); ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['organisation']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['firstname']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['lastname']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['email']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['phone']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['address']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['zip']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['city']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['state']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['country']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['url']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['created']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['modified']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['active']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $dealer['Dealer']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $dealer['Dealer']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $dealer['Dealer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dealer['Dealer']['id'])); ?>
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
		<li><?php echo $html->link(__('New Dealer', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>