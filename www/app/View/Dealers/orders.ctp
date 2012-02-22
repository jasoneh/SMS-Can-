<?php
echo $this->Element('dealers_menu');
?>


<table class="order-history">
    <tr>
        <th>Order Number</th>
        <th>Date</th>
        <th>Nof articles</th>
        <th>Value</th>
    </tr>
<?php foreach($orders as $order): ?>

    <tr>
        <td><?php echo $this->Html->link('View', array('controller' => 'orders', 'action' => 'show', $order['Order']['id'])); ?></td>
        <td><?php echo $order['Order']['order_number'] ?></td>
        <td><?php echo $order['Order']['created'] ?></td>
        <td><?php echo $order['Order']['nof_items'] ?></td>
        <td><?php echo $order['Order']['sum'] ?></td>
    </tr>
<?php endforeach; ?>
</table>