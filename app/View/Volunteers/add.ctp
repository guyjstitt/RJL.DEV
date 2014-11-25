<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/additional-methods.js"></script>
<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>

<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">

<style>
.messageHead {
	display: none;
}
</style>
 
<script>


$(document).ready(function() { 
  $(".voldatepicker").datepicker({
       dateFormat: 'yy-mm-dd',
			  changeMonth: true,
			  changeYear: true,
			  constrainInput: false,
			  yearRange: "-90:+2"
    });
	$(".chosen-select").chosen();

jQuery.validator.addMethod("lettersonly", function(value, element) {return this.optional(element) || /^[a-z\s\-\.]+$/i.test(value);}, "Letters or punctuation only"); 
jQuery.validator.addMethod("numbersonly", function(value, element) {return this.optional(element) || /^[0-9]+$/i.test(value);}, "Numbers only");
jQuery.validator.addMethod("ssnonly", function(value, element) {return this.optional(element) || /^([0-6]\d{2}|7[0-6]\d|77[0-2])([ \-]?)(\d{2})\2(\d{4})$/i.test(value);}, "Not a valid SSN");
jQuery.validator.addMethod("phoneonly", function(value, element) {return this.optional(element) || /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/i.test(value);}, "Not a valid phone number");		
jQuery.validator.addMethod("emailonly", function(value, element) {return this.optional(element) || 	/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/i.test(value);}, "Not a valid email address");	
jQuery.validator.addMethod("zipcodeonly", function(value, element) {return this.optional(element) || /^\d{5}(?:-\d{4})?$/.test(value);}, "Not a valid zip code");	
	
	$("#volForm").validate({ignore: ":hidden:not(select)"});
	
	
	$( "#VolunteerFirstName" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	$( "#VolunteerLastName" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	
	$( "#VolunteerStreetAddress" ).rules( "add", {
		required: true
	});
	$( "#VolunteerCity" ).rules( "add", {
		required: true,
		lettersonly: true
	});
	$( "#VolunteerZipCode" ).rules( "add", {
		required: true,
		numbersonly: true,
		zipcodeonly: true
	});
	$( "#VolunteerPhoneOne" ).rules( "add", {
		required: true, 
		phoneonly: true	
	});
	$( "#VolunteerPhoneOneType" ).rules( "add", {
		required: true	
	});
	$( "#VolunteerPhoneTwo" ).rules( "add", {
		phoneonly: true	
	});
	$( "#VolunteerEmail" ).rules( "add", { 
		emailonly: true	
	});
}); 
</script>



<div class="volunteers form">
<?php
$bcs=array('N/A'=>'N/A','Good' => 'Good', 'Bad'=>'Bad');
$gender = array('' => '','Male' => 'Male', 'Female' => 'Female');
 $phonetype = array('' => '','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work');
echo $this->Form->create('Volunteer',array('id'=>'volForm')); ?>

<legend>New Volunteer</legend>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('backgroundCheckStatus',array('class'=>'chosen-select','options'=> $bcs, 'label' =>'Background Check Status', 'default' => 'N/A')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('volunteerID',array('label'=>'Volunteer ID')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('firstName',array('label' =>'First Name')); ?>
	</div>
	<div class="col-md-3 required">
		<?php echo $this->Form->input('lastName'); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('dateOfBirth',array('type'=>'text','class'=>'voldatepicker','readonly' =>'readonly')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('gender',array('class'=>'chosen-select','options'=>$gender,'data-placeholder'=>'Select Gender')); ?>
	</div>
</div>
<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('streetAddress'); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('city'); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('state',array('class'=>'chosen-select','type'=>'select','options'=>$states,'default'=>'KY')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('zipCode',array('class'=>'smBox')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('phoneOne', array('label'=>'Primary Phone Number')); ?>
		<?php echo $this->Form->input('phoneOneType',array('label'=>'Primary Phone Type', 'class'=>'chosen-select','options'=>$phonetype,'data-placeholder'=>'Select Type')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('phoneTwo', array('label'=>'Secondary Phone Number')); ?>
		<?php echo $this->Form->input('phoneTwoType',array('label'=>'Secondary Phone Type', 'class'=>'chosen-select','options'=>$phonetype,'data-placeholder'=>'Select Type')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('email'); ?>
	</div>
</div>

<?php echo $this->Form->end('Submit'); ?>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Volunteers', array('action' => 'index'));?></li>
    </ul>
</div>