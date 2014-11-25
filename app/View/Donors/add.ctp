<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>

<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">

<script>
$(document).ready(function() { 
  $(".donordatepicker").datepicker({
	 dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  yearRange: "-90:+0"
    });
	
	$(".chosen-select").chosen();
	$("li#admin").addClass("active");
	
	$("#donorForm").validate({ignore: ":hidden:not(select)"});
	$('#DonorDonorType').rules( "add", {
		required: true
	});
	$('#DonorDonorAmount').rules( "add", {
		required: true
	});
}); 
</script>

<style>
.messageHead {
	display: none;
}
</style>

<div class="donors form">
<?php
$gender = array('' => '','Male' => 'Male', 'Female' => 'Female');

 $phonetype = array('' => '','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work');
$race=array(''=>'','White'=>'White','African-American' => 'African-American', 'Hispanic'=>'Hispanic', 'Asian'=>'Asian', 'Native Hawaiian/Pacific Islander'=>'Native Hawaiian/Pacific Islander',
'Native American/Alaska Native'=> 'Native American/Alaska Native', 'Other/Mixed'=>'Other/Mixed'); 
echo $this->Form->create('Donor',array('id'=>'donorForm')); ?>

<legend>New Donor</legend>

<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('dateOfDonation',array('class'=>'required donordatepicker','type'=>'text')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('donorType',array('class'=>'required')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('donorAmount',array('label'=>'Donation Amount','class'=>'required')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('organizationName'); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('jobTitle'); ?> 
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('firstName'); ?> 
	</div>
	<div class="col-md-3 required">
		<?php echo $this->Form->input('lastName'); ?> 
	</div>
		<div class="col-md-3">
		<?php echo $this->Form->input('dateOfBirth',array('type'=>'text','class'=>'donordatepicker','readonly'=>'readonly')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('gender', array('type'=>'select','class'=>'chosen-select','options'=>$gender,'data-placeholder'=>'Select Gender')); ?> 
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('streetAddress'); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('city'); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('state',array('class'=>'chosen-select','type'=>'select', 'options'=>$states,'data-placeholder'=>'Select a State')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('zipCode',array('class'=>'smBox')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('phoneOne',array('label'=>'Primary Phone')); ?>
		<?php echo $this->Form->input('phoneOneType',array('label'=>'Primary Phone Type','class'=>'chosen-select','options'=> $phonetype, 'data-placeholder'=>'Select Type')); ?> 
	</div> 
	<div class="col-md-3">
		<?php echo $this->Form->input('phoneTwo',array('label'=>'Secondary Phone')); ?>
		<?php echo $this->Form->input('phoneTwoType',array('label'=>'Secondary Phone Type','class'=>'chosen-select','options'=> $phonetype, 'data-placeholder'=>'Select Type')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('emailAddress'); ?> 
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<?php echo $this->Form->input('donorNotes'); ?>
	</div>
</div>
<?php echo $this->Form->end('Submit'); ?>
</div>
<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Donors', 
array('action' => 'index'));?></li>
    </ul>
</div>