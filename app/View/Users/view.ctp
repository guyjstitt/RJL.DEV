<div class="users view">
<h2>User</h2>
<div class="table-responsive">
	<table class="table">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Id</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if(!empty($user['User']['id'];)) echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>First Name</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if(!empty($user['Person']['firstName'])) echo $user['Person']['firstName']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Last Name</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo if(!empty($user['Person']['lastName'])) $user['Person']['lastName']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Username</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if(!empty($user['User']['username'])) echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Email</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if(!empty($user['Person']['email'])) echo $user['Person']['email']; ?>
			&nbsp;
		</dd>
	</dl>
<table>
</div>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
	    <?php if ($cur_user['id'] == $user['User']['id'] || $cur_user['role'] == 'admin'): ?>
		    <li><?php echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id'])); ?> </li>
		    <li><?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']), array('confirm'=>'Are you sure you want to delete that user?')); ?> </li>
		<?php endif; ?>
		<li><?php echo $this->Html->link('New User', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('List Users', array('action' => 'index')); ?> </li>
	</ul>
</div>
