<div class="userTypes view">
<h2><?php  echo __('Tipo de Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userType['UserType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($userType['UserType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Tipo de Usuario'), array('action' => 'edit', $userType['UserType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Tipo de Usuario'), array('action' => 'delete', $userType['UserType']['id']), null, __('Are you sure you want to delete # %s?', $userType['UserType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Tipos de Usuario'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo de Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Usuarios Relacionados'); ?></h3>
	<?php if (!empty($userType['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Id Tipo de Usuario'); ?></th>
		<th><?php echo __('Nombre de Usuario'); ?></th>
		<th><?php echo __('Contrasena'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userType['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['user_type_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
