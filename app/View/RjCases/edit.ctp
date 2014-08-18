<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/additional-methods.js"></script>
<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>
<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">
<script>

$(document).ready(function() { 
  $(".ecasedatepicker").datepicker({
	 dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	  yearRange: "-90:+2"
    });
	$(".chosen-select").chosen();
	
		$("#casForm").validate({ignore: ":hidden:not(select)"});
}); 


</script>
<style>
.messageHead {
	display: none;
}
</style>



<div class="RjCases form">
<?php
$close = array('This Case has not been closed' => 'This Case has not been closed','Identified victim could not be located.' => 'Identified victim could not be located.', 'No victim identified and representatives of the community could not be identified.' => 'No victim identified and representatives of the community could not be identified.', 'Identified victim did not respond to contact from RJL.' => 'Identified victim did not respond to contact from RJL.', 'Identified victim did not wish to participate in the conference process.' => 'Identified victim did not wish to participate in the conference process', ' Identified victim did not wish to participate in the conference process/prosecution of case' => ' Identified victim did not wish to participate in the conference process/prosecution of case.', ' Identified offender did not wish to participate.' => ' Identified offender did not wish to participate.', 
'Identified offender did not respond to contact from RJL.' => 'Identified offender did not respond to contact from RJL.', 'Identified victim did not attend preconference meeting after several scheduled meetings.' => 'Identified victim did not attend preconference meeting after several scheduled meetings.', ' Identified offender did not attend preconference meeting after several scheduled meetings'=>' Identified offender did not attend preconference meeting after several scheduled meetings');
$phases = array('Open' => 'Open', 'Closed'=>'Closed');

echo $this->Form->create('RjCase',array('id'=>'casForm'));

?>

<legend>Edit Case</legend>
<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('caseId',array('label'=>'Case ID','class'=>'required')); ?>
	</div>
	<div class="col-md-3">
		<?php	echo $this->Form->input('caseStatus',array('data-placeholder' => 'Select Status','type'=>'select','class'=>'chosen-select required','options'=>array(''=>'','Open Status'=>array('Open - Pending'=>'Open - Pending', 'Open - Monitoring'=>'Open - Monitoring'),'Closed Status' =>array('C'=>'Closed')))); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('caseClose',array('class'=>'chosen-select required','options'=>$closeReasons,'label'=>'Case Close Reason')); ?>
	</div>
</div>
<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('dateOfReferral',array('type'=>'text','class'=>'ecasedatepicker required')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('courtDate',array('type'=>'text','class'=>'ecasedatepicker required')); ?>
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('dateOfCharge',array('type'=>'text','class'=>'ecasedatepicker required')); ?>
	</div>
</div>
<div class="row required">
	<div class="col-md-3">
		<?php echo $this->Form->input('Charge',array('class'=>'chosen-select required'));?>
	</div>
	<?php if ($cur_user['role']!='caseadmin' && $cur_user['role']!='casemanager'): ?>
	<div class="col-md-3">
		<?php	echo $this->Form->input('user_id',array('class'=>'chosen-select','label'=>'Assign Case Manager','options'=>$users));?>
	</div>
	<?php endif ?>
	<div class="col-md-3">
		<?php	echo $this->Form->input('User',array('class'=>'chosen-select','label'=>'Assign a Facilitator','data-placeholder' => 'Select Facilitator(s)'));?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->input('caseDescription'); ?>
	</div>
</div>
<?php echo $this->Form->end('Save'); ?>




</div>

<div class="navactions">
	<ul>
		<li><?php echo $this->Html->link(__('List Cases'), array('action' => 'index'));?></li>
	</ul>
</div>