<div class="users view">
<h2><?php  echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo de Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['UserType']['name'], array('controller' => 'user_types', 'action' => 'view', $user['UserType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre de Usuario'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contrasena'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($user['User']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Usuario'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Tipos de Usuario'), array('controller' => 'user_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo de Usuario'), array('controller' => 'user_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
