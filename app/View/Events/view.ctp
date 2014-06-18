<script>
$(document).ready( function () {
	$("li#admin").addClass("active");
});
</script>

<style>
.messageHead {
	display: none;
}
</style>

<div class="events">
<h2>Event</h2>

<table class="holder">
<tr>
<td class="left"><h4>Event Name</h4></td>
<td class="right"><p><?php echo $event['Event']['eventName']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Event Type</h4></td>
<td class="right"><p><?php echo $event['Event']['eventType']; ?></p></td>
</tr>
 

<tr>
<td class="left"><h4>Date of Event</h4></td>
<td class="right"><p><?php echo $event['Event']['eventDate']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Cost of Event</h4></td>
<td class="right"><p><?php echo $event['Event']['eventCost']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Number of Attendees</h4></td>
<td class="right"><p><?php echo $event['Event']['numOfAttendees']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Number of Donations</h4></td>
<td class="right"><p><?php echo $event['Event']['numOfDonations']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Total Donations</h4></td>
<td class="right"><p><?php echo $event['Event']['totalDonations']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Average Donation</h4></td>
<td class="right"><p><?php echo $event['Event']['avgDonations']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Event Notes</h4></td>
<td class="right"><p><?php echo $event['Event']['eventNotes']; ?></p></td>
</tr>

</table>

</div>

<div class="navactions">
    <ul>
		<li><?php echo $this->Html->link('List Events', array('action' => 'index')); ?> </li>
    </ul>
</div>