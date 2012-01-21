
<h1>View dealer - <?php echo $dealer['Dealer']['email'] . ' - ' . $dealer['Dealer']['organisation'] ; ?></h1>



    <ul class="tools">
        <li><?php echo $this->Html->link(__('Edit dealer', true),
                                      array('controller' => 'dealers',
                                           'action' => 'admin_edit',
                                           $dealer['Dealer']['id']));
            ?></li>
    </ul>

    <fieldset class="module">
    <div id="left-column">
        <table>
        <?php foreach($dealer['Dealer'] as $key => $value): ?>
            <tr>
                <td class="key"><?php echo $key ?></td>
                <td class="value"><?php echo $value ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <?php print_r($dealer) ?>
    </div>

    <div id="right-column">

        <h2>Orders</h2>
        <table>
            <?php foreach($orders as $order):?>
            <tr>
                <td><?php echo $order['Order']['id'] ?></td>
                <td><?php echo $order['Order']['id'] ?></td>
                <td><?php echo $order['Order']['id'] ?></td>
                <td><?php echo $order['Order']['id'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    </fieldset>