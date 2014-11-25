<?php echo $this->Form->create('RjCase', array('id' => 'NewcaseForm', 'url' => $this->wizard->victim)); ?>
<h2>Step 1: Add Case Information</h2>

<?php
echo $this->Form->inputs(array('caseId'=>array('label'=>'Case ID') , 'caseStatus', 'dateOfReferral', 'courtDate', 'dateOfCharge', 'chargeNumber', 'caseDescription'));
?>

<div class="submit">
		<?php echo $this->Form->submit('Continue', array('div' => false)); ?>
		<?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>
