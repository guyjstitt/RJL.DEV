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
    $('#user').dataTable({
	"bJQueryUI": true
	});
} );
</script>
</head>

<div class="users index">
	<h2>Users</h2>
	<div class="table-responsive">
	<table class="table" id="user">
	<thead>
	<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Role</th>
			<th class="actions">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['Person']['firstName']; ?>&nbsp;</td>
		<td><?php echo $user['Person']['lastName']; ?>&nbsp;</td>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['Person']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['role']; ?>&nbsp;</td>
		<td class="actions">
			<?php if ($cur_user['id'] == $user['User']['id'] || $cur_user['role'] == 'admin'): ?>
			    <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?> |
			    <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $user['User']['id']), array('confirm'=>'Are you sure you want to delete that user?')); ?>
		    <?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
</div>
<div class="navactions">
	<ul>
		<li><?php echo $this->Html->link('New User', array('action' => 'add')); ?></li>
	</ul>
</div>

</html>