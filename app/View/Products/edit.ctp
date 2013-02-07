<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Editar Producto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('measure_id', array('label' => 'Medida'));
		echo $this->Form->input('brand_id', array('label' => 'Marca'));
		echo $this->Form->input('image_id', array('label' => 'Imagen'));
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('number', array('label' => 'Numero'));
		echo $this->Form->input('quantity', array('label' => 'Cantidad'));
		echo $this->Form->input('description', array('label' => 'Descripcion'));
		echo $this->Form->input('featured', array('label' => 'Destacado'));
		echo $this->Form->input('price', array('label' => 'Precio'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Product.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Product.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Medidas'), array('controller' => 'measures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Medida'), array('controller' => 'measures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Imagenes'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Imagen'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Codigos de Barra'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Listar Etiquetas'), array('controller' => 'labels', 'action' => 'index')); 
		} ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Nueva Etiqueta'), array('controller' => 'labels', 'action' => 'add')); 
		} ?> </li>
		<li><?php echo $this->Html->link(__('Listar Promociones'), array('controller' => 'promotions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Promocion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
	</ul>
</div>
