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

<div class="donors">
<h2>Donor</h2>

<table class="holder">
<tr>
<td class="left"><h4>Donor Type</h4></td>
<td class="right"><p><?php echo $donor['Donor']['donorType']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Email Address</h4></td>
<td class="right"><p><?php echo $donor['Donor']['emailAddress']; ?></p></td>
</tr>
 
<tr>
<td class="left"><h4>First Name</h4></td>
<td class="right"><p><?php echo $donor['Donor']['firstName']; ?></p></td>
</tr>
<tr>
<td class="left"><h4>Last Name</h4></td>
<td class="right"><p><?php echo $donor['Donor']['lastName']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Organization</h4></td>
<td class="right"><p><?php echo $donor['Donor']['organizationName']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Job Title</h4></td>
<td class="right"><p><?php echo $donor['Donor']['jobTitle']; ?></p></td>
</tr>


<tr>
<td class="left"><h4>Donation Amount</h4></td>
<td class="right"><p><?php echo $donor['Donor']['donorAmount']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Date of Birth</h4></td>
<td class="right"><p><?php echo $donor['Donor']['dateOfBirth']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Gender</h4></td>
<td class="right"><p><?php echo $donor['Donor']['gender']; ?></p></td>
</tr>
	
<tr>
<td class="left"><h4>Street Address</h4></td>
<td class="right"><p><?php echo $donor['Donor']['streetAddress']; ?></p></td>
</tr>


<tr>
<td class="left"><h4>City</h4></td>
<td class="right"><p><?php echo $donor['Donor']['city']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>State</h4></td>
<td class="right"><p><?php echo $donor['Donor']['state']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Zip Code</h4></td>
<td class="right"><p><?php echo $donor['Donor']['zipCode']; ?></p></td>
</tr>


<tr>
<td class="left"><h4>Primary Phone Number</h4></td>
<td class="right"><p><?php echo $donor['Donor']['phoneOne']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Primary Phone Type</h4></td>
<td class="right"><p><?php echo $donor['Donor']['phoneOneType']; ?></p></td>
</tr>


<tr>
<td class="left"><h4>Secondary Phone Number</h4></td>
<td class="right"><p><?php echo $donor['Donor']['phoneTwo']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Secondary Phone Type</h4></td>
<td class="right"><p><?php echo $donor['Donor']['phoneTwoType']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Donor Notes</h4></td>
<td class="right"><p><?php echo $donor['Donor']['donorNotes']; ?></p></td>
</tr>

</table>

</div>

<div class="navactions">
    <ul>
		<li><?php echo $this->Html->link('List Donors', array('action' => 'index')); ?> </li>
    </ul>
</div>