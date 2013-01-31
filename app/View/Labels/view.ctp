<div class="labels view">
<h2><?php  echo __('Etiqueta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($label['Label']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posicion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($label['Position']['description'], array('controller' => 'positions', 'action' => 'view', $label['Position']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($label['Shelf']['description'], array('controller' => 'shelves', 'action' => 'view', $label['Shelf']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($label['Product']['name'], array('controller' => 'products', 'action' => 'view', $label['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gondola'); ?></dt>
		<dd>
			<?php echo $this->Html->link($label['Aisle']['description'], array('controller' => 'aisles', 'action' => 'view', $label['Aisle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($label['Label']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($label['Label']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alive'); ?></dt>
		<dd>
			<?php echo h($label['Label']['alive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Etiqueta'), array('action' => 'edit', $label['Label']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Etiqueta'), array('action' => 'delete', $label['Label']['id']), null, __('Are you sure you want to delete # %s?', $label['Label']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Etiquetas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Etiqueta'), array('action' => 'add')); ?> </li>
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
