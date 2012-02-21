<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<h4>Login</h4>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>

<br/>
<div>
    <h4>Register yourself as a dealer</h4>
    <p>Information on how to register as a Dealer here ... </p>
</div>