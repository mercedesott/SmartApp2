<div class="labels form">
<?php echo $this->Form->create('Label'); ?>
	<fieldset>
		<legend><?php echo __('Editar Etiqueta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('position_id', array('label' => 'Posicion'));
		echo $this->Form->input('shelf_id', array('label' => 'Estante'));
		echo $this->Form->input('product_id', array('label' => 'Producto'));
		echo $this->Form->input('aisle_id', array('label' => 'Gondola'));
		echo $this->Form->input('address', array('label' => 'Direccion'));
		echo $this->Form->input('number', array('label' => 'Numero'));
		echo $this->Form->input('alive');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Label.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Label.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Etiquetas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Posiciones'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Posicion'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estantes'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estante'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
	</ul>
</div>
