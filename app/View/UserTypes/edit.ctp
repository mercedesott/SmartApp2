<div class="userTypes form">
<?php echo $this->Form->create('UserType'); ?>
	<fieldset>
		<legend><?php echo __('Editar Tipo de Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Tipo de Usuario'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('UserType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Tipos de Usuario'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
