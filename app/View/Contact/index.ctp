<h2>Files</h2>
<div class="table-responsive">
	<table class="table">
    <tr>
		<th>File Name</th>
		<th>Path Name</th>
        <th class="actions">Actions</th>
	</tr>
	<?php foreach ($contacts as $contact): ?>	
	<tr>
        <td><?php echo $contact['Contact']['name']; ?></td>
		  <td><?php echo $contact['Contact']['filename']; ?></td>
		   <td class="actions">
             <?php echo $this->Html->link(__('Download'), array('controller' => 'contact', 'action' => 'download', $contact['Contact']['id'])); ?>

    </tr>
	<?php endforeach; ?>
	</table>
</div>
</div>

<div class="navactions">
    <h3>Actions</h3>
    <ul>
        <li><?php echo $this->Html->link
('View', array('action' => 'view', $contact['Contact']['id'])); ?> </li>
    </ul>
</div>