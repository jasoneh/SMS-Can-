
<h1>View dealer - <? echo $dealer['Dealer']['email'] . ' - ' . $dealer['Dealer']['organisation'] ; ?></h1>



    <ul class="tools">
        <li><? echo $this->Html->link(__('Edit dealer', true),
                                      array('controller' => 'dealers',
                                           'action' => 'admin_edit',
                                           $dealer['Dealer']['id']));
            ?></li>
    </ul>

    <fieldset class="module">
    <div id="left-column">
        <table>
        <? foreach($dealer['Dealer'] as $key => $value): ?>
            <tr>
                <td class="key"><? echo $key ?></td>
                <td class="value"><? echo $value ?></td>
            </tr>
        <? endforeach; ?>
        </table>
        <? print_r($dealer) ?>
    </div>

    <div id="right-column">

        <h2>Orders</h2>
        <table>
            <? foreach($orders as $order):?>
            <tr>
                <td><? echo $order['Order']['id'] ?></td>
                <td><? echo $order['Order']['id'] ?></td>
                <td><? echo $order['Order']['id'] ?></td>
                <td><? echo $order['Order']['id'] ?></td>
            </tr>
            <? endforeach; ?>
        </table>
    </div>

    </fieldset>