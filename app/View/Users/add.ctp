<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>
<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">
<script>

$(document).ready(function() { 
  $(".chosen-select").chosen();
  
  $("#UserAddForm").validate({ignore: ":hidden:not(select)"});
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

<?php $gender = array(''=>'','Male' => 'Male', 'Female' => 'Female'); ?>

<div class="users form">
<?php echo $this->Form->create('User',array('id'=>'UserAddForm'));?>
 	<legend>Register</legend>
	<div class="row">
		<div class="col-md-3 required">
			<?php echo $this->Form->input('Person.firstName',array('class'=>'required')); ?>
		</div>
		<div class="col-md-3 required">
			<?php echo $this->Form->input('Person.lastName',array('class'=>'required')); ?>
		</div>
		<div class="col-md-3">
			<?php echo $this->Form->input('Person.gender',array('class'=>'chosen-select','type'=>'select','label'=>'Gender', 'options'=>$gender, 'data-placeholder' => 'Select Gender')); ?>
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
			<?php echo $this->Form->input('role',array('class'=>'chosen-select required','type'=>'select','label'=>'Role Options', 'options'=>$Role)); ?>
		</div>
	</div>
<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('password'); ?>
		<?php echo $this->Form->input('password_confirmation', array('type'=>'password')); ?>
	</div>
</div>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="navactions">
	<ul>
		<li><?php echo $this->Html->link('List Users', array('action' => 'index'));?></li>
	</ul>
</div>
