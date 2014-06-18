<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>
<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/additional-methods.js"></script>


<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">

<script>
$(document).ready(function() { 
  $(".offenderdatepicker").datepicker({
	 dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  yearRange: "-90:+2"
    });
	
	$(".chosen-select").chosen();
	
	$("li#off").addClass("active");
	
jQuery.validator.addMethod("lettersonly", function(value, element) {return this.optional(element) || /^[a-z\s\-\.]+$/i.test(value);}, "Letters or punctuation only"); 
jQuery.validator.addMethod("numbersonly", function(value, element) {return this.optional(element) || /^[0-9]+$/i.test(value);}, "Numbers only");
jQuery.validator.addMethod("ssnonly", function(value, element) {return this.optional(element) || /^([0-6]\d{2}|7[0-6]\d|77[0-2])([ \-]?)(\d{2})\2(\d{4})$/i.test(value);}, "Not a valid SSN");
jQuery.validator.addMethod("phoneonly", function(value, element) {return this.optional(element) || /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/.test(value);}, "Not a valid 10 digit phone number");	
jQuery.validator.addMethod("emailonly", function(value, element) {return this.optional(element) || 	/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/i.test(value);}, "Not a valid email address");	
	$("#offForm").validate({ignore: ":hidden:not(select)"});
	
	$( "#OffenderOffenderId" ).rules( "add", {
		required: true
	});
	$( "#OffenderCommhours" ).rules( "add", {
		numbersonly: true
	});
	$( "#OffenderFirstName" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	$( "#OffenderLastName" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	$( "#OffenderSocialSecurityNumber" ).rules( "add", { 
		ssnonly: true	
	});
	$( "#OffenderDateOfBirth" ).rules( "add", {
		required: true,
		date: true
	});
	$( "#OffenderStreetAddress" ).rules( "add", {
		required: true
	});
	$( "#OffenderCity" ).rules( "add", {
		required: true,
		lettersonly: true
	});
	$( "#OffenderZipCode" ).rules( "add", {
		required: true,
		numbersonly: true
	});
	$( "#OffenderGuardianOneFirstName" ).rules( "add", {
		lettersonly: true	
	});
	$( "#OffenderGuardianOneLastName" ).rules( "add", {
		lettersonly: true	
	});
	$( "#OffenderPhoneOne" ).rules( "add", {
		required: true, 
		phoneonly: true	
	});
	$( "#OffenderPhoneOneType" ).rules( "add", {
		required: true	
	});
	$( "#OffenderPhoneTwo" ).rules( "add", {
		phoneonly: true	
	});
	$( "#OffenderEmail" ).rules( "add", { 
		emailonly: true	
	});
}); 
</script>

<style>
.messageHead {
	display: none;
}
</style>

<div class="offenders form">
<?php
$relation = array('' => '','Parent' => 'Parent', 'Family Member'=> 'Family Member', 'Foster Parent' =>'Foster Parent', 'Other' =>'Other');
$gender = array('' => '','Male' => 'Male', 'Female' => 'Female');
$race=array('' => '','White'=>'White','African-American' => 'African-American', 'Hispanic'=>'Hispanic', 'Asian'=>'Asian', 'Native Hawaiian/Pacific Islander'=>'Native Hawaiian/Pacific Islander',
'Native American/Alaska Native'=> 'Native American/Alaska Native', 'Other/Mixed'=>'Other/Mixed');
$phonetype = array('' => '','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work');
echo $this->Form->create('Offender',array('id'=>'offForm')); ?>

<legend>New Offender</legend>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('offenderId',array('label'=>'Offender ID')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('commhours',array('type'=>'text','label'=>'Community Hours')); ?>
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
		<?php echo $this->Form->input('dateOfBirth',array('type'=>'text','class'=>'offenderdatepicker')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('race',array('class'=>'chosen-select','options'=>$race,'data-placeholder'=>'Select Race')); ?>
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
		<?php echo $this->Form->input('state',array('class'=>'chosen-select','type'=>'select', 'options'=>$states,'default' => 'KY')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('zipCode',array('class'=>'smBox')); ?> 
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('guardianOneFirstName',array('label'=>'Primary Guardian First Name')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('guardianOneLastName',array('label'=>'Primary Guardian Last Name')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('guardianOneRelation', array('label'=>'Primary Guardian Relation', 'class'=>'chosen-select', 'options'=>$relation,'data-placeholder'=>'Select Relation')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('guardianTwoFirstName',array('label'=>'Secondary Guardian First Name')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('guardianTwoLastName',array('label'=>'Secondary Guardian Last Name')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('guardianTwoRelation', array('label'=>'Secondary Guardian Relation', 'class'=>'chosen-select', 'options'=>$relation,'data-placeholder'=>'Select Relation')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('phoneOne',array('label'=>'Primary Phone')); ?>
		<?php echo $this->Form->input('phoneOneType',  array('label'=>'Primary Phone Type', 'class'=>'chosen-select','options'=>$phonetype,'data-placeholder'=>'Select Type')); ?>  
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('phoneTwo',array('label'=>'Secondary Phone')); ?>
		<?php echo $this->Form->input('phoneTwoType', array('label'=>'Secondary Phone Type', 'class'=>'chosen-select','options'=>$phonetype,'data-placeholder'=>'Select Type')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('email'); ?> 
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('RjCase',array('multiple'=>true,'value'=>$attachedCaseId,'label'=>'Add to Existing Case(s)','class'=>'chosen-select', 'options'=>$cases)); ?>
	</div>
</div>
<?php echo $this->Form->end('Submit'); ?>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Offenders', array('action' => 'index'));?></li>
    </ul>
</div>