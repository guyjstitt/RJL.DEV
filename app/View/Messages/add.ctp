<html>
<body>
<div class="messages form">


<?php
$roles = array('Administrator'=>'Administrator','Case Manager'=>'Case Manager','Facilitator'=>'Facilitator','Users'=>'Users');


echo $this->Form->create('Message');

echo $this->Form->inputs(array('id'=>array('label'=>'Message ID'), 'role' => array('options'=> $roles, 'label' =>'Assign Announcement for Group', 'default' => 'A'), 'announcement'));
echo $this->Form->end('Add');
?>
</div>

<div class="navactions">
    <h3>Actions</h3>
    <ul>
        <li><?php echo $this->Html->link('Announcement List', array('action' => 'index'));?></li>
    </ul>
</div>
</body>
</html>