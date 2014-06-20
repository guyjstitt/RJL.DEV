<style>
.messageHead {
	display: none;
}
</style>

<script>
$("li#vic").addClass("active");
</script>


<div class="victims">
<h2>Victim</h2>

<table class="holder">

<tr>
<td class="left"><h4>Victim ID</h4></td>
<td class="right"><p><?php echo $victim['Victim']['victimId']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Case ID</h4></td>
<td class="right"><p><?php if(!empty($victim['RjCase']['0']['caseId'])) echo $victim['RjCase']['0']['caseId']; 

if(!empty($victim['RjCase']['1']['caseId'])) echo ' , ', $victim['RjCase']['1']['caseId']; 

if(!empty($victim['RjCase']['2']['caseId'])) echo ' , ', $victim['RjCase']['2']['caseId']; 

if(!empty($victim['RjCase']['3']['caseId'])) echo ' , ', $victim['RjCase']['3']['caseId']; 


if(!empty($victim['RjCase']['4']['caseId'])) echo ' , ', $victim['RjCase']['4']['caseId']; 


if(!empty($victim['RjCase']['5']['caseId'])) echo ' , ', $victim['RjCase']['5']['caseId']; 


if(!empty($victim['RjCase']['6']['caseId'])) echo ' , ', $victim['RjCase']['6']['caseId']; 


if(!empty($victim['RjCase']['7']['caseId'])) echo ' , ', $victim['RjCase']['7']['caseId']; 


if(!empty($victim['RjCase']['8']['caseId'])) echo ' , ', $victim['RjCase']['8']['caseId']; 

if(!empty($victim['RjCase']['9']['caseId'])) echo ' , ', $victim['RjCase']['9']['caseId']; 

if(!empty($victim['RjCase']['10']['caseId'])) echo ' , ', $victim['RjCase']['10']['caseId']; 


if(!empty($victim['RjCase']['11']['caseId'])) echo ' , ', $victim['RjCase']['11']['caseId']; 


if(!empty($victim['RjCase']['12']['caseId'])) echo ' , ', $victim['RjCase']['12']['caseId']; 


if(!empty($victim['RjCase']['13']['caseId'])) echo ' , ', $victim['RjCase']['13']['caseId']; 


 ?></p></td>
</tr>

<tr>
<td class="left"><h4>First Name</h4></td>
<td class="right"><p><?php echo $victim['Victim']['firstName']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Last Name</h4></td>
<td class="right"><p><?php echo $victim['Victim']['lastName']; ?></p></td>
</tr>
<tr>

<td class="left"><h4>Primary Phone</h4></td>
<td class="right"><p><?php echo $victim['Victim']['phoneOne']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Primary Phone Type</h4></td>
<td class="right"><p><?php echo $victim['Victim']['phoneOneType']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Secondary Phone</h4></td>
<td class="right"><p><?php echo $victim['Victim']['phoneTwo']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Secondary Phone Type</h4></td>
<td class="right"><p><?php echo $victim['Victim']['phoneTwoType']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Email</h4></td>
<td class="right"><p><?php echo $victim['Victim']['email']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Social Security Number</h4></td>
<td class="right"><p><?php echo $victim['Victim']['socialSecurityNumber']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Age</h4></td>
<td class="right"><p><?php echo $victim['Victim']['age']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Date of Birth</h4></td>
<td class="right"><p><?php echo $victim['Victim']['dateOfBirth']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Gender</h4></td>
<td class="right"><p><?php echo $victim['Victim']['gender']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Race</h4></td>
<td class="right"><p><?php echo $victim['Victim']['race']; ?></p></td>
</tr>
	
<tr>
<td class="left"><h4>Street Address</h4></td>
<td class="right"><p><?php echo $victim['Victim']['streetAddress']; ?></p></td>
</tr>


<tr>
<td class="left"><h4>City</h4></td>
<td class="right"><p><?php echo $victim['Victim']['city']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>State</h4></td>
<td class="right"><p><?php echo $victim['Victim']['state']; ?></p></td>
</tr>

<tr>
<td class="left"><h4>Zip Code</h4></td>
<td class="right"><p><?php echo $victim['Victim']['zipCode']; ?></p></td>
</tr>

</table>

</div>

<div class="navactions">
    <ul>
	<?php if (!empty($attachedCaseId['RjCase']['id'])): ?>
		<li><?php echo $this->Html->link(__('Return To Attached Case'), array('controller'=> 'RjCases','action' => 'view', $attachedCaseId['RjCase']['id'])); ?> </li>
	<?php endif ?>
	<?php if ($cur_user['role']!=='facilitator'): ?>
        <li><?php echo $this->Html->link('Edit Victim', array('action' => 'edit', $victim['Victim']['id'], 'data')); ?> </li>
        <li><?php echo $this->Html->link('New Victim', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('List Victims', array('action' => 'index')); ?> </li>
   <?php endif ?>

   </ul>
</div>