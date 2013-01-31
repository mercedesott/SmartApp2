<div class="aisles view">
<h2><?php  echo __('Gondola'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aisle['Aisle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($aisle['Aisle']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Gondola'), array('action' => 'edit', $aisle['Aisle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Gondola'), array('action' => 'delete', $aisle['Aisle']['id']), null, __('Are you sure you want to delete # %s?', $aisle['Aisle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Etiquetas'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Etiqueta'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Etiquetas Relacionadas'); ?></h3>
	<?php if (!empty($aisle['Label'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Id Posicion'); ?></th>
		<th><?php echo __('Id Estante'); ?></th>
		<th><?php echo __('Id Producto'); ?></th>
		<th><?php echo __('Id Gondola'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Alive'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aisle['Label'] as $label): ?>
		<tr>
			<td><?php echo $label['id']; ?></td>
			<td><?php echo $label['position_id']; ?></td>
			<td><?php echo $label['shelf_id']; ?></td>
			<td><?php echo $label['product_id']; ?></td>
			<td><?php echo $label['aisle_id']; ?></td>
			<td><?php echo $label['address']; ?></td>
			<td><?php echo $label['number']; ?></td>
			<td><?php echo $label['alive']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'labels', 'action' => 'view', $label['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'labels', 'action' => 'edit', $label['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'labels', 'action' => 'delete', $label['id']), null, __('Are you sure you want to delete # %s?', $label['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Etiqueta'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
