<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script>
$(document).ready( function () {
	$("li#admin").addClass("active");
	
	$("#chargeForm").validate({ignore: ":hidden:not(select)"});
});
</script>

<style>
.messageHead {
	display: none;
}
</style>

<legend>Edit Charge</legend>

<div class="reasons form">
<?php	echo $this->Form->create('Charge',array('id'=>'chargeForm')); ?>
<div class="row required">
	<div class="col-md-3">
		<?php	echo $this->Form->input('krs',array('label'=>'KRS','class'=>'required')); ?>
		<?php	echo $this->Form->input('uorCode',array('label'=>'UOR Code','class'=>'required')); ?>
		<?php	echo $this->Form->input('charges',array('label'=>'Charge Description','type'=>'textarea','class'=>'required')); ?>
		<?php	echo $this->Form->end('Edit'); ?>
	</div>
</div>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Charges', array('action' => 'index'));?></li>
    </ul>
</div>