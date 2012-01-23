<h1>View product - <?php echo $product['Product']['parts_number'] . '' . $product['Product']['name'] ; ?></h1>
<ul class="tools">
    <li><?php echo $this->Html->link(__('Edit product', true), array('controller' => 'products', 'action' => 'admin_edit', $product['Product']['id']));; #<a class="add-handler focus" href="#">Edit product</a> ?></li>
</ul>
<table>
<?php foreach($product['Product'] as $key => $value): ?>
    <tr>
        <td class="key"><?php echo $key ?></td>
        <td class="value"><?php echo $value ?></td>
    </tr>
<?php endforeach; ?>
</table>

<?php
    print_r($product);
?>
