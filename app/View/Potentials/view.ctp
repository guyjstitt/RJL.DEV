<script>
$(document).ready( function () {
	$("li#dash").addClass("active");
});
</script>

<style>
.messageHead {
	display: none;
}
</style>

<div class="potentials">
<h2>Potential Volunteer</h2>

<table class="holder">
    <tr>
		<td class="left"><h4>First Name</h4></td>
        <td class="right"><p><?php echo $potential['Potential']['firstName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Last Name</h4></td>
		<td class="right"><p><?php echo $potential['Potential']['lastName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Email</h4></td>
		<td class="right"><p><?php echo $potential['Potential']['email']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Phone</h4></td>
		<td class="right"><p><?php echo $potential['Potential']['phone']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Gender</h4></td>
		<td class="right"><p><?php echo $potential['Potential']['gender']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Date of Birth</h4></td>
		<td class="right"><p><?php echo $potential['Potential']['dateOfBirth']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Reference</h4></td>
		<td class="right"><p><?php echo $potential['Potential']['hear']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Skills</h4></td>
        <td class="right"><p><?php echo $potential['Potential']['skills']; ?></p></td>
    </tr>
	<tr>
		<td class="left"><h4>Viewed</h4></td>
		<td class="right"><p><?php echo $this->Form->create('Potential');?>

<?php $options = array('Viewed'=>'Viewed', 'Not Viewed'=>'Not Viewed');?>
<?php $attributes = array('value'=>'0'); ?> 

<?php echo $this->Form->input('seen', array('type' => 'checkbox','value' => 'Viewed','hiddenField'=> 'Not Viewed','label'=>'Yes')); ?>
<?php echo $this->Form->end('Submit');?></p></td>
</table>

</div>


<div class="navactions">
    <ul>
		<li><?php echo $this->Html->link('Return to Dashboard', array('controller'=>'home','action' => 'index')); ?> </li>
        <li><?php echo $this->Form->postLink('Delete', array('controller'=>'Potentials','action' => 'delete', $potential['Potential']['id']), array('confirm'=>'Are you sure you want to delete this potential volunteer?')); ?> </li>
		
		
		
    </ul>
</div>