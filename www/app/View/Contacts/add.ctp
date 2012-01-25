<h1>Contact us</h1>

<div class="contacts form">

<?php if(isset($error)) echo "<h4>".$error."</h4>"; ?>
<?php echo $this->Form->create('Contact', array('action' => 'add'));?>
	<fieldset class="module">
 		<legend><?php __('Contact Us');?></legend>

        <?php echo $this->Form->input('name'); ?>

        <?php echo $this->Form->input('email'); ?>


        <?php echo $this->Form->input('text', array('type' => 'textarea')); ?>

	</fieldset>
<?php echo $this->Form->end('Submit');?>