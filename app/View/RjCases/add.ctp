
<html>
<head>

<style>
.messageHead {
	display: none;
}
</style>

<script src="/rjl/app/webroot/js/RjCase/LocalStorage.js"></script>
<script src="/rjl/app/webroot/js/RjCase/AddSearch.js"></script>
<script src="/rjl/app/webroot/js/RjCase/Dynamics.js"></script>
<script src="/rjl/app/webroot/js/RjCase/Validation.js"></script>
<script src="/rjl/app/webroot/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="/rjl/app/webroot/js/jquery.validate.js"></script>
<script src="/rjl/app/webroot/js/chosen.proto.js"></script>
<script src="/rjl/app/webroot/js/chosen.jquery.js"></script>

<link rel="stylesheet" href="/rjl/app/webroot/css/chosen.css">



<script type="text/javascript">

	function ValidateID()
	{
		var id = $('#caseID').val();
		 $.ajax({                    
			 url:'/rjl/RjCases/CaseIdCheck/' +id,
			 type:"POST",
			 success: function(data) {
				Validate(data);
			}
		});
	}
	function Validate(data)
	{
		if(data==true)
		{
			//case exists so warn and make red
			alert('This Case ID Already Exists, please select another');
			$('#caseID').css({'color': 'red', 'font-weight' : 'bold'});
		}else
		{
			//case does not exist, make sure background is white
			$('#caseID').css({'background-color': 'white'});
		}
	}
	function ValidateVictimID(num)
	{
		var id = $('#victimID'+num).val();
		 $.ajax({                    
			 url:'/rjl/Victims/VictimIdCheck/' +id,
			 type:"POST",
			 success: function(data) {
				ValidateVictim(data,num);
			}
		});
	}
	function ValidateVictim(data,num)
	{
		if(data==true)
		{
			//Victim exists so warn and make red
			alert('This Victim ID Already Exists, please select another');
			$('#victimID'+num).css({'color': 'red', 'font-weight' : 'bold'});
		}else
		{
			//Victim does not exist, make sure background is white
			$('#victimID'+num).css({'background-color': 'white','color': 'black'});
		}
	}
	function ValidateOffID(num)
	{
		var id = $('#offenderID'+num).val();
		 $.ajax({                    
			 url:'/rjl/Offenders/OffIdCheck/' +id,
			 type:"POST",
			 success: function(data) {
				ValidateOff(data,num);
			}
		});

	}
	function ValidateOff(data,num)
	{
		if(data==true)
		{
			//Offender exists so warn and make red
			alert('This Offender ID Already Exists, please select another');
			$('#offenderID'+num).css({'color': 'red', 'font-weight' : 'bold'});
		}else
		{
			//Offender does not exist, make sure background is white
			$('#offenderID'+num).css({'background-color': 'white','color': 'black'});
		}
	}
	function AddVictimCalScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text =
			"$(document).ready(function() { $('#victimDateOfBirth"+num+"').datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,yearRange: '-90:+0'});});";  
		// Use any selector
		document.body.appendChild(s);
	};
	function AddOffenderCalScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = 
		"$(document).ready(function() { $('#offenderDateOfBirth"+num+"').datepicker({dateFormat: 'yy-mm-dd' ,changeMonth: true, changeYear: true,yearRange: '-90:+0'});});"; 
		// Use any selector
		document.body.appendChild(s);
	};

	function AddVictimChosenGenderScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#victimGender"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};

	function AddVictimChosenRaceScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#victimRace"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	function AddVictimChosenPhoneOneTypeScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#victimPhoneOneType"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	function AddVictimChosenPhoneTwoTypeScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#victimPhoneTwoType"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	function AddVictimChosenState(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#victimState"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	
	
	function AddOffenderChosenGenderScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#offenderGender"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};

	function AddOffenderChosenRaceScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#offenderRace"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	function AddOffenderChosenPhoneOneTypeScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#offenderPhoneOneType"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	function AddOffenderChosenPhoneTwoTypeScript(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#offenderPhoneTwoType"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	function AddOffenderChosenState(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#offenderState"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
		function AddOffenderChosenGuardian1(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#offenderGuardianOneRelation"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
		function AddOffenderChosenGuardian2(num) 
	{
		var s = document.createElement("script");
		s.type = "text/javascript";
		s.text = "$(document).ready(function() { $('#offenderGuardianTwoRelation"+num+"').chosen();});"; 
		// Use any selector
		document.body.appendChild(s);
	};
	$(document).ready(function() { 
		$(".casedatepicker").datepicker({
			 dateFormat: 'yy-mm-dd',
			  changeMonth: true,
			  changeYear: true,
			  constrainInput: false,
			  yearRange: "-90:+2"
			});
		$("#caseID").focusout( function (event) { ValidateID(); } );
		$(".chosen-select").chosen();
		SetupValidation();
	});
	
	
	
	



</script>

</head>

<body>

<div class="cases form">

	<?php echo $this->Form->create('RjCase');?>
 
<legend>New Case</legend>	
<div name="mainCase">
	<div class="row required">
	<div class="col-md-3">
			<?php	echo $this->Form->input('caseId',array('label'=>'Case ID','id'=>'caseID','class'=>'required')); ?>
	</div>
	<div class="col-md-3">
			<?php	echo $this->Form->input('caseStatus',array('data-placeholder' => 'Select Status','type'=>'select','class'=>'chosen-select required','options'=>array(''=>'','Open Status'=>array('Open - Pending'=>'Open - Pending', 'Open - Monitoring'=>'Open - Monitoring'),'Closed Status' =>array('Closed'=>'Closed')))); ?>
	</div>
	</div>
	<div class="row required">
		<div class="col-md-3">
			<?php 	echo $this->Form->input('courtDate',array('type'=>'text','class'=>'casedatepicker required','readonly' =>'readonly')); ?>
		</div>
		<div class="col-md-3">
			<?php	echo $this->Form->input('dateOfCharge',array('type'=>'text','class'=>'casedatepicker required','readonly' =>'readonly')); ?>
		</div>
		<div class="col-md-3">
			<?php	echo $this->Form->input('dateOfReferral',array('type'=>'text','readonly' =>'readonly','class'=>'casedatepicker')); ?>
		</div>
	</div>
	<div class="row required">
		<div class="col-md-3">
			<?php	echo $this->Form->input('Charge',array('data-placeholder' => 'Select Charge(s)','class'=>'chosen-select required','label'=>'Charge(s)')); ?>
		</div>
		<div class="col-md-3">
			<?php	echo $this->Form->input('user_id',array('class'=>'chosen-select','label'=>'Assign Case Manager','options'=>$users));?>
		</div>
		<div class="col-md-3">
			<?php	echo $this->Form->input('User',array('class'=>'chosen-select','label'=>'Assign a Facilitator','data-placeholder' => 'Select Facilitator(s)'));?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php 	echo $this->Form->input('caseDescription');?>
			<?php 	echo $this->Form->input('caseClose',array('type' => 'hidden','value'=>1));?>
		</div>
	</div>
</div>

	
	
	<?php $phonetype = array('' => '','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work'); ?>
	<?php  $race=array(''=>'','White'=>'White','African-American' => 'African-American', 'Hispanic'=>'Hispanic', 'Asian'=>'Asian', 'Native Hawaiian/Pacific Islander'=>'Native Hawaiian/Pacific Islander',
'Native American/Alaska Native'=> 'Native American/Alaska Native', 'Other/Mixed'=>'Other/Mixed'); ?>
	
	
	<?php $relation = array('' => '', 'Parent' => 'Parent', 'Family Member'=> 'Family Member', 'Foster Parent' =>'Foster Parent', 'Other' =>'Other'); ?>
	
	<h3>Offenders</h3><span id="totalOffenders" data-counter =0></span>
	<div class="table-responsive">
	<table class="table" id="offendersTable">
	<tr>
	<tr id="offender0" style="display:none;">
		<td><?php echo $this->Form->button('&nbsp;Remove this Offender&nbsp;',array('type'=>'button','class'=>'remove','title'=>'Click Here to remove this offender','onclick'=>'removeOffender()')); ?>
		<div class="row">
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.offenderId',array('class'=>'oTxtID','label'=>'Offender ID','type'=>'text')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.firstName',array('class'=>'oFN','label'=>'First Name','type'=>'text','div'=>false)); ?>
				<button type="button" class="fnSearch">Search</button>
			</div>
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.lastName',array('class'=>'oLN','label'=>'Last Name','type'=>'text','div'=>false)); ?>
				<button type="button" class="lnSearch search">Search</button>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.socialSecurityNumber',array('class'=>'oSSN','label'=>'SSN','div'=>false)); ?>
				<button type="button" class="ssnSearch search">Search</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.dateOfBirth',array('label'=>'Date Of Birth','type'=>'text','class'=>'offenderdatepicker','readonly' =>'readonly')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.race',array('data-placeholder'=>'Select Race','class'=>'or','label'=>'Race','type'=>'select','options'=>$race)); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.gender',array('data-placeholder'=>'Select Gender','class'=>'og','label'=>'Gender','type'=>'select','options'=>array(''=>'','Male' =>'Male','Female'=>'Female'))); ?>
			</div>
		</div>
			<div class="row required">
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.streetAddress',array('class'=>'oADDR','label'=>'Street Address','type'=>'text')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.city',array('class'=>'oCITY','label'=>'City','type'=>'text')); ?>
			</div>
			<div class="col-md-2">
				<?php echo $this->Form->input('unused.state',array('value' => 'KY','class'=>'oST','label'=>'State','type'=>'select', 'options'=>$states)); ?>
			</div>
			<div class="col-md-2">
				<?php echo $this->Form->input('unused.zipCode',array('class'=>'smBox oZIP','label'=>'Zip Code','type'=>'text')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.guardianOneFirstName',array('class'=>'oPGF','label'=>'Primary Guardian First Name','type'=>'text')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.guardianOneLastName',array('class'=>'oPGL','label'=>'Primary Guardian Last Name','type'=>'text')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.guardianOneRelation',array('class'=>'oPGR','data-placeholder'=>'Choose Relation', 'label'=>'Primary Guardian Relation','options'=>$relation)); ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.guardianTwoFirstName',array('class'=>'oSGF','label'=>'Secondary Guardian First Name','type'=>'text')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.guardianTwoLastName',array('class'=>'oSGL','label'=>'Secondary Guardian Last Name','type'=>'text')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.guardianTwoRelation',array('class'=>'oSGR','data-placeholder'=>'Choose Relation','label'=>'Secondary Guardian Relation','type'=>'select','options'=>$relation)); ?>
			</div>
		</div>
	
		<div class="row">	
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.phoneOne',array('class'=>'oPH1','label'=>'Primary Phone','type'=>'text')); ?>
				<?php echo $this->Form->input('unused.phoneOneType',array('data-placeholder'=>'Select Type','class'=>'opt1','label'=>'Primary Phone Type','type'=>'select','options'=>$phonetype)); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.phoneTwo',array('class'=>'oPH2','label'=>'Secondary Phone','type'=>'text')); ?>
				<?php echo $this->Form->input('unused.phoneTwoType',array('data-placeholder'=>'Select Type','class'=>'opt2','label'=>'Secondary Phone Type','type'=>'select','options'=>$phonetype)); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.email',array('class'=>'oEML','label'=>'Email','type'=>'text')); ?>
				<?php echo $this->Form->input('unused.commHours',array('class'=>'oCMH','label'=>'Community Service Hours')); ?>
			</div>
		</div>
		<div class="row">
			<?php echo $this->Form->input('unused.id',array('class'=>'oID','type'=>'hidden')); ?>
		</div>
		</td>
	</tr>
	<tr id="ofAdd"> </tr>
	<tfoot>
		<tr>
		<td id="ofAdd"> <?php echo $this->Form->button('Add Offender(s)',array('type'=>'button','label'=>'Click Here to add another offender','onclick'=>'addOffender()')); ?> </td>
		<tr>
	</tfoot>
	</table>
	</div>

	<h3>Victims</h3>
	<div class="table-responsive">
	<table class="table" id="victimsTable">
	<tr>
	<tr id="victim0" style="display:none;">
		<td><?php echo $this->Form->button('&nbsp;Remove this Victim&nbsp;',array('type'=>'button','class'=>'remove','title'=>'Click Here to remove this victim','onclick'=>'removePerson()')); ?>
		<div class="row">
			<div class="col-md-3 required">
				<?php echo $this->Form->input('unused.victimId',array('class'=>'vTxtID','label'=>'Victim ID','id'=>'resultField2')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.firstName',array('class'=>'vFN','label'=>'First Name','div'=>false)); ?>
				<button type="button" class="fnSearch search">Search</button>
			</div>
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.lastName',array('class'=>'vLN','label'=>'Last Name','div'=>false)); ?>
				<button type="button" class="lnSearch search">Search</button>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused..socialSecurityNumber',array('class'=>'vSSN','label'=>'SSN','div'=>false)); ?>
				<button type="button" class="ssnSearch search">Search</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.age',array('type'=>'text','class'=>'age','label'=>'Age')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.dateOfBirth',array('type'=>'text','class'=>'victimdatepicker')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.race',array('data-placeholder' => 'Select Race','class'=>'r','label'=>'Race','type'=>'select','options'=>$race)); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.gender',array('data-placeholder' => 'Select Gender','class'=>'g','label'=>'Gender','type'=>'select','options'=>array(''=>'','Male' =>'Male','Female'=>'Female'))); ?>
			</div>
		</div>
		<div class="row required">
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.streetAddress',array('class'=>'vADDR','label'=>'Street Address')); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.city',array('class'=>'vCITY','label'=>'City')); ?>
			</div>
			<div class="col-md-2">
				<?php echo $this->Form->input('unused.state',array('value'=>'KY','class'=>'vST','label'=>'State', 'type'=>'select', 'options'=>$states)); ?>
			</div>
			<div class="col-md-2">
				<?php echo $this->Form->input('unused.zipCode',array('class'=>'smBox vZIP','label'=>'Zip')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 required">
				<?php echo $this->Form->input('unused.phoneOne',array('class'=>'vPh1','label'=>'Primary Phone')); ?>
				<?php echo $this->Form->input('unused.phoneOneType',array('data-placeholder' => 'Select Type','class'=>'p1t','label'=>'Primary Phone Type','type'=>'select','options'=>$phonetype)); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.phoneTwo',array('class'=>'vPh2','label'=>'Secondary Phone')); ?>
				<?php echo $this->Form->input('unused.phoneTwoType',array('data-placeholder' => 'Select Type','class'=>'p2t','label'=>'Secondary Phone Type','type'=>'select','options'=>$phonetype)); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->input('unused.email',array('class'=>'vEML','label'=>'Email')); ?>
			<?php echo $this->Form->input('unused.id',array('class'=>'vID','type'=>'hidden','Id'=>'IDVictim')); ?>
			</div>
		</div>
		</div>
		</td>
	</tr>
	<tr id="trAdd"> </tr>
	<tfoot>
		<tr>
		<td id="trAdd"> <?php echo $this->Form->button('Add Victim(s)',array('type'=>'button','label'=>'Click Here to add another victim','onclick'=>'addPerson()')); ?> </td>
		<tr>
	</tfoot>
	</table>
	</div>

 
	
<?php echo $this->Form->end(__('Submit'));?>

</div>

<div class="navactions">
	<ul>

		<li><?php echo $this->Html->link(__('List Cases'), array('action' => 'index'));?></li>
		
	</ul>
</div>

</body>

