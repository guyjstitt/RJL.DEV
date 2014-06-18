<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>

<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">

<script>
$(document).ready(function() { 
  $(".eventdatepicker").datepicker({
	 dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  yearRange: "-90:+0"
    });
	
	$(".chosen-select").chosen();
	$("li#admin").addClass("active");
	
	$("#eventForm").validate({ignore: ":hidden:not(select)"});
	$('#EventEventDate').rules( "add", {
		required: true
	});
}); 
</script>

<style>
.messageHead {
	display: none;
}
</style>

<div class="events form">
<?php

echo $this->Form->create('Event',array('id'=>'eventForm')); ?>

<legend>Edit Event</legend>

<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('eventName',array('class'=>'required')); ?> 
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('eventType'); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-3 required">
		<?php echo $this->Form->input('eventDate',array('type'=>'text','class'=>'eventdatepicker','readonly'=>'readonly')); ?> 
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
		<?php echo $this->Form->input('totalDonations',array('label'=>'Total Donations')); ?> 
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

<?php echo $this->Form->end('Save'); ?>
</div>
<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Events', 
array('action' => 'index'));?></li>
    </ul>
</div>