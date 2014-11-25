<head>
<a id="docs" href="http://docs.jquery.com/Plugins/Validation" target="_blank">Validation Documentation</a>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
<script>
 
//<![CDATA[ 
$(window).load(function(){
$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            field1: {
                required: true
            }
        },
        messages: {
            field1: {
                required: "Enter something"
            }
        },
        submitHandler: function (form) { // for demo
            alert('valid form submitted'); // for demo
            return false; // for demo
        }
    });

    $('[name*="field"]').each(function () {
        $(this).rules('add', {
            required: true,
            messages: {
                required: "Enter something else"
            }
        });
    });

});
});//]]>  




</script>
</head>

<div class="cases form">
<?php echo $this->Form->create('RjCase');?>

	<?php 
	
	echo $this->Form->inputs(array('caseId'=>array('label'=>'Case ID') , 'caseStatus', 'dateOfReferral', 'courtDate', 'dateOfCharge', 'chargeNumber', 'caseDescription'));
	echo $this->Form->input('Victim.firstName',array('label'=>'First Name')); 
	echo $this->Form->input('Victim.lastName',array('label'=>'Last Name')); 
	echo $this->Form->input('Victim.dateOfBirth',array('label'=>'Date Of Birth')); 
	if ($cur_user['role'] == 'admin'):
	echo $this->Form->input('user_id',array('label'=>'Assign Case Manager'));
	endif;
	?>
	
	<h3>Add Victims</h3>
	<div class="table-responsive">
	<table class="table" id="victimsTable">
	<tr>
	<tr id="victim0" style="display:none;">
		<td><?php echo $this->Form->button('&nbsp;Remove this Victim&nbsp;',array('type'=>'button','title'=>'Click Here to remove this victim','onclick'=>'removePerson()')); ?>
		<?php echo $this->Form->input('Victim.0.victimId',array('label'=>'Victim ID','type'=>'text','name'=>'field1')); ?>
		<?php echo $this->Form->input('victim.0.firstName',array('label'=>'First Name','type'=>'text')); ?>
		<?php echo $this->Form->input('victim.0.lastName',array('label'=>'Last Name','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.dateOfBirth',array('label'=>'Date Of Birth')); ?>
		<?php echo $this->Form->input('Victim.0.gender',array('label'=>'Gender','type'=>'select','options'=>array('M'=>'M','F'=>'F','T'=>'T'))); ?>
		<?php echo $this->Form->input('Victim.0.race',array('label'=>'Race','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.streetAddress',array('label'=>'Street Address','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.zipCode',array('label'=>'Zip Code','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.city',array('label'=>'City','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.state',array('label'=>'State','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.phoneOne',array('label'=>'Phone One','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.phoneOneType',array('label'=>'Phone One Type','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.phoneTwo',array('label'=>'Phone Two','type'=>'text')); ?>
		<?php echo $this->Form->input('Victim.0.phoneTwoType',array('label'=>'Phone Two Type','type'=>'text')); ?>
		</td>
	</tr>
	<tr id="trAdd"> </tr>
	<tfoot>
		<tr>
		<td id="trAdd"> <?php echo $this->Form->button('Add Victim(s)',array('type'=>'button','label'=>'Click Here to add another victim','onclick'=>'addPerson()')); ?> </tr>
		<tr>
	</tfoot>
	</table>
	</div>
	
	<h3>Add Offenders</h3>
	<div class="table-responsive">
	<table class="table" id="offendersTable">
	<tr>
	<tr id="offender0" style="display:none;">
		<td><?php echo $this->Form->button('&nbsp;Remove this Offender&nbsp;',array('type'=>'button','title'=>'Click Here to remove this offender','onclick'=>'removeOffender()')); ?>
		<?php echo $this->Form->input('Offender.0.offenderId',array('label'=>'Offender ID','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.firstName',array('label'=>'First Name','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.lastName',array('label'=>'Last Name','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.dateOfBirth',array('label'=>'Date Of Birth','type'=>'date')); ?>
		<?php echo $this->Form->input('Offender.0.gender',array('label'=>'Gender','type'=>'select','options'=>array('M'=>'M','F'=>'F','T'=>'T'))); ?>
		<?php echo $this->Form->input('Offender.0.race',array('label'=>'Race','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.streetAddress',array('label'=>'Street Address','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.zipCode',array('label'=>'Zip Code','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.city',array('label'=>'City','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.state',array('label'=>'State','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.phoneOne',array('label'=>'Phone One','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.phoneOneType',array('label'=>'Phone One Type','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.phoneTwo',array('label'=>'Phone Two','type'=>'text')); ?>
		<?php echo $this->Form->input('Offender.0.phoneTwoType',array('label'=>'Phone Two Type','type'=>'text')); ?>
		</td>
	</tr>
	<tr id="ofAdd"> </tr>
	<tfoot>
		<tr>
		<td id="ofAdd"> <?php echo $this->Form->button('Add Offender(s)',array('type'=>'button','label'=>'Click Here to add another offender','onclick'=>'addOffender()')); ?> </tr>
		<tr>
	</tfoot>
	</table>
	</div>
	
<?php echo $this->Form->end(__('Submit'));?>
</div>

<div class="navactions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cases'), array('action' => 'index'));?></li>
	</ul>
</div>

<?php echo $this->Html->script(array('jquery-1.6.4.min'));?>
<script type='text/javascript'>

	var lastRow=0;
	
	function addPerson() {
		lastRow++;
		$("#victimsTable tbody>tr:#victim0").clone(true).attr('id','victim'+lastRow).removeAttr('style').insertBefore("#victimsTable tbody>tr:#trAdd");
		$("#victim"+lastRow+" button").attr('onclick','removePerson('+lastRow+')');
		$("#victim"+lastRow+" input:first").attr('name','data[Victim]['+lastRow+'][victimId]').attr('id','victimVictimID'+lastRow);
		$("#victim"+lastRow+" input:eq(1)").attr('name','data[Victim]['+lastRow+'][firstName]').attr('id','victimFirstName'+lastRow);
		$("#victim"+lastRow+" input:eq(2)").attr('name','data[Victim]['+lastRow+'][lastName]').attr('id','victimLastName'+lastRow);
		$("#victim"+lastRow+" date").attr('name','data[Victim]['+lastRow+'][dateOfBirth]').attr('id','victimDateOfBirth'+lastRow);
		$("#victim"+lastRow+" select").attr('name','data[Victim]['+lastRow+'][gender]').attr('id','victimGender'+lastRow);
		$("#victim"+lastRow+" input:eq(3)").attr('name','data[Victim]['+lastRow+'][race]').attr('id','victimRace'+lastRow);
		$("#victim"+lastRow+" input:eq(4)").attr('name','data[Victim]['+lastRow+'][streetAddress]').attr('id','victimStreetAddress'+lastRow);
		$("#victim"+lastRow+" input:eq(5)").attr('name','data[Victim]['+lastRow+'][zipCode]').attr('id','victimZipCode'+lastRow);
		$("#victim"+lastRow+" input:eq(6)").attr('name','data[Victim]['+lastRow+'][city]').attr('id','victimCity'+lastRow);
		$("#victim"+lastRow+" input:eq(7)").attr('name','data[Victim]['+lastRow+'][state]').attr('id','victimState'+lastRow);
		$("#victim"+lastRow+" input:eq(8)").attr('name','data[Victim]['+lastRow+'][phoneOne]').attr('id','victimPhoneOne'+lastRow);
		$("#victim"+lastRow+" input:eq(9)").attr('name','data[Victim]['+lastRow+'][phoneOneType]').attr('id','victimPhoneOneType'+lastRow);
		$("#victim"+lastRow+" input:eq(10)").attr('name','data[Victim]['+lastRow+'][phoneTwo]').attr('id','victimPhoneTwo'+lastRow);
		$("#victim"+lastRow+" input:eq(11)").attr('name','data[Victim]['+lastRow+'][phoneTwoType]').attr('id','victimPhoneTwoType'+lastRow);
		
		
	}
	function removePerson(x) {
		$("#victim"+x).remove();
	}
</script>

<?php echo $this->Html->script(array('jquery-1.6.4.min'));?>
<script type='text/javascript'>

	function addOffender() {
		lastRow++;
		$("#offendersTable tbody>tr:#offender0").clone(true).attr('id','offender'+lastRow).removeAttr('style').insertBefore("#offendersTable tbody>tr:#ofAdd");
		$("#offender"+lastRow+" button").attr('onclick','removeOffender('+lastRow+')');
		$("#offender"+lastRow+" input:first").attr('name','data[Offender]['+lastRow+'][offenderId]').attr('id','offenderOffenderID'+lastRow);
		$("#offender"+lastRow+" input:eq(1)").attr('name','data[Offender]['+lastRow+'][firstName]').attr('id','offenderFirstName'+lastRow);
		$("#offender"+lastRow+" input:eq(2)").attr('name','data[Offender]['+lastRow+'][lastName]').attr('id','offenderLastName'+lastRow);
		$("#offender"+lastRow+" date").attr('name','data[Offender]['+lastRow+'][dateOfBirth]').attr('id','offenderDateOfBirth'+lastRow);
		$("#offender"+lastRow+" select").attr('name','data[Offender]['+lastRow+'][gender]').attr('id','offenderGender'+lastRow);
		$("#offender"+lastRow+" input:eq(3)").attr('name','data[Offender]['+lastRow+'][race]').attr('id','offenderRace'+lastRow);
		$("#offender"+lastRow+" input:eq(4)").attr('name','data[Offender]['+lastRow+'][streetAddress]').attr('id','offenderStreetAddress'+lastRow);
		$("#offender"+lastRow+" input:eq(5)").attr('name','data[Offender]['+lastRow+'][zipCode]').attr('id','offenderZipCode'+lastRow);
		$("#offender"+lastRow+" input:eq(6)").attr('name','data[Offender]['+lastRow+'][city]').attr('id','offenderCity'+lastRow);
		$("#offender"+lastRow+" input:eq(7)").attr('name','data[Offender]['+lastRow+'][state]').attr('id','offenderState'+lastRow);
		$("#offender"+lastRow+" input:eq(8)").attr('name','data[Offender]['+lastRow+'][phoneOne]').attr('id','offenderPhoneOne'+lastRow);
		$("#offender"+lastRow+" input:eq(9)").attr('name','data[Offender]['+lastRow+'][phoneOneType]').attr('id','offenderPhoneOneType'+lastRow);
		$("#offender"+lastRow+" input:eq(10)").attr('name','data[Offender]['+lastRow+'][phoneTwo]').attr('id','offenderPhoneTwo'+lastRow);
		$("#offender"+lastRow+" input:eq(11)").attr('name','data[Offender]['+lastRow+'][phoneTwoType]').attr('id','offenderPhoneTwoType'+lastRow);
		
		
	}
	
	function removeOffender(x) {
		$("#offender"+x).remove();
	}
	</script>