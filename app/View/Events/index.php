<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://136.165.68.167/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
<link rel="stylesheet" href="http://136.165.68.167/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
<link rel="stylesheet" href="http://136.165.68.167/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 

<style>
.messageHead {
	display: none;
}
</style>

<script>
$(document).ready( function () {
    $('#event').dataTable({
	"bJQueryUI": true
	});
} );


</script>
<?php echo $this->Html->script('highcharts');?>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
</head>

<div class="events index">
    <h2>Events</h2>
	<div class="table-responsive">
	<table class="table" id=event">
    <thead>
		<tr>
            <th>Event Name</th>
			<th>Event Type</th>
			<th>Date</th>
            <th>Cost</th>
			<th># of Attendees</th>
            <th># Of Donations</th>
            <th>Total Donation Amount</th>
			 <th>Average Donation</th>
    
        </tr>
	</thead>
	<tbody>
    <?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['eventName']; ?> </td>
		<td><?php echo $event['Event']['eventType']; ?> </td>
        <td><?php echo $event['Event']['eventDate']; ?> </td>
        <td><?php echo $event['Event']['eventCost']; ?> </td>
        <td><?php echo $event['Event']['numOfAttendees']; ?> </td>
        <td><?php echo $event['Event']['numOfDonations']; ?> </td>
		<td><?php echo $event['Event']['totalDonations']; ?> </td>
		<td><?php echo $event['Event']['avgDonations']; ?> </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
</div>
</div>

<div>
	<h3>Import Event Information</h3>
		<?php 
		echo $this->Form->create('Contact', array('type'=>'file'));
		?>

		<?php if (!empty($this->data['Contact']['filepath'])): ?>
			<div class="input">
				<label>Uploaded File</label>
				<?php
				
				echo $this->Form->input('filepath', array('type'=>'hidden'));
				echo $this->Html->link(basename($this->data['Contact']['filepath']), $this->data['Contact']['filepath']);
				?>
			</div>
		<?php else: ?>
			<?php echo $this->Form->input('filename',array(
				'type' => 'file','label'=>''
			)); ?>
		<?php endif; ?>

		<?php
		echo $this->Form->end('Submit');
		?>
</div>
<div class="navactions">
    <h3>Actions</h3>
    <ul>
		<li><?php echo $this->Html->link('Export File', array('action' => 'export'));?></li>
	</ul>
</div>


</html>

