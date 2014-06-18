<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script>
$(document).ready( function () {
	$("li#admin").addClass("active");
	
	$("#codeForm").validate({ignore: ":hidden:not(select)"});
	$('#CodeCode').rules( "add", {
		required: true
	});
	$('#CodeDescription').rules( "add", {
		required: true
	});
});
</script>

<style>
.messageHead {
	display: none;
}
</style>

<legend>Edit Note Code</legend>

<?php	echo $this->Form->create('Code',array('id'=>'codeForm')); ?>
<div class="row required">
	<div class="col-md-3">
		<?php	echo $this->Form->input('code'); ?>
		<?php	echo $this->Form->input('description'); ?>
		<?php	echo $this->Form->end('Edit'); ?>
	</div>
</div>	

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Note Codes', array('action' => 'index'));?></li>
    </ul>
</div>