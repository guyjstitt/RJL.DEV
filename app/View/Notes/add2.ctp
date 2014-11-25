<div class="notes form">
<?php echo $this->Form->create('Note');?>
	<fieldset>
 		<legend>Register</legend>
	<?php
		echo $this->Form->input('Note.noteDate');
		echo $this->Form->input('Code.code');
		echo $this->Form->input('Note.noteContent');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="navactions">
</div>
