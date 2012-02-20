<?php
echo $this->Element('dealers_menu');
?>
<h4>Purchase was placed</h4>

<p>Thank you for your order - Merci pour votre commander </p>

<pre>
    <?php #print_r($order); ?>
</pre>

<table>
    <tr>
        <th>Quantity</th>
        <th>Product</th>
        <th>Parts number</th>
        <th>Price per unit</th>
    </tr>
<?php foreach($order[0]['OrderItem'] as $order_item): ?>
    <tr>

        <td><?php echo $order_item['qty']?></td>
        <td><?php echo $this->Html->link(
            $order_item['Product']['name'],
            array('controller' => 'products', 'action' => 'view', $order_item['qty'] )); ?>
        </td>
        <td><?php echo $order_item['id'] ?></td>
        <td><?php echo $order_item['Product']['price'] ?></td>
    </tr>
<?php endforeach; ?>


</table>

<p>An email was sent to <?php echo $order[0]['Dealer']['email'];?></p>

