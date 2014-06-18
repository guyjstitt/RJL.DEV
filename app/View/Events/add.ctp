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
  $(".eventdatepicker").datepicker({
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
	
	$("#eventForm").validate({ignore: ":hidden:not(select)"});
	
	
	$( "#EventType" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	$( "#EventName" ).rules( "add", {
		required: true, 
		lettersonly: true	
	});
	$( "#EventDate" ).rules( "add", {
		required: true,
		date: true
	});
	$( "#EventCost" ).rules( "add", {
		required: false,
		numbersonly: true
	});
	$( "#EventNumberOfAttendees" ).rules( "add", {
		required: false,
		numbersonly: true
	});
	$( "#EventNumberOfDonations" ).rules( "add", {
		required: false,
		numbersonly: true
	});
	$( "#EventTotalDonations" ).rules( "add", {
		required: false,
		numbersonly: true
	});
	$( "#EventAverageDonation" ).rules( "add", {
		required: false,
		numbersonly: true
	});
	
}); 
</script>

<div class="events form">
<?php

echo $this->Form->create('Event',array('id'=>'eventForm')); ?>

<legend>New Event</legend>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('eventName'); ?>
	</div>
	<div class="col-md-3 required">
		<?php echo $this->Form->input('eventType'); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('eventDate', array('type'=>'text', 'class'=>'eventdatepicker', 'readonly'=>'readonly')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('eventCost'); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('numOfAttendees', array('label'=>'Number of Attendees')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<?php echo $this->Form->input('numOfDonations', array('label'=>'Number of Donations')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('totalDonations'); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('avgDonations', array('label'=>'Average Donation')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<?php echo $this->Form->input('eventNotes'); ?>
	</div>
</div>

<?php echo $this->Form->end('Submit'); ?>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Events', array('action' => 'index'));?></li>
    </ul>
</div>