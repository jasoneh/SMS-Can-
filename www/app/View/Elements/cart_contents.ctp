<h4>Cart content</h4>
<table>
    <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price per unit</th>
        <th>Total</th>
        <th>Clear</th>
    </tr>

    <?php

        if(empty($items)){
            // if we don't have any items here then we called this view from show.ctp
            // get data from content() method in carts_controller
            $items = $this->requestAction('/carts/content');
        }
        function link_to_item($context, $item, $display_field){
            echo $context->Html->link($item['Product'][$display_field], array('controller' => 'products', 'action' => 'view', $item['Product']['id']));
        }
    ?>
    <?php foreach ($items['Items'] as $k => $item): ?>
        <tr>
            <td><?php echo link_to_item($this, $item, 'parts_number') ?></td>
            <td><?php echo link_to_item($this, $item, 'name') ?></td>

            <td><?php echo $item['Cart']['qty']?></td>
            <td><?php echo $item['Product']['price']?></td>
            <td><?php echo $item['Meta']['cost']?></td>
            <td><?php echo $this->Html->link('x', array('controller' => 'carts', 'action' =>'delete_row', $item['Cart']['id'])); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h4>Total</h4>
<p><?php echo $items['Meta']['total_quantity'] ?> items at $ <?php echo $items['Meta']['total_cost'] ?></p>