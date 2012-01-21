<h1>View order - <?php echo $order['Order']['id']?></h1>
<ul class="tools">
    <li><?php echo $this->Html->link(__('Edit order', true), array('controller' => 'orders', 'action' => 'admin_edit', $order['Order']['id']));?></li>
</ul>
<table>

<?php foreach($orders['Order'] as $key => $value): ?>
    <tr>
        <td class="key"><?php echo $key ?></td>
        <td class="value"><?php echo $value ?></td>
    </tr>
<?php endforeach; ?>
</table>

<?
    print_r($product);
?>
