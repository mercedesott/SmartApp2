<div class="aisles form">
<?php echo $this->Form->create('Aisle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Aisle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aisle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Aisle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aisles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Labels'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
	</ul>
</div>
