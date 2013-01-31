<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_type_id', array('label' => 'Tipo de Usuario'));
		echo $this->Form->input('username', array('label' => 'Nombre de Usuario'));
		echo $this->Form->input('password', array('label' => 'Contrasena'));
		echo $this->Form->input('active', array('label' => 'Activo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Tipos de Usuario'), array('controller' => 'user_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo de Usuario'), array('controller' => 'user_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
