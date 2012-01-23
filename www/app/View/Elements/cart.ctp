<?php
/** Render an overview of a users current shopping cart*/
?>
<div class="cart-container">


    <h4>Cart</h4>
    <?php
        $count_and_sum = $this->requestAction('carts/count_and_sum');
        if(!empty($count_and_sum)):
    ?>
            <p><?php echo $count_and_sum['nof_items'] . " items: $" . $count_and_sum['sum'] ?></p>
    <?php
        endif;
    ?>
    <?php echo $this->Html->link('Checkout', array('controller' => 'carts', 'action' => 'checkout'), array('class' => 'small awesome green'));?>
    <?php echo $this->Html->link('Show cart', array('controller' => 'carts', 'action' => 'show'), array('class' => 'small awesome orange'));?>
</div>