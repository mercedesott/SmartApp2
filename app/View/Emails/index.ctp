<div class="emails index">
	<h2><?php echo __('Emails'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_id', 'Sucursal'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('active', 'Activo'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($emails as $email): ?>
	<tr>
		<td><?php echo h($email['Email']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($email['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $email['Branch']['id'])); ?>
		</td>
		<td><?php echo h($email['Email']['email']); ?>&nbsp;</td>
		<td><?php echo h($email['Email']['name']); ?>&nbsp;</td>
		<td><?php echo h($email['Email']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $email['Email']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $email['Email']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $email['Email']['id']), null, __('Are you sure you want to delete # %s?', $email['Email']['id'])); ?>
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
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Email'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Sucursales'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Sucursal'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
	</ul>
</div>
