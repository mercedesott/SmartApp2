<div class="labels index">
	<h2><?php echo __('Vista grafica de Gondolas'); ?></h2>
	
	<?php echo $this->Form->create('Aisle'); ?>
	<h3><?php echo __('Elija la gondola que desea ver'); ?></h3>
	<?php echo $this->Form->input('id', array('type' => 'select', 'options' => $aisles, 'label' => 'Gondola')); ?>
	<?php echo $this->Form->end('Ver Gondola'); ?>

</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Etiqueta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Posiciones'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Posicion'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estantes'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estante'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); 
		} ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); 
			} ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
	</ul>
</div>