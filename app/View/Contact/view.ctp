<h2>View Upload</h2>
<?php echo ($contact['Contact']['id']); ?>
<?php echo ($contact['Contact']['name']); ?>
<?php echo ($contact['Contact']['filename']); ?>

<div class="navactions">
    <h3>Actions</h3>
    <ul>
        <?php echo $this->Html->link(__('Download'), array('controller' => 'contact', 'action' => 'download', $contact['Contact']['id'])); ?>
    </ul>
</div>