<style>
.messageHead {
	display: none;
}
</style>

<div class="volunteers">
<h2>Volunteer</h2>
<table class="holder">
	<tr>
        <td class="left"><h4>Volunteer ID</h4></td>
		<td class="right"><p><?php echo $volunteer['Volunteer']['volunteerID']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Background Check Status</h4></td>
		<td class="right"><p><?php echo $volunteer['Volunteer']['backgroundCheckStatus']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>First Name</h4></td>
		<td class="right"><p><?php echo $volunteer['Volunteer']['firstName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Last Name</h4></td>
		<td class="right"><p><?php echo $volunteer['Volunteer']['lastName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Primary Phone</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['phoneOne']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Primary Phone Type</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['phoneOneType']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Secondary Phone</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['phoneTwo']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Secondary Phone Type</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['phoneTwoType']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Email</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['email']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Date of Birth</h4></td>
		<td class="right"><p><?php echo $volunteer['Volunteer']['dateOfBirth']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Gender</h4></td>
		<td class="right"><p><?php echo $volunteer['Volunteer']['gender']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Street Address</h4></td>
		<td class="right"><p><?php echo $volunteer['Volunteer']['streetAddress']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Zip Code</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['zipCode']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>City</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['city']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>State</h4></td>
        <td class="right"><p><?php echo $volunteer['Volunteer']['state']; ?></p></td>
	</tr>
	
	
    </table>
</div>


<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link
('Edit Volunteer', array('action' => 'edit', $volunteer['Volunteer']['volunteerID'])); ?> </li>
        <li><?php echo $this->Html->link
('Delete Volunteer', array('action' => 'delete', $volunteer['Volunteer']['volunteerID']),
null, sprintf('Are you sure you want to delete # %s?', $volunteer['Volunteer']['volunteerID'])); ?> </li>
        <li><?php echo $this->Html->link
('List Volunteers', array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link
('New Volunteer', array('action' => 'add')); ?> </li>
    </ul>
</div>