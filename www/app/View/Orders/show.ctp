<?php
echo $this->Element('dealers_menu');
?>

<table>
    <tr>
        <th>Product</th>
        <th>Parts number</th>
        <th>Quantity</th>
        <th>Order placed date</th>
        <th>Status</th>
    </tr>

<?php foreach($order[0]['OrderItem'] as $order_items): ?>
    <tr>
        <td><?php echo $order_items['Product']['name'] ?></td>
        <td><?php echo $order_items['Product']['parts_number'] ?></td>
        <td><?php echo $order_items['qty'] ?></td>
        <td><?php echo $order_items['Order']['created'] ?></td>
        <td><?php echo $order_items['Order']['OrderStatus']['name'] ?></td>

    </tr>
<?php endforeach; ?>
</table>


<pre>
<?php
    #print_r($order[0]['OrderItem'] );
?>
</pre>