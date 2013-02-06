<div class="promotions index">
	<h2><?php echo __('Generar Reporte'); ?></h2>
	
	<?php echo $this->Form->create('Promotion'); ?>
	<h3><?php echo __('Elija las fechas para generar el reporte'); ?></h3>
	<?php echo $this->Form->input('start_date', array('label' => 'Fecha de inicio')); ?>
	<?php echo $this->Form->input('finish_date', array('label' => 'Fecha de fin')); ?>
	<?php echo $this->Form->end('Ver Promociones'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Promocion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Promociones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); 
			} ?> </li>
	</ul>
</div>