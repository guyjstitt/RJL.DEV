
<head>	
	<link rel="stylesheet" href="/rjl/app/webroot/css/jquery.dataTables_themeroller.css" /> 
	<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.min.css" /> 
	<link rel="stylesheet" href="/rjl/app/webroot/css/jquery-ui-1.10.4.custom.css" /> 
	
	<script>
	$(document).ready( function () {
	    $('#notes').dataTable({
		"bJQueryUI": true,
        "bAutoWidth": false,
		"aoColumns":[
		{sWidth: '10%'},
		{sWidth: '20%'},
		{sWidth: '10%'},
		{sWidth: '50%'},
		{sWidth: '10%'}]
		});
		//notes.fnDraw();
	} );
	</script> 
	
<style>
.messageHead {
	display: none;
}
</style>
</head>

<div class="cases">

<h2>RJ Case</h2>
<input type="hidden" id="ID" value="<?php echo h($case['RjCase']['id']); ?>">
	<table class="holder">
	<tr>
		<td class="left"><h4>Case ID</h4></td>
		<td id="caseID" class="right"><p><?php echo h($case['RjCase']['caseId']); ?><p></td>
	</tr>
	<tr>
		<td class="left"><h4>Case Status</h4></td>
		<td class="right"><p><?php echo h($case['RjCase']['caseStatus']); ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Case Closed Reason</h4></td>
		<td class="right"><p><?php echo h($caseClose['Reason']['closeReason']); ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Court Date</h4></td>
		<td class="right"><p><?php echo h($case['RjCase']['courtDate']); ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Date of Charge</h4></td>
		<td class="right"><p><?php echo h($case['RjCase']['dateOfCharge']); ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Date of Referral</h4></td>
		<td class="right"><p><?php echo h($case['RjCase']['dateOfReferral']); ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Case Description</h4></td>
		<td class="right"><p><?php echo h($case['RjCase']['caseDescription']); ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Case Manager</h4></td>
		<td class="right"><p><?php echo h($caseManagerUserName['User']['username']); ?></p></td>
	</tr>
	<tr>
		<td class="left"><h4>Facilitator</h4></td>
		<td class="right"><p><?php if(!empty($case['User'][0]['username'])) echo h($case['User'][0]['username']);
		if(!empty($case['User'][1]['username'])) echo ', ', ($case['User'][1]['username']);
		if(!empty($case['User'][2]['username'])) echo ', ', ($case['User'][2]['username']);
		if(!empty($case['User'][3]['username'])) echo ', ', ($case['User'][3]['username']);
		if(!empty($case['User'][4]['username'])) echo ', ', ($case['User'][4]['username']);
		if(!empty($case['User'][5]['username'])) echo ', ', ($case['User'][5]['username']);
		?></p></td>
	</tr>
	</table>
</div>


<h3><?php echo __('Charges');?></h3>

<div class="table-responsive">
	<table class="table view">
	<tr>
		<th><?php echo __('UOR Code'); ?></th>
		<th><?php echo __('KRS'); ?></th>
		<th><?php echo __('Charges'); ?></th>
		<?php if ($cur_user['role']!=='facilitator'): ?>
		<th class="actions"><?php echo __('Actions');?></th>
		<?php endif ?>
	</tr>
	<?php
		$i = 0;
		foreach ($chargesData as $charge): ?>
		<tr>
			<td><?php echo $charge['ChargesJoin']['uorCode'];?></td>
			<td><?php echo  $charge['ChargesJoin']['krs'];?></td>
			<td><?php echo  $charge['ChargesJoin']['charges'];?></td>
			<?php if ($cur_user['role']!=='facilitator'): ?>
			<td class="actions"> 
				
				<center> <?php echo $this->Html->link(__('Edit'), array('controller' => 'charges', 'action' => 'edit', $charge['ChargesJoin']['id'])); ?></center>
			</td>
			<?php endif ?>
		</tr>
	<?php endforeach; ?> 
	</table>
</div>

	
<?php if (!empty($case['Offender'])):?>
<h3><?php echo __('Related Offenders');?></h3>
<div class="table-responsive">
	<table class="table view">
	<tr>
		<th><?php echo __('Offender ID'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Date of Birth'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		
		<th class="actions"><?php echo __('Actions');?></th>
		
	</tr>
	<?php
		$i = 0;
		foreach ($dataO as $offender): ?>
		<tr>
			<td><?php echo $offender['OffenderJoin']['offenderId'];?></td>
			<td><?php echo $offender['OffenderJoin']['firstName'];?></td>
			<td><?php echo $offender['OffenderJoin']['lastName'];?></td>
			<td><?php echo $offender['OffenderJoin']['dateOfBirth'];?></td>
			<td><?php echo $offender['OffenderJoin']['gender'];?></td>
			
			<td class="actions">
				
				<?php echo $this->Html->link(__('View'), array('controller' => 'offenders', 'action' => 'view', $offender['OffenderJoin']['id'], $offender['RjCase']['id'])); ?>  
				
				
				<?php if ($cur_user['role']!=='facilitator'): ?>|
				
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'offenders', 'action' => 'edit', $offender['OffenderJoin']['id'], $offender['RjCase']['id'])); ?> 
				<?php endif ?>
			</td>
			
		</tr>
	<?php endforeach; ?>
	</table>
</div>
<?php endif; ?>


<?php if (!empty($case['Victim'])):?>
<h3><?php echo __('Related Victims');?></h3>


<div class="table-responsive">
	<table class="table view">
	<tr>
		<th><?php echo __('Victim ID'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Date of Birth'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		
		<th class="actions"><?php echo __('Actions');?></th>
		
	</tr>
	<?php
		$i = 0;
		foreach ($data as $victim): ?>
		<tr>
			<td><?php echo $victim['VictimJoin']['victimId'];?></td>
			<td><?php echo $victim['VictimJoin']['firstName'];?></td>
			<td><?php echo $victim['VictimJoin']['lastName'];?></td>
			<td><?php echo $victim['VictimJoin']['dateOfBirth'];?></td>
			<td><?php echo $victim['VictimJoin']['gender'];?></td>
			
			<td class="actions"> 
				<?php echo $this->Html->link(__('View'), array('controller' => 'victims', 'action' => 'view', $victim['VictimJoin']['id'], $victim['RjCase']['id'])); ?>
				<?php if ($cur_user['role']!=='facilitator'): ?>|
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'victims', 'action' => 'edit', $victim['VictimJoin']['id'], $victim['RjCase']['id'])); ?>
				<?php endif ?>
			</td>
		
		</tr>
	<?php endforeach; ?> 
	</table>

</div>

<?php endif; ?>


<h3>Case Notes</h3>
<div class="notes">
<div class="table-responsive">
	<table class="table" id="notes">
	<thead>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('Note Date'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Actions'); ?></th>
	</thead>
	<tbody class="table">
	<?php
		if (!empty($case['Note'])){
		for($i = 0; $i < count($notes); $i++){ ?>
		<tr>
			<td><?php echo $i+1;?></td>
			<td><?php echo $notes[$i]['Note']['noteDate'];?></td>
			<td><?php echo $notes[$i]['Code'][0]['code'];?></td>
			<td><?php echo $notes[$i]['Note']['noteContent'];?></td>
			<td class="actions"> 
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'Edit', 'action' => 'edit', $notes[$i]['Note']['id'],$notes[$i]['Note']['rj_case_id'])); ?>
				| <?php echo $this->Form->postLink('Delete', array('controller' =>'Notes','action'=> 'delete', $notes[$i]['Note']['id']), array('confirm'=>'Are you sure you want to delete that note?')); ?>
			</td>
		</tr>
		<?php }} ?>
	</tbody>
	</table>
</div>
<h4>Add Case Note</h4>
<div class="table-responsive">
	<table class="table notes">
	  <col width="10%">
	  <col width="20%">
	  <col width="10%">
	  <col width="60%">
		<tr>
			<td><button id="addNote" type="button">Add Note</button></td>
			<td><input id="noteDate" type="text" name="noteDate"></td>
			<td><?php echo $this->Form->input('code', array('empty' => true,'label'=> false));?></td>
			<td><textarea id="noteContent" rows="2" cols="25" name="noteContent"></textarea></td>
		</tr>
	</table>
</div>
</div>

<div class="table-responsive">
<table class="table holder">
<tr>
	<td class="fileL">
	<h3>File Attachments</h3>

	<div class="table-responsive">
		<table class="table view">
		<tr>
			<th><?php echo __('File Name'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($case['Contact'] as $file): ?>
			<tr>
				<td><?php echo $file['name'];?></td>
				<td><?php echo $file['created'];?></td>
				<td><?php echo $file['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Download'), array('controller' => 'contact', 'action' => 'download', $file['id'])); ?> 
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
	<?php if ($cur_user['role']!=='facilitator'): ?>
	</td>
		<td class="fileR">
		<h3>Upload File</h3>
		<?php 
		echo $this->Form->create('Contact', array('type'=>'file'));
		echo $this->Form->input('name');
		echo $this->Form->input('case_id',array('class'=>'hide', 'label'=>false));
		?>

		<?php if (!empty($this->data['Contact']['filepath'])): ?>
			<div class="input">
				<label>Uploaded File</label>
				<?php
				
				echo $this->Form->input('filepath', array('type'=>'hidden'));
				echo $this->Html->link(basename($this->data['Contact']['filepath']), $this->data['Contact']['filepath']);
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
		</td>
</tr>
</table>
</div>
<?php endif ?>
<?php if ($cur_user['role']!=='facilitator'): ?>
<div class="navactions">
	
	<ul>
		<li><?php echo $this->Html->link(__('Edit Case'), array('action' => 'edit', $case['RjCase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Attach New Victim'), array('controller'=>'Victims','action' => 'add',$case['RjCase']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Attach New Offender'), array('controller'=>'Offenders','action' => 'add',$case['RjCase']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('New Case'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cases'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php endif ?>

<?php if ($cur_user['role']=='facilitator'): ?>

<div class="navactions">
	
	<ul>
		<li><?php echo $this->Html->link(__('List Cases'), array('controller' =>'Home','action' => 'index')); ?></li>
	</ul>
</div>
<?php endif ?>

<script type="text/javascript">
	$("#addNote").click(function()
			{
			var noteContentEscape = $('#noteContent').val();
			noteContentEscape = noteContentEscape.replace(/\//g, "-");

			urlstring = $('#noteDate').val() + '/' + $('#ID').val() + '/' + $('#code').val() + '/' + noteContentEscape;
			 $.ajax({                    
				 url:'/rjl/Notes/add/' +urlstring,
				 type:"POST",
				 success: function(data) {
					var newData = JSON.parse(data);
					refreshPage();
				}
			});
			}
	);
		 
	  $("#noteDate").datepicker({
		 dateFormat: 'yy-mm-dd',
		  changeMonth: true,
		  changeYear: true,
		});
	
	function AppendTable(nArray){
		row = "<td></td><td>"+nArray.Note.noteDate+"</td><td>"+nArray.Code.code+"</td><td>"+nArray.Note.noteContent+"</td>";
		$('#notes tr:last').before(row);
	}

	function refreshPage () {
		var page_y = document.getElementsByTagName("body")[0].scrollTop;
		window.location.href = window.location.href.split('?')[0] + '?page_y=' + page_y;
		//document.location.reload(true);
		//alert('Am I refreshed?');
	}
	

</script>

