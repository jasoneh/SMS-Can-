<?php print_r($dealer);?>
<h1>View dealer - <?php echo $dealer['Dealer']['firstname'] . ' ' . $dealer['Dealer']['lastname'] . ' - ' . $dealer['Dealer']['email'] ; ?></h1>
<ul class="tools">
    <li><?php echo $this->Html->link(__('Edit dealer', true), array('controller' => 'dealers', 'action' => 'admin_edit', $dealer['Dealer']['id']));?></li>
</ul>
<table>
<?php foreach($dealer['Dealer'] as $key => $value): ?>
    <tr>
        <td class="key"><?php echo $key ?></td>
        <td class="value"><?php echo $value ?></td>
    </tr>
<?php endforeach; ?>
</table>

<?php
    print_r($dealer);
?>
