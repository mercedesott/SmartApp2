<div class="promotions index">
	<h2><?php echo __('Generar Reporte'); ?></h2>
	
	<?php echo $this->Form->create('Promotion'); ?>
	<h3><?php echo __('Elija las fechas para generar el reporte'); ?></h3>
	<?php echo $this->Form->input('start_date'); ?>
	<?php echo $this->Form->input('finish_date'); ?>
	<?php echo $this->Form->end('Generar Reporte'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>