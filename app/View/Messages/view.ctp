<div class="announcements view">
<h2>Announcements</h2>
<div class="table-responsive">
	<table class="table">
	<tr>
        <th>Role</th>
		<th>Announcement</th>
		
	</tr>
	<tr>
        <td><?php echo $announcement['Announcement']['role']; ?></td>
        <td><?php echo $announcement['Announcement']['announcement']; ?></td>
	</tr>
    </table>
</div>
</div>


<div class="navactions">
    <h3>Actions</h3>
    <ul>
        <li><?php echo $this->Html->link
('Edit Announcement', array('action' => 'edit', $announcement['Announcement']['id'])); ?> </li>
        <li><?php echo $this->Html->link
('Delete Announcement', array('action' => 'delete', $announcement['Announcement']['id']),
null, sprintf('Are you sure you want to delete # %s?', $announcement['Announcement']['id'])); ?> </li>
        <li><?php echo $this->Html->link
('List Announcements', array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link
('New Announcement', array('action' => 'add')); ?> </li>
    </ul>
</div>