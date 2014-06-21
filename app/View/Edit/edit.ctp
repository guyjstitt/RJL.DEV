<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>
<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/additional-methods.js"></script>



<script>
$(document).ready(function() { 
  $(".notedatepicker").datepicker({
	 dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  yearRange: "-90:+0"
    });
  $(".chosen-select").chosen();
}); 
</script>

<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">


<legend>Edit Note</legend>

<?php	echo $this->Form->create('Note',array('id'=>'noteForm')); ?>
<div class="row">
	<div class="col-md-3">
		<?php	echo $this->Form->input('Code',array('options'=>$codes,'type'=>'select', 'class'=>'chosen-select')); ?>
		<?php	echo $this->Form->input('noteDate',array('class'=>'notedatepicker','type'=>'text')); ?>
		<?php	echo $this->Form->input('noteContent'); ?>
		<?php	echo $this->Form->end('Edit'); ?>
	</div>
</div>	

<div class="navactions">
    <ul>
        <li><?php echo $this->Html->link('Return to case', array('controller'=>'RjCases', 'action' => 'view',$case['Note']['rj_case_id']));?></li>
    </ul>
</div>