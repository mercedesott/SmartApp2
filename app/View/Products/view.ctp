<div class="products view">
<h2><?php  echo __('Producto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medida'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Measure']['type'], array('controller' => 'measures', 'action' => 'view', $product['Measure']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<!-- <?php echo $this->Html->link($product['Image']['link'], array('controller' => 'images', 'action' => 'view', $product['Image']['id'])); ?> -->
			<?php echo $this->Html->image($product['Image']['link'], array('alt' => 'Producto', 'class' => 'product-image')); ?>			
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($product['Product']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($product['Product']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($product['Product']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destacado'); ?></dt>
		<dd>
			<?php echo h($product['Product']['featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($product['Product']['price']); ?>
			&nbsp;
		</dd>
	</dl>
	<br />
	<?php echo $this->Html->link(__('Ver ofertas de este producto'), array('controller' => 'promotions', 'action' => 'verpromo', $product['Product']['id'])); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Producto'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Producto'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Medidas'), array('controller' => 'measures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Medida'), array('controller' => 'measures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Imagenes'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Imagen'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Codigos de Barra'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Etiquetas'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Etiqueta'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Promociones'), array('controller' => 'promotions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Promocion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Codigos de Barra Relacionados'); ?></h3>
	<?php if (!empty($product['Barcode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Producto'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Barcode'] as $barcode): ?>
		<tr>
			<td><?php echo $barcode['id']; ?></td>
			<td><?php echo $barcode['number']; ?></td>
			<td><?php echo $barcode['product_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'barcodes', 'action' => 'view', $barcode['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'barcodes', 'action' => 'edit', $barcode['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'barcodes', 'action' => 'delete', $barcode['id']), null, __('Are you sure you want to delete # %s?', $barcode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Etiquetas Relacionadas'); ?></h3>
	<?php if (!empty($product['Label'])): ?>
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
		foreach ($product['Label'] as $label): ?>
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
<div class="related">
	<h3><?php echo __('Promociones Relacionadas'); ?></h3>
	<?php if (!empty($product['Promotion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Id Producto'); ?></th>
		<th><?php echo __('Activa'); ?></th>
		<th><?php echo __('Fecha de inicio'); ?></th>
		<th><?php echo __('Fecha de fin'); ?></th>
		<th><?php echo __('Hora de inicio'); ?></th>
		<th><?php echo __('Hora de fin'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Promotion'] as $promotion): ?>
		<tr>
			<td><?php echo $promotion['id']; ?></td>
			<td><?php echo $promotion['product_id']; ?></td>
			<td><?php echo $promotion['active']; ?></td>
			<td><?php echo $promotion['start_date']; ?></td>
			<td><?php echo $promotion['finish_date']; ?></td>
			<td><?php echo $promotion['start_time']; ?></td>
			<td><?php echo $promotion['finish_time']; ?></td>
			<td><?php echo $promotion['description']; ?></td>
			<td><?php echo $promotion['price']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'promotions', 'action' => 'view', $promotion['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'promotions', 'action' => 'edit', $promotion['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'promotions', 'action' => 'delete', $promotion['id']), null, __('Are you sure you want to delete # %s?', $promotion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Promocion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
