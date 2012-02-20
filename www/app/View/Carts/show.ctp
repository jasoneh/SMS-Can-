<?php
    echo $this->element('cart_contents');
    echo $this->Html->link('Proceed to checkout', array('controller' => 'carts', 'action' => 'checkout'), array('class' => 'small awesome green'));
?>