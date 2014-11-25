<div class="people view">
<h2><?php  echo __('Person');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($person['Group']['name'], array('controller' => 'groups', 'action' => 'view', $person['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
			<?php echo h($person['Person']['lastName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
			<?php echo h($person['Person']['firstName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($person['Person']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($person['Person']['gender']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['id']), null, __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
