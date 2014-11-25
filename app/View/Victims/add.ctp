<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>
<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/additional-methods.js"></script>

<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">

<script>


$(document).ready(function() { 
  $(".victimdatepicker").datepicker({
      changeMonth: true,
      changeYear: true,
	  constrainInput: false,
	  yearRange: "-90:+2"
    });
	$(".chosen-select").chosen();

	$("li#vic").addClass("active");

	
jQuery.validator.addMethod("lettersonly", function(value, element) {return this.optional(element) || /^[a-z\s\-\.]+$/i.test(value);}, "Letters or punctuation only"); 
jQuery.validator.addMethod("numbersonly", function(value, element) {return this.optional(element) || /^[0-9]+$/i.test(value);}, "Numbers only");
jQuery.validator.addMethod("ssnonly", function(value, element) {return this.optional(element) || /^([0-6]\d{2}|7[0-6]\d|77[0-2])([ \-]?)(\d{2})\2(\d{4})$/i.test(value);}, "Not a valid SSN");
jQuery.validator.addMethod("phoneonly", function(value, element) {return this.optional(element) || /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/.test(value);}, "Not a valid 10 digit phone number"	);	
jQuery.validator.addMethod("emailonly", function(value, element) {return this.optional(element) || 	/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/i.test(value);}, "Not a valid email address");	
	
	$("#vicForm").validate({ignore: ":hidden:not(select)"});
	
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
		required: true, 
		phoneonly: true	
	});
	$( "#VictimPhoneOneType" ).rules( "add", {
		required: true
	});
	$( "#VictimPhoneTwo" ).rules( "add", {
		phoneonly: true	
	});
	$( "#VictimEmail" ).rules( "add", { 
		emailonly: true	
	});
}); 
</script>

<style>
.messageHead {
	display: none;
}
</style>

<?php
$gender = array(''=>'','Male' => 'Male', 'Female' => 'Female');
$race=array(''=>'','White'=>'White','African American' => 'African-American', 'Hispanic'=>'Hispanic', 'Asian'=>'Asian', 'Native Hawaiian/Pacific Islander'=>'Native Hawaiian/Pacific Islander',
'Native American/Alaska Native'=> 'Native American/Alaska Native', 'Other/Mixed'=>'Other/Mixed');
$phonetype = array(''=>'','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work');
echo $this->Form->create('Victim',array('id'=>'vicForm')); ?>



<legend>New Victim</legend>
<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('victimId',array('class'=>'required','label'=>'Victim ID')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('firstName'); ?>
	</div>
	<div class="col-md-3 required">
		<?php echo $this->Form->input('lastName');  ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('socialSecurityNumber'); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('age',array('type'=>'text')); ?>
	</div>
	<div class="col-md-3 required">
		<?php echo $this->Form->input('dateOfBirth',array('type'=>'text','class'=>'victimdatepicker')); ?>
	</div>
</div>
<div class = "row">
	<div class="col-md-3">
		<?php echo $this->Form->input('gender',array('class'=>'chosen-select','options'=> $gender, 'data-placeholder'=>'Select Gender')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('race',array('class'=>'chosen-select','options'=> $race, 'data-placeholder'=>'Select Race')); ?>
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
	<div class="col-md-3 required">
		<?php echo $this->Form->input('phoneOne',array('label'=>'Primary Phone')); ?>
		<?php echo $this->Form->input('phoneOneType', array('label'=>'Primary Phone Type', 'class'=>'chosen-select','options'=>$phonetype,'data-placeholder'=>'Select Type')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('phoneTwo',array('label'=>'Secondary Phone')); ?>
		<?php echo $this->Form->input('phoneTwoType', array('label'=>'Secondary Phone Type', 'class'=>'chosen-select','options'=>$phonetype,'data-placeholder'=>'Select Type')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('email'); ?>
	</div>
</div>
		<?php echo $this->Form->input('RjCase',array('value'=>$attachedCaseId,'label'=>'Add to Existing Case(s)','class'=>'chosen-select', 'options'=>$cases)); ?>
<?php echo $this->Form->end('Submit');
?>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Victims', array('action' => 'index'));?></li>
    </ul>
</div>