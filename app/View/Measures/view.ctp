<div class="measures view">
<h2><?php  echo __('Measure'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($measure['Measure']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($measure['Measure']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Measure'), array('action' => 'edit', $measure['Measure']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Measure'), array('action' => 'delete', $measure['Measure']['id']), null, __('Are you sure you want to delete # %s?', $measure['Measure']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Measures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($measure['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Measure Id'); ?></th>
		<th><?php echo __('Brand Id'); ?></th>
		<th><?php echo __('Image Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Featured'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($measure['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['measure_id']; ?></td>
			<td><?php echo $product['brand_id']; ?></td>
			<td><?php echo $product['image_id']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['number']; ?></td>
			<td><?php echo $product['quantity']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['featured']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>