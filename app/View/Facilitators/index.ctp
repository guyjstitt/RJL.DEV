<style>
.messageHead {
	display: none;
}
</style>
 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 
 
<script>
$(document).ready( function () {
    $('#files').dataTable({
	"bJQueryUI": true
	});
} );
</script>
 
<h2>Files</h2>
<div class="table-responsive">
	<table class="table" id="files">
	<thead>
    <tr>
		<th>File Name</th>
		<th>Created</th>
		<th>Modified</th>
        <th class="actions">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($facilitators as $facilitator): ?>	
	<tr>
        <td><?php echo $facilitator['Facilitator']['name']; ?></td>
		  <td><?php echo $facilitator['Facilitator']['created']; ?></td>
		  <td><?php echo $facilitator['Facilitator']['modified']; ?></td>
		   <td class="actions center">
             <?php echo $this->Html->link(__('Download'), array('controller' => 'facilitators', 'action' => 'download', $facilitator['Facilitator']['id'])); ?> 
            <?php if ($cur_user['role']=='admin' || $cur_user['role']=='admin'): 
              echo "| ";
              echo $this->Form->postLink('Delete', array('action' => 'delete', $facilitator['Facilitator']['id']), array('confirm'=>'Are you sure you want to delete this document?')); ?>
         	<?php endif ?>
    </tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>

<?php if ($cur_user['role']!=='facilitator'): ?>
<h2>Upload File</h2>
<?php 
echo $this->Form->create('Facilitator', array('type'=>'file'));
echo $this->Form->input('name');


?>

<?php if (!empty($this->data['Facilitator']['filepath'])): ?>
	<div class="input">
		<label>Uploaded File</label>
		<?php
		
		echo $this->Form->input('filepath', array('type'=>'hidden'));
		echo $this->Html->link(basename($this->data['Facilitator']['filepath']), $this->data['Facilitator']['filepath']);
		?>
	</div>
<?php else: ?>
	<?php echo $this->Form->input('filename',array(
		'type' => 'file'
	)); ?>
<?php endif; ?>

<?php
echo $this->Form->end('Submit');
?>
<?php endif ?>

<?php if ($cur_user['role']=='facilitator'): ?>

<div class="navactions">
	
	<ul>
		<li><?php echo $this->Html->link(__('Go To Cases'), array('controller' => 'Home','action' => 'index')); ?></li>
	</ul>
</div>

<?php endif ?>
