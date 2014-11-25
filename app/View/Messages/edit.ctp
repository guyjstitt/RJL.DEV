<script>
$(document).ready( function () {
	$("li#admin").addClass("active");
});
</script>

<style>
.messageHead {
	display: none;
}
</style>

<legend>Edit Announcement</legend>
<div class="Messages Form">
<?php
echo $this->Form->create('Message');
echo $this->Form->textarea('announcement',
    array('rows' => '12', 'cols' => '80')); 
echo $this->Form->end('Edit');
?>
</div>

<div class="navactions">
	<ul>
		<li><?php echo $this->Html->link(__('List Message'), array('action' => 'index'));?></li>
	</ul>
</div>