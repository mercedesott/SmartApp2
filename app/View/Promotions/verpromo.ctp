<div class="promotions index">
	<h2><?php echo __('Promociones por Producto'); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('finish_date'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('finish_time'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('new_price'); ?></th>
			<th><?php echo $this->Paginator->sort('old_price'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($promotions as $promotion): ?>
	<tr>
		<td><?php echo h($promotion['Promotion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($promotion['Product']['name'], array('controller' => 'products', 'action' => 'view', $promotion['Product']['id'])); ?>
		</td>
		<td><?php echo h($promotion['Promotion']['active']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['finish_date']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['finish_time']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['description']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['new_price']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['old_price']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promotion['Promotion']['id']), null, __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>