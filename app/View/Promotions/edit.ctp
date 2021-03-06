<div class="promotions form">
<?php echo $this->Form->create('Promotion'); ?>
	<fieldset>
		<legend><?php echo __('Editar Promocion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id', array('label' => 'Producto'));
		echo $this->Form->input('active', array('label' => 'Activa'));
		echo $this->Form->input('start_date', array('label' => 'Fecha de inicio'));
		echo $this->Form->input('finish_date', array('label' => 'Fecha de fin'));
		echo $this->Form->input('start_time', array('label' => 'Hora de inicio'));
		echo $this->Form->input('finish_time', array('label' => 'Hora de fin'));
		echo $this->Form->input('description', array('label' => 'Descripcion'));
		echo $this->Form->input('new_price', array('label' => 'Precio Oferta'));
		echo $this->Form->input('old_price', array('label' => 'Precio Original'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Promotion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Promotion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Promociones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Promociones Pendientes'), array('action' => 'pending')); ?></li>
	</ul>
</div>
