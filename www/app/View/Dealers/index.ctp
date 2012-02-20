<?php
echo $this->Element('dealers_menu');
?>
<!-- #new products -->
    <h4>New products</h4>
    <table class="new-products">
        <tr>
            <th>Parts Number</th>
            <th>Name</th>
            <th>Category</th>
            <th>Manufacturer</th>
            <th>Added</th>
            <th>Price</th>
        </tr>
        <?php foreach ($new_products as $product): ?>
        <tr>
            <td><?php echo $product['Product']['parts_number'] ?></td>
            <td><?php echo $product['Product']['name'] ?></td>
            <td><?php echo $product['Category']['name'] ?></td>
            <td><?php echo $product['Manufacturer']['name'] ?></td>
            <td><?php echo $product['Product']['created'] ?></td>
            <td><?php echo $product['Product']['price'] ?></td>

        </tr>
        <?php endforeach; ?>
    </table>


<h2>Cart</h2>
    <p>Cart contents</p>
    <pre><?php print_r($cart_items)?></pre>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Remove</th>
        </tr>
    <?php foreach($cart_items as $item): ?>
       <tr>
           <td><?php echo $this->Html->link($item['Product']['parts_number'],
                                         array('controller' => 'carts', 'action' => 'delete', $item['Product']['id'])); ?></td>
           <td><?php echo $item['Product']['name'] ?></td>
           <td><?php echo $item['Product']['price'] ?></td>
           <td><?php echo $this->Html->link('x', array('controller' => 'carts', 'action' => 'remove', $item['Product']['id'])); ?></td>
       </tr>
    <?php endforeach; ?>


    </table>
    <p><a href="#" class="awesome blue small">Continue to checkout</a></p>
