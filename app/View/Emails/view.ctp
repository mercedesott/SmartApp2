<div class="emails view">
<h2><?php  echo __('Email'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($email['Email']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sucursal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($email['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $email['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($email['Email']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($email['Email']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($email['Email']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Email'), array('action' => 'edit', $email['Email']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Email'), array('action' => 'delete', $email['Email']['id']), null, __('Are you sure you want to delete # %s?', $email['Email']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Emails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Email'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Sucursales'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Sucursal'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div>
