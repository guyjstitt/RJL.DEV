<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 

<style>
.messageHead {
	display: none;
}
</style>

<script>
$(document).ready( function () {
    $('#case').dataTable({
	"bJQueryUI": true
	});
} );
</script>

</head>

<div class="cases index">
    <h2>Cases</h2>
<div class="table-responsive">
<table id="case" class="table">
	<thead>
            <th>Case ID</th>
            <th>Case Status</th>
			<th>Offender First Name</th>
			<th>Offender Last Name</th>
			<th>Victim First Name</th>
            <th>Victim Last Name</th>
			<th>Actions</th> 
     </thead> 
<tbody id="table">

 <?php

 foreach ($items as $case): ?>
 <?php if ($cur_user['role']=='admin'||$cur_user['id']==$case['RjCase']['user_id']||$cur_user['id']==$case['RjCase']['facilitator']): ?>
	<tr>
		<td><?php echo $case['RjCase']['caseId']; ?></td>
		<td><?php echo $case['RjCase']['caseStatus']; ?></td>
		<td><?php echo $case['OffenderJoin']['firstName']; ?></td>
		<td><?php echo $case['OffenderJoin']['lastName']; ?></td>
		<td><?php echo $case['VictimJoin']['firstName']; ?></td>
		<td><?php echo $case['VictimJoin']['lastName']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(('View'), array('controller'=> 'RjCases', 'action' => 'view', $case['RjCase']['id'])); ?> |
			<?php echo $this->Html->link(__('Edit'), array('controller'=> 'RjCases','action' => 'edit', $case['RjCase']['id'])); ?>
		</td>
	</tr>
	<?php endif; ?>
	<?php endforeach; ?>
	
</tbody>
</table>
</div>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('New Case', array('action' => 'add')); ?></li>
		
    </ul>
</div>

</html>


