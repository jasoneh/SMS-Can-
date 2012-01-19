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
    <pre><? print_r($cart_items)?></pre>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Remove</th>
        </tr>
    <? foreach($cart_items as $item): ?>
       <tr>
           <td><? echo $this->Html->link($item['Product']['parts_number'],
                                         array('controller' => 'carts', 'action' => 'delete', $item['Product']['id'])); ?></td>
           <td><? echo $item['Product']['name'] ?></td>
           <td><? echo $item['Product']['price'] ?></td>
           <td><? echo $this->Html->link('x', array('controller' => 'carts', 'action' => 'remove', $item['Product']['id'])); ?></td>
       </tr>
    <? endforeach; ?>


    </table>
    <p><a href="#" class="awesome blue small">Continue to checkout</a></p>
