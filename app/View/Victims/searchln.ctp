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
	"bJQueryUI": true
	});
} );
</script>
</head>

<div class="victims index">
    <h2>Victims</h2>
<div>
	<table  id="victim">
	<thead>
        <tr>
            <th>Victim ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
			<th>Gender</th>
			<th>Race</th>
			<th>Zip Code</th>
			<th>Primary Phone</th>
            <th class="actions">Actions</th>
        </tr>
	</thead>
	<tbody>
	<?php for($i = 0; $i < count($victims); $i++){ ?>
    <tr>
        <td><?php echo $victims[$i]['Victim']['victimId']; ?> </td>
        <td><?php echo $victims[$i]['Victim']['firstName']; ?> </td>
        <td><?php echo $victims[$i]['Victim']['lastName']; ?> </td>
        <td><?php echo $victims[$i]['Victim']['dateOfBirth']; ?> </td>
		<td><?php echo $victims[$i]['Victim']['gender']; ?> </td>
		<td><?php echo $victims[$i]['Victim']['race']; ?> </td>
		<td><?php echo $victims[$i]['Victim']['zipCode']; ?> </td>
		<td><?php echo $victims[$i]['Victim']['phoneOne']; ?> </td>
        <td class="actions">
            <button id=return+$victims[$i]['Victim']['id'] onclick="PopulateVictim('<?php echo htmlentities(json_encode($victims[$i])); ?>')">Select</button>
        </td>
    </tr>
    <?php } ?>
	</tbody>
    </table>
	</div>
</div>
</html>