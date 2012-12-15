<div class="aisles view">
<h2><?php  echo __('Aisle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aisle['Aisle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($aisle['Aisle']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aisle'), array('action' => 'edit', $aisle['Aisle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aisle'), array('action' => 'delete', $aisle['Aisle']['id']), null, __('Are you sure you want to delete # %s?', $aisle['Aisle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aisles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aisle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Labels'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Labels'); ?></h3>
	<?php if (!empty($aisle['Label'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Position Id'); ?></th>
		<th><?php echo __('Shelf Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Aisle Id'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Alive'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aisle['Label'] as $label): ?>
		<tr>
			<td><?php echo $label['id']; ?></td>
			<td><?php echo $label['position_id']; ?></td>
			<td><?php echo $label['shelf_id']; ?></td>
			<td><?php echo $label['product_id']; ?></td>
			<td><?php echo $label['aisle_id']; ?></td>
			<td><?php echo $label['address']; ?></td>
			<td><?php echo $label['number']; ?></td>
			<td><?php echo $label['alive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'labels', 'action' => 'view', $label['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'labels', 'action' => 'edit', $label['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'labels', 'action' => 'delete', $label['id']), null, __('Are you sure you want to delete # %s?', $label['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
