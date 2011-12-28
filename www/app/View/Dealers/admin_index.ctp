<?
/**
 * Lists all dealers in the system
*/
?>
<div class="dealers index">
<h2><?php __('Dealers');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
        'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));

?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('user_id');?></th>
	<th><?php echo $this->Paginator->sort('dealer_type_id');?></th>
	<th><?php echo $this->Paginator->sort('organisation');?></th>
	<th><?php echo $this->Paginator->sort('firstname');?></th>
	<th><?php echo $this->Paginator->sort('lastname');?></th>
	<th><?php echo $this->Paginator->sort('email');?></th>
	<th><?php echo $this->Paginator->sort('phone');?></th>
	<th><?php echo $this->Paginator->sort('address');?></th>
	<th><?php echo $this->Paginator->sort('postal');?></th>
	<th><?php echo $this->Paginator->sort('city');?></th>
	<th><?php echo $this->Paginator->sort('province');?></th>
	<th><?php echo $this->Paginator->sort('country');?></th>
	<th><?php echo $this->Paginator->sort('url');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th><?php echo $this->Paginator->sort('active');?></th>
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
			<?php echo $this->Html->link($dealer['User']['id'], array('controller' => 'users', 'action' => 'view', $dealer['User']['id'])); ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['dealer_type_id']; ?>
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
			<?php echo $dealer['Dealer']['postal']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['city']; ?>
		</td>
		<td>
			<?php echo $dealer['Dealer']['province']; ?>
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
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $dealer['Dealer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $dealer['Dealer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $dealer['Dealer']['id']),
                                   null, sprintf(__('Are you sure you want to delete # %s?', true),
                                                 $dealer['Dealer']['id']));
            ?>
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
		<li><?php echo $this->Html->link(__('New Dealer', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>