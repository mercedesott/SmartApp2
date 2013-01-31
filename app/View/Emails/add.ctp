<div class="emails form">
<?php echo $this->Form->create('Email'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Email'); ?></legend>
	<?php
		echo $this->Form->input('branch_id', array('label' => 'Sucursal'));
		echo $this->Form->input('email');
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('active', array('label' => 'Activo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Emails'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Sucursales'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Sucursal'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div>
