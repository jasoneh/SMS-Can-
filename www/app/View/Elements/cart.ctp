<?php
/**
 * Render a list of products in cart
 * @author Mathias Tervo
 */
?>

<h4>Cart</h4>
<ul>
<?php

$items_in_cart = $this->requestAction('carts/list');
foreach($items_in_cart as $key => $value):

    echo $key. ' > ' . $value;

endforeach;

?>
</ul>
