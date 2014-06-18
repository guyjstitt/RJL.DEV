<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script>
$(document).ready(function() { 
  $(".evictimdatepicker").datepicker({
	 dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  yearRange: "-90:+2"
    });
	$("li#admin").addClass("active");
	
	$("#closeForm").validate({ignore: ":hidden:not(select)"});
}); 
</script>

<style>
.messageHead {
	display: none;
}
</style>

<legend>Edit Case Close Reason</legend>
<div class="reasons form">
<?php	echo $this->Form->create('Reason',array('id'=>'closeForm')); ?>
<div class="required">
<?php	echo $this->Form->input('closeReason',array('class'=>'required')); ?>
</div>
<?php	echo $this->Form->end('Edit'); ?>
</div>
<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('List Case Close Reasons', 
array('action' => 'index'));?></li>
    </ul>
</div>