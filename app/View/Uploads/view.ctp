<h2>Upload File</h2>
<?php 
echo $this->Form->create('Upload', array('type'=>'file'));
echo $this->Form->input('name');
echo $this->Form->input('message');
echo $this->Form->input('filename',array('type' => 'file'));
echo $this->Form->end('Submit');
?>