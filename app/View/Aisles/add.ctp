<div class="aisles form">
<?php echo $this->Form->create('Aisle'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Gondola'); ?></legend>
	<?php
		echo $this->Form->input('description', array('label' => 'Descripcion'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Etiquetas'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Etiqueta'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
	</ul>
</div>
