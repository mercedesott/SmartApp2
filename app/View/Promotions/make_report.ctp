<div class="promotions index">
	<h2><?php echo __('Promociones'); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id', 'Productos'); ?></th>
			<th><?php echo $this->Paginator->sort('active', 'Activa'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date', 'Fecha de inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('finish_date', 'Fecha de fin'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time', 'Hora de inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('finish_time', 'Hora de fin'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('new_price', 'Precio Oferta'); ?></th>
			<th><?php echo $this->Paginator->sort('old_price', 'Precio Original'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
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
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $promotion['Promotion']['id']), null, __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	
	<?php echo $this->Form->create('Promotion', array('action' => 'viewPdf')); ?>
	<?php echo $this->Form->hidden('start_date', array('value' => $start_date)); ?>
	<?php echo $this->Form->hidden('finish_date', array('value' => $finish_date)); ?>
	<?php echo $this->Form->end('Generar Reporte'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Promocion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Reportes'), array('action' => 'report')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
