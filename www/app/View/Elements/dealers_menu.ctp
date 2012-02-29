<?php
/**
 * Dealers menu -- appears on the password protected dealer pages
 */

?>

<div id="dealer-menu">

    <ul>
        <li><?php echo  $this->Html->link('My page', array('controller' => 'dealers', 'action' => 'index')); ?></li>
        <li><?php echo  $this->Html->link('Order history', array('controller' => 'dealers', 'action' => 'orders')); ?></li>
        <li><?php echo  $this->Html->link('Current cart', array('controller' => 'dealers', 'action' => 'cart')); ?></li>
        <li><?php echo  $this->Html->link('Specials', array('controller' => 'dealers', 'action' => 'specials')); ?></li>
        <li><?php echo  $this->Html->link('Settings', array('controller' => 'dealers', 'action' => 'edit')); ?></li>
    </ul>
    <div class="clear"></div>
</div>


