<div class="promotions view">
<h2><?php  echo __('Promocion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promotion['Product']['name'], array('controller' => 'products', 'action' => 'view', $promotion['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activa'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha de inicio'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha de fin'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['finish_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora de inicio'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora de fin'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['finish_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio Oferta'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['new_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio Original'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['old_price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Editar Promocion'), array('action' => 'edit', $promotion['Promotion']['id'])); 
			} ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Promocion'), array('action' => 'delete', $promotion['Promotion']['id']), null, __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Promociones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Promocion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); 
		} ?> </li>
	</ul>
</div>
