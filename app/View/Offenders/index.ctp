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
    $('#offender').dataTable({
	"bJQueryUI": true
	});
	
	$("li#off").addClass("active");
} );
</script>
</head>
 
<div class="offenders index">
    <h2>Offenders</h2>
<div class="table-responsive">
	<table class="table" id="offender">
	<thead>
        <tr>
            <th>Offender ID</th>
			<th>Case ID</th>
    
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
			 <th>Zip Code</th>
			  <th>Primary Phone</th>
            <th class="actions">Actions</th>
        </tr>
	</thead>
	<tbody>
    <?php foreach ($offenders as $offender): ?>
    <tr>
        <td><?php echo $offender['Offender']['offenderId']; ?> </td>
		<td><?php if(!empty($offender['RjCase']['0']['caseId'])) echo $offender['RjCase']['0']['caseId'];  
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
		
		?>
		
		
		
		</td>
        
        <td><?php echo $offender['Offender']['firstName']; ?> </td>
        <td><?php echo $offender['Offender']['lastName']; ?> </td>
        <td><?php echo $offender['Offender']['dateOfBirth']; ?> </td>
		<td><?php echo $offender['Offender']['zipCode']; ?> </td>
		<td><?php echo $offender['Offender']['phoneOne']; ?> </td>
        <td class="actions">
            <?php echo $this->Html->link('View',array('action' => 'view', $offender['Offender']['id'], 'data')); ?> |
            <?php echo $this->Html->link('Edit',array('action' => 'edit', $offender['Offender']['id'], 'data')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
	</tbody>
    </table>
</div>
<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('New Offender', array('action' => 'add')); ?></li>
    </ul>
</div>
</html>