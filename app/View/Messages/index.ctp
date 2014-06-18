
<style>
.messageHead {
	display: none;
}
</style>

<div class="messages index">
    <h2>Announcements</h2>
	<div class="table-responsive">
	<table class="table" id="messages">
    <thead>
		<tr>
            <th>Role</th>
            <th>Message</th>
			<th>Actions</th>
        </tr>
	<thead>
	<tbody>
    <?php foreach ($messages as $messages): ?>
    <tr>
        <td><?php echo $messages['Message']['role']; ?> </td>
        <td><?php echo $messages['Message']['announcement']; ?> </td>
      
        <td class="actions">
            <center><?php echo $this->Html->link('Edit',array('action' => 'edit', $messages['Message']['id'])); ?> </center>
         </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
</div>
</div>