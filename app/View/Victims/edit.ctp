<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>
<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/additional-methods.js"></script>

<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">

<script>
$(document).ready(function() { 
  $(".evictimdatepicker").datepicker({
	 dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  yearRange: "-90:+0"
    });
	
	$(".chosen-select").chosen();

	$("li#vic").addClass("active");
	
jQuery.validator.addMethod("lettersonly", function(value, element) {return this.optional(element) || /^[a-z\s\-\.]+$/i.test(value);}, "Letters or punctuation only"); 
jQuery.validator.addMethod("numbersonly", function(value, element) {return this.optional(element) || /^[0-9]+$/i.test(value);}, "Numbers only");
jQuery.validator.addMethod("ssnonly", function(value, element) {return this.optional(element) || /^([0-6]\d{2}|7[0-6]\d|77[0-2])([ \-]?)(\d{2})\2(\d{4})$/i.test(value);}, "Not a valid SSN");
jQuery.validator.addMethod("phoneonly", function(value, element) {return this.optional(element) || /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/i.test(value);}, "Not a valid phone number");		
jQuery.validator.addMethod("emailonly", function(value, element) {return this.optional(element) || 	/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/i.test(value);}, "Not a valid email address");	
	
	$("#evicForm").validate({ignore: ":hidden:not(select)"});
	
	$( "#VictimVictimId" ).rules( "add", {
		required: true
	});
	$( "#VictimFirstName" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	$( "#VictimLastName" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	$( "#VictimSocialSecurityNumber" ).rules( "add", { 
		ssnonly: true	
	});
	$( "#VictimStreetAddress" ).rules( "add", {
		required: true
	});
	$( "#VictimCity" ).rules( "add", {
		required: true,
		lettersonly: true
	});
	$( "#VictimZipCode" ).rules( "add", {
		required: true,
		numbersonly: true
	});
	$( "#VictimPhoneOne" ).rules( "add", {
		required: true 	
	});
	$( "#VictimEmail" ).rules( "add", { 
		emailonly: true	
	});
	$( "#VictimPhoneOneType" ).rules( "add", {
		required: true
	});
	$( "#VictimDateOfBirth" ).rules( "add", {
		required: true,
		date: true
	});
}); 
</script>

<style>
.messageHead {
	display: none;
}
</style>

<div class="victims form">
<?php
$gender = array(''=>'','Male' => 'Male', 'Female' => 'Female');
$phonetype = array(''=>'','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work');
$race=array(''=>'','White'=>'White','African-American' => 'African-American', 'Hispanic'=>'Hispanic', 'Asian'=>'Asian', 'Native Hawaiian/Pacific Islander'=>'Native Hawaiian/Pacific Islander',
'Native American/Alaska Native'=> 'Native American/Alaska Native', 'Other/Mixed'=>'Other/Mixed'); 
echo $this->Form->create('Victim',array('id'=>'evicForm')); ?>

<legend>Edit Victim</legend>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('victimId',array('label'=>'Victim ID')); ?>
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
		<?php echo $this->Form->input('socialSecurityNumber'); ?> 
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('dateOfBirth',array('type'=>'text','class'=>'evictimdatepicker')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('race',array('class'=>'chosen-select','options'=> $race,'data-placeholder'=>'Select Race')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('gender',array('class'=>'chosen-select','options'=> $gender,'data-placeholder'=>'Select Gender')); ?> 
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
		<?php echo $this->Form->input('state',array('class'=>'chosen-select required','type'=>'select', 'options'=>$states,'data-placeholder'=>'Select State')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('zipCode',array('class'=>'smBox')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('phoneOne', array('label'=>'Primary Phone')); ?>
		<?php echo $this->Form->input('phoneOneType', array('label'=>'Primary Phone Type', 'class'=>'chosen-select','options'=> $phonetype, 'data-placeholder'=>'Select Type')); ?> 
	</div> 
	<div class="col-md-3">
		<?php echo $this->Form->input('phoneTwo', array('label'=>'Secondary Phone')); ?>
		<?php echo $this->Form->input('phoneTwoType',  array('label'=>'Secondary Phone Type', 'class'=>'chosen-select','options'=> $phonetype, 'data-placeholder'=>'Select Type')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('email'); ?> 
	</div>
</div>
		<?php echo $this->Form->input('RjCase',array('label'=>'Add to Existing Case(s)','class'=>'chosen-select', 'options'=>$cases)); ?>
<?php echo $this->Form->end('Save'); ?>
</div>
<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Victims', 
array('action' => 'index'));?></li>
    </ul>
</div>