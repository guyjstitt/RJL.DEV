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
    $('#reasons').dataTable({
	"bJQueryUI": true
	});
	$("li#admin").addClass("active");
} );
</script>

</head>

<div class="reasons index">
    <h2>Case Close Reasons</h2>
<div class="table-responsive">
<table id="reasons" class="table">
	<thead>
            <th>Case Close Reason</th>
			<th>Actions</th> 
     </thead> 
<tbody id="table">

 <?php

 foreach ($reasons as $reason): ?>
	<tr>
		<td><?php echo $reason['Reason']['closeReason']; ?></td>
		<td class="actions">
		
			<center><?php echo $this->Html->link(__('Edit'), array('controller'=> 'Reasons','action' => 'edit', $reason['Reason']['id'])); ?> </center>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</tbody>
</table>
</div>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('New Reason', array('action' => 'add')); ?></li>
    </ul>
</div>

</html>