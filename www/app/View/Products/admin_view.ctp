<h1>View product - <? echo $product['Product']['parts_number'] . '' . $product['Product']['name'] ; ?></h1>
<ul class="tools">
    <li><? echo $this->Html->link(__('Edit product', true), array('controller' => 'products', 'action' => 'admin_edit', $product['Product']['id']));; #<a class="add-handler focus" href="#">Edit product</a> ?></li>
</ul>
<table>
<? foreach($product['Product'] as $key => $value): ?>
    <tr>
        <td class="key"><? echo $key ?></td>
        <td class="value"><? echo $value ?></td>
    </tr>
<? endforeach; ?>
</table>

<?
    print_r($product);
?>
