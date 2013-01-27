<div class="barcodes form">
<?php echo $this->Form->create('Barcode'); ?>
	<fieldset>
		<legend><?php echo __('Editar Codigo de Barra'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('number');
		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Barcode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Barcode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
