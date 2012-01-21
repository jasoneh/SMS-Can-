<?php
/** Render an overview of a users current shopping cart*/
?>
<h4>Cart</h4>
<?php
    $count_and_sum = $this->requestAction('carts/count_and_sum');
    if(!empty($count_and_sum)):
?>
        <p><?php echo $count_and_sum['nof_items'] . " items: $" . $count_and_sum['sum'] ?></p>
<?php
    endif;
?>
