<?php echo $this->Html->script('jquery', FALSE); ?>
<?php echo $this->Html->script('validation', FALSE); ?>
<div id="success"></div>
<h2>Contact Us</h2>

<?php
echo $this->Form->create();
echo $this->Form->input('name', array('id'=>'name'));
echo $this->Form->input('email', array('id'=>'email'));
echo $this->Form->input('message', array('id'=>'message'));
echo $this->Js->submit('Send', array(
	'before'=>$this->Js->get('#sending')->effect('fadeIn'),
	'success'=>$this->Js->get('#sending')->effect('fadeOut'),
	'update'=>'#success'
));
echo $this->Form->end(); 
?>
<div id="sending" style="display: none; background-color: lightgreen;">Sending...</div>
