<?php
    echo $this->Element('dealers_menu');
?>
<div class="dealers form">
<?php echo $this->Form->create('Dealer');?>
	<fieldset>
 		<legend><?php __('Edit Dealer');?></legend>
	<?php
		#echo $this->Form->input('id');
		#echo $this->Form->input('user_id');
		#echo $this->Form->input('type_id');
		echo $this->Form->input('organisation');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('postal');
		echo $this->Form->input('city');
		echo $this->Form->input('province');
		echo $this->Form->input('country');
		echo $this->Form->input('url');

        // and add the referer field
        echo "<input type='hidden' name='referer' value='".$referer."' /> ";
		#echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end('Save');?>
</div>