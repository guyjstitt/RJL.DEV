<style>
.messageHead {
	display: none;
}
</style>

<script>
$("li#off").addClass("active");
</script>

<div class="offenders">
<h2>Offender</h2>
	<table class="holder">
    
<tr>
<td class="left"><h4>Case ID</h4></td>
<td class="right"><p><?php if(!empty($offender['RjCase']['0']['caseId'])) echo $offender['RjCase']['0']['caseId'];

if(!empty($offender['RjCase']['1']['caseId'])) echo ' , ', $offender['RjCase']['1']['caseId']; 

if(!empty($offender['RjCase']['2']['caseId'])) echo ' , ', $offender['RjCase']['2']['caseId']; 

if(!empty($offender['RjCase']['3']['caseId'])) echo ' , ', $offender['RjCase']['3']['caseId']; 


if(!empty($offender['RjCase']['4']['caseId'])) echo ' , ', $offender['RjCase']['4']['caseId']; 


if(!empty($offender['RjCase']['5']['caseId'])) echo ' , ', $offender['RjCase']['5']['caseId']; 


if(!empty($offender['RjCase']['6']['caseId'])) echo ' , ', $offender['RjCase']['6']['caseId']; 


if(!empty($offender['RjCase']['7']['caseId'])) echo ' , ', $offender['RjCase']['7']['caseId']; 


if(!empty($offender['RjCase']['8']['caseId'])) echo ' , ', $offender['RjCase']['8']['caseId']; 

if(!empty($offender['RjCase']['9']['caseId'])) echo ' , ', $offender['RjCase']['9']['caseId']; 

if(!empty($offender['RjCase']['10']['caseId'])) echo ' , ', $offender['RjCase']['10']['caseId']; 


if(!empty($offender['RjCase']['11']['caseId'])) echo ' , ', $offender['RjCase']['11']['caseId']; 


if(!empty($offender['RjCase']['12']['caseId'])) echo ' , ', $offender['RjCase']['12']['caseId']; 


if(!empty($offender['RjCase']['13']['caseId'])) echo ' , ', $offender['RjCase']['13']['caseId']; 

 ?></p></td>
</tr>
	<tr>
		<td class="left"><h4>Offender ID</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['offenderId']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>First Name</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['firstName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Last Name</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['lastName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Primary Phone</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['phoneOne']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Primary Phone Type</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['phoneOneType']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Secondary Phone</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['phoneTwo']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Secondary Phone Type</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['phoneTwoType']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Email</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['email']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Social Security Number</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['socialSecurityNumber']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Date of Birth</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['dateOfBirth']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Gender</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['gender']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Race</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['race']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Street Address</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['streetAddress']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Zip Code</h4></td>
        <td class="right"><p><?php echo $offender['Offender']['zipCode']; ?></p></td>
    </tr>
	<tr>
		<td class="left"><h4>City</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['city']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>State</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['state']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Primary Guardian First Name</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['guardianOneFirstName']; ?></p></td>
	</tr>

	<tr>
		<td class="left"><h4>Primary Guardian Last Name</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['guardianOneLastName']; ?></p></td>
	</tr>

	<tr>
		<td class="left"><h4>Primary Guardian Relation</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['guardianOneRelation']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Secondary Guardian First Name</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['guardianTwoFirstName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Secondary Guardian Last Name</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['guardianTwoLastName']; ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Secondary Guardian Relation</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['guardianTwoRelation']; ?></p></td>
	</tr>
		<tr>
		<td class="left"><h4>Community Service Hours</h4></td>
		<td class="right"><p><?php echo $offender['Offender']['commhours']; ?></p></td>
	</tr>
	
	</table>
</div>


<div class="navactions">
    <ul>
	<?php if (!empty($attachedCaseId['RjCase']['id'])): ?>
		<li><?php echo $this->Html->link(__('Return To Attached Case'), array('controller'=> 'RjCases','action' => 'view', $attachedCaseId['RjCase']['id'])); ?> </li>
	<?php endif ?>
<?php if ($cur_user['role']!=='facilitator'): ?>
        <li><?php echo $this->Html->link
('Edit Offender', array('action' => 'edit', $offender['Offender']['id'], 'data')); ?> </li>
        <li><?php echo $this->Html->link
('New Offender', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link
('List Offenders', array('action' => 'index')); ?> </li>
<?php endif ?>
    </ul>
</div>