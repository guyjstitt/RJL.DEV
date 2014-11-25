
<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>
<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">
<script>

$(document).ready(function() { 
	$(".chosen-select").chosen();
	$("#UserEditForm").validate({ignore: ":hidden:not(select)"});
	$('#UserPassword').rules( "add", {
		minlength: 5
	});
	$('#UserPasswordConfirmation').rules( "add", {
		required: true,
		minlength: 5,
		equalTo: "#UserPassword"
	});
}); 
</script>

<style>
.messageHead {
	display: none;
}
</style>
<?php $gender = array('' => '','Male' => 'Male', 'Female' => 'Female'); ?>

<div class="users form">
<?php echo $this->Form->create('User');?>
	<?php echo $this->Form->input('Person.id'); ?>
	<?php echo $this->Form->input('id'); ?>
<legend>Edit User</legend>
	<div class="row required">
		<div class="col-md-3">
			<?php echo $this->Form->input('Person.firstName',array('class'=>'required')); ?>
		</div>
		<div class="col-md-3">
			<?php echo $this->Form->input('Person.lastName',array('class'=>'required')); ?>
		</div>
		<div class="col-md-3">
			<?php echo $this->Form->input('Person.gender',array('value' => array_search($gender[$this->data['Person']['gender']],$gender),'class'=>'chosen-select required','type'=>'select','label'=>'Gender', 'options'=>$gender)); ?>
		</div>
	</div>
	<div class="row required">
		<div class="col-md-3">
			<?php echo $this->Form->input('username',array('class'=>'required')); ?>
		</div>
		<div class="col-md-3">
			<?php echo $this->Form->input('Person.email',array('class'=>'required')); ?>
		</div>
		<div class="col-md-3">
			<?php echo $this->Form->input('role',array('value' => array_search($this->data['User']['role'],$enum) ,'class'=>'chosen-select required','type'=>'select','label'=>'Role Options', 'options'=>$enum)); ?>
		</div>
	</div>
	<?php echo $this->Form->input('password', array('class'=>'required')); ?>
	<?php echo $this->Form->input('password_confirmation', array('type'=>'password','class'=>'required')); ?>
<?php echo $this->Form->end('Save');?>
</div>
<div class="navactions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('List Users', array('action' => 'index'));?></li>
	</ul>
</div>
