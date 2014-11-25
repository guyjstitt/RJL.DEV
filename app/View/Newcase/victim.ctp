
<?php echo $this->Form->create('Victim', array('id' => 'NewcaseForm', 'url' => $this->wizard->offender)); ?>
<h2>Step 2: Add Victim Information</h2>

<?php
$gender = array('U' => 'Unsure','M' => 'Male', 'F' => 'Female');
$race=array('U'=>'Unsure','W'=>'White','AA' => 'African-American', 'H'=>'Hispanic', 'A'=>'Asian', 'NH/PI'=>'Native Hawaiian/Pacific Islander',
'NA/AN'=> 'Native American/Alaska Native', 'O/M'=>'Other/Mixed');
$phonetype = array('U' => 'Unsure','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work');
echo $this->Form->create('Victim');

echo $this->Form->inputs(array('case_id','victimId', 'firstName', 'lastName', 'dateOfBirth', 'gender'=>array('options'=> $gender, 'default' => 'U'), 
'race'=>array('options'=> $race, 'default' => 'U'),'streetAddress', 'zipCode', 'city', 'state', 'email', 'phoneOneType'=>array('options'=> $phonetype, 'default' => 'U'), 'phoneOne', 
'phoneTwoType'=>array('options'=> $phonetype, 'default' => 'U'), 'phoneTwo'));
?>

<div class="submit">
		<?php echo $this->Form->submit('Continue', array('div' => false)); ?>
		<?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>