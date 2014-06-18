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
    $('#volunteer').dataTable({
	"bJQueryUI": true
	});
} );
</script>
</head>

<div class="volunteers index">
    <h2>Volunteers</h2>
	<div class="table-responsive">
	<table class="table" id="volunteer">
    <thead>
		<tr>
            <th>Volunteer ID</th>
            <th>Background Check Status</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
			<th>Zip Code</th>
			<th>Primary Phone</th>
            <th class="actions">Actions</th>
        </tr>
	<thead>
	<tbody>
    <?php foreach ($volunteers as $volunteer): ?>
    <tr>
        <td><?php echo $volunteer['Volunteer']['volunteerID']; ?> </td>
        <td><?php echo $volunteer['Volunteer']['backgroundCheckStatus']; ?> </td>
        <td><?php echo $volunteer['Volunteer']['firstName']; ?> </td>
        <td><?php echo $volunteer['Volunteer']['lastName']; ?> </td>
        <td><?php echo $volunteer['Volunteer']['dateOfBirth']; ?> </td>
		  <td><?php echo $volunteer['Volunteer']['zipCode']; ?> </td>
		    <td><?php echo $volunteer['Volunteer']['phoneOne']; ?> </td>
        <td class="actions">
            <?php echo $this->Html->link('View',array('action' => 'view', $volunteer['Volunteer']['volunteerID'])); ?> |
            <?php echo $this->Html->link('Edit',array('action' => 'edit', $volunteer['Volunteer']['volunteerID'])); ?>
         </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
</div>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('New Volunteer', array('action' => 'add')); ?></li>
		
	</ul>
</div>

