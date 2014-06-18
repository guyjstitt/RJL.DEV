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
    $('#codes').dataTable({
	"bJQueryUI": true
	});
	$("li#admin").addClass("active");
} );
</script>

</head>

<div class="codes index">
    <h2>Note Codes</h2>
<div class="table-responsive">
<table id="codes" class="table">
	<thead>
            <th>Code</th>
            <th>Description</th>
			<th>Actions</th> 
     </thead> 
<tbody id="table">

 <?php

 foreach ($codes as $code): ?>
	<tr>
		<td><?php echo $code['Code']['code']; ?></td>
		<td><?php echo $code['Code']['description']; ?></td>
		<td class="actions">
		
			<center><?php echo $this->Html->link(__('Edit'), array('controller'=> 'Codes','action' => 'edit', $code['Code']['id'])); ?> </center>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</tbody>
</table>
</div>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('New Code', array('action' => 'add')); ?></li>
    </ul>
</div>

</html>