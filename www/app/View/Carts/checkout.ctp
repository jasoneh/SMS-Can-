<h2>Checkout</h2>

<div id="cart">
    <?php echo $this->element('cart_contents'); ?>
</div>

<div id="dealer-info">
    <h4>Your information</h4>

    <p>Name: <?php echo $dealer['Dealer']['firstname'] . " " . $dealer['Dealer']['lastname']; ?></p>
    <p>Email: <?php echo $dealer['Dealer']['email']; ?></p>
    <p>Address: <?php echo $dealer['Dealer']['address']; ?></p>
    <p>Postal: <?php echo $dealer['Dealer']['postal']; ?></p>
    <p>City: <?php echo $dealer['Dealer']['city']; ?></p>
    <p>Country: <?php echo $dealer['Dealer']['country']; ?></p>


</div>
<?php if(credentials_are_met($dealer)): ?>
<form method="POST" action="">
    <input type="submit" value="Place order" />
</form>
<?php else: ?>
    <h4>You need to fill out correct information before you can submit your purchase</h4>
    <p><?php echo $this->Html->link('Edit contact information', array('controller' => 'dealers', 'action' => 'edit')); ?></p>
<?php endif ?>



<?php

function credentials_are_met($dealer){
    return true;
}
?>