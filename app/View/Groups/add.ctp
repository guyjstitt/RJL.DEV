<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('comments');
	?>
	</fieldset>
	<h2>People</h2>
	<table id="mytable">
	<tr><th></th><th>Last Name</th><th>First Name</th><th>Email</th><th>Gender</th></tr>
	<tr id="person0" style="display:none;">
		<td><?php echo $this->Form->button('&nbsp;-&nbsp;',array('type'=>'button','title'=>'Click Here to remove this person')); ?></td>
		<td><?php echo $this->Form->input('unused.lastName',array('label'=>'','type'=>'text')); ?></td>
		<td><?php echo $this->Form->input('unused.firstName',array('label'=>'','type'=>'text')); ?></td>
		<td><?php echo $this->Form->input('unused.email',array('label'=>'','type'=>'text')); ?></td>
		<td><?php echo $this->Form->input('unused.gender',array('label'=>'','type'=>'select','options'=>array('M'=>'M','F'=>'F','T'=>'T'))); ?></td>
	</tr>
	<tr id="trAdd"><td> <?php echo $this->Form->button('+',array('type'=>'button','title'=>'Click Here to add another person','onclick'=>'addPerson()')); ?> </td><td></td><td></td><td></td><td></td></tr>
	</table>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php echo $this->Html->script(array('jquery-1.6.4.min'));?>
<script type='text/javascript'>
	var lastRow=0;
	
	function addPerson() {
		lastRow++;
		$("#mytable tbody>tr:#person0").clone(true).attr('id','person'+lastRow).removeAttr('style').insertBefore("#mytable tbody>tr:#trAdd");
		$("#person"+lastRow+" button").attr('onclick','removePerson('+lastRow+')');
		$("#person"+lastRow+" input:first").attr('name','data[Person]['+lastRow+'][lastName]').attr('id','personLastName'+lastRow);
		$("#person"+lastRow+" input:eq(1)").attr('name','data[Person]['+lastRow+'][firstName]').attr('id','personFirstName'+lastRow);
		$("#person"+lastRow+" input:eq(2)").attr('name','data[Person]['+lastRow+'][email]').attr('id','personEmail'+lastRow);
		$("#person"+lastRow+" select").attr('name','data[Person]['+lastRow+'][gender]').attr('id','personGender'+lastRow);
	}
	
	function removePerson(x) {
		$("#person"+x).remove();
	}
</script>