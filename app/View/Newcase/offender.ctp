<?php echo $this->Form->create('Offender', array('id' => 'NewcaseForm', 'url' => $this->wizard)); ?>
<h2>Step 3: Add Offender Information</h2>

<?php
$gender = array('U' => 'Unsure','M' => 'Male', 'F' => 'Female');
$race=array('U'=>'Unsure','W'=>'White','AA' => 'African-American', 'H'=>'Hispanic', 'A'=>'Asian', 'NH/PI'=>'Native Hawaiian/Pacific Islander',
'NA/AN'=> 'Native American/Alaska Native', 'O/M'=>'Other/Mixed');
$phonetype = array('U' => 'Unsure','Mobile'=>'Mobile','Home'=>'Home','Work'=>'Work');
echo $this->Form->create('Offender');

echo $this->Form->inputs(array('case_id','offenderId', 'firstName', 'lastName', 'dateOfBirth', 'gender'=>array('options'=> $gender, 'default' => 'U'), 
'race'=>array('options'=> $race, 'default' => 'U'),'streetAddress', 'zipCode', 'city', 'state', 'email', 'phoneOneType'=>array('options'=> $phonetype, 'default' => 'U'), 'phoneOne', 
'phoneTwoType'=>array('options'=> $phonetype, 'default' => 'U'), 'phoneTwo'));
echo $this->Form->end('Add');
?>

<div class="submit">
		<?php echo $this->Form->submit('Continue', array('div' => false)); ?>
		<?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>