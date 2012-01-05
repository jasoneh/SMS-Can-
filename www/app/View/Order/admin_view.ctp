<h1>View order - <? echo $order['Order']['id']?></h1>
<ul class="tools">
    <li><? echo $this->Html->link(__('Edit order', true), array('controller' => 'orders', 'action' => 'admin_edit', $order['Order']['id']));?></li>
</ul>
<table>

<? foreach($orders['Order'] as $key => $value): ?>
    <tr>
        <td class="key"><? echo $key ?></td>
        <td class="value"><? echo $value ?></td>
    </tr>
<? endforeach; ?>
</table>

<?
    print_r($product);
?>
