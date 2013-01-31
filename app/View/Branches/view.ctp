<div class="branches view">
<h2><?php  echo __('Sucursal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Sucursal'), array('action' => 'edit', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Sucursal'), array('action' => 'delete', $branch['Branch']['id']), null, __('Are you sure you want to delete # %s?', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Sucursales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Sucursal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Emails Relacionados'); ?></h3>
	<?php if (!empty($branch['Email'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Id Sucursal'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($branch['Email'] as $email): ?>
		<tr>
			<td><?php echo $email['id']; ?></td>
			<td><?php echo $email['branch_id']; ?></td>
			<td><?php echo $email['email']; ?></td>
			<td><?php echo $email['name']; ?></td>
			<td><?php echo $email['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'emails', 'action' => 'view', $email['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'emails', 'action' => 'edit', $email['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'emails', 'action' => 'delete', $email['id']), null, __('Are you sure you want to delete # %s?', $email['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
