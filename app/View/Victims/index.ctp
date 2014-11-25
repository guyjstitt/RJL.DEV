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
    $('#victim').dataTable({
	"bJQueryUI": true,
	"scrollX": "100%",
	"bAutoWidth": false
	});
	
	$("li#vic").addClass("active");

} );
</script>
</head>

<div class="victims index">
    <h2>Victims</h2>
<div class="table-responsive">
	<table class="table" id="victim">
	<thead>
        <tr>
            <th>Victim ID</th>
			<th>Case ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
			<th>Zip Code</th>
			<th>Primary Phone</th>
            <th class="actions">Actions</th>
        </tr>
	</thead>
	<tbody>
    <?php foreach ($victims as $victim): ?>
    <tr>
        <td><?php echo $victim['Victim']['victimId']; ?> </td>
		<td><?php if(!empty($victim['RjCase']['0']['caseId'])) echo $victim['RjCase']['0']['caseId']; ?> </td>
        <td><?php echo $victim['Victim']['firstName']; ?> </td>
        <td><?php echo $victim['Victim']['lastName']; ?> </td>
        <td><?php echo $victim['Victim']['age']; ?> </td>
		<td><?php echo $victim['Victim']['zipCode']; ?> </td>
		<td><?php echo $victim['Victim']['phoneOne']; ?> </td>
        <td class="actions">
            <?php echo $this->Html->link('View',array('action' => 'view', $victim['Victim']['id'], 'data')); ?> |
            <?php echo $this->Html->link('Edit',array('action' => 'edit', $victim['Victim']['id'], 'data')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
	</tbody>
    </table>
	</div>
</div>
<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('New Victim', array('action' => 'add')); ?></li>
    </ul>
</div>

</html>