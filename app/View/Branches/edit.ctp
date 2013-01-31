<div class="branches form">
<?php echo $this->Form->create('Branch'); ?>
	<fieldset>
		<legend><?php echo __('Editar Sucursal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Branch.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Branch.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Sucursales'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
	</ul>
</div>
