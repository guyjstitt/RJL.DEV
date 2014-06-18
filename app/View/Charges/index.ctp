
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
	$('#charges').dataTable({
	"bJQueryUI": true,
	"aaSorting": [[ 0, "asc" ]]
	});
	$("li#admin").addClass("active");
} );
</script>

</head>

<div class="charges index">
    <h2>Charges</h2>
<div class="table-responsive">
<table id="charges" class="table">
	<thead>
            <th>ID</th>
            <th>KRS</th>
			<th>UOR Code</th> 
            <th>Charge Description</th>
            <th>Action</th>
     </thead> 
<tbody id="table">

 <?php

 foreach ($charges as $charge): ?>
	<tr>
		<td><?php echo $charge['Charge']['id']; ?></td>
		<td><?php echo $charge['Charge']['krs']; ?></td>
		<td><?php echo $charge['Charge']['uorCode']; ?></td>
		<td><?php echo $charge['Charge']['charges']; ?></td>
		<td class="actions">
		
			<center><?php echo $this->Html->link(__('Edit'), array('controller'=> 'Charges','action' => 'edit', $charge['Charge']['id'])); ?> </center>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</tbody>
</table>
</div>
</div>

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('New Charge', array('action' => 'add')); ?></li>
    </ul>
</div>
