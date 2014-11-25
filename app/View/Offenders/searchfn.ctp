<!DOCTYPE html>
<html>
<head>

<style>
.messageHead {
	display: none;
}
</style>

<script>

</script>
</head>
<body style="background-color:#000000">
<div class="offenders index">
    <h2>Offenders</h2>
<div>
	<table  id="offender" class="table">
	<thead>
        <tr>
            <th>Offender ID</th>
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
	<tbody id="table">
	<?php for($i = 0; $i < count($offenders); $i++){ ?>
    <tr>
        <td><?php echo $offenders[$i]['Offender']['offenderId']; ?> </td>
        <td><?php echo $offenders[$i]['Offender']['firstName']; ?> </td>
        <td><?php echo $offenders[$i]['Offender']['lastName']; ?> </td>
        <td><?php echo $offenders[$i]['Offender']['dateOfBirth']; ?> </td>
		<td><?php echo $offenders[$i]['Offender']['gender']; ?> </td>
		<td><?php echo $offenders[$i]['Offender']['race']; ?> </td>
		<td><?php echo $offenders[$i]['Offender']['zipCode']; ?> </td>
		<td><?php echo $offenders[$i]['Offender']['phoneOne']; ?> </td>
        <td class="actions">
            <button id=return+$offenders[$i]['Offender']['id'] onclick="PopulateOffender('<?php echo htmlentities(json_encode($offenders[$i])); ?>')">Select</button>
        </td>
    </tr>
    <?php } ?>
	</tbody>
    </table>
	</div>
</div>
</body>
</html>