dealers home

<h3>New products </h3>
    <ul>
        <li>product</li><li>product</li><li>product</li><li>product</li><li>product</li>
    </ul>

<hr/>

<h2>Order history</h2>

    <ul>
        <li>Order 1</li>
        <li>Order 2</li>
        <li>Order 3</li>
    </ul>
<hr/>

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
