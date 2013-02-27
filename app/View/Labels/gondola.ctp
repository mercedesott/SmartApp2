<div class="labels index">
	<h2><?php echo __('Gondola '.$nombregondola); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Izquierda'; ?></th>
			<th><?php echo 'Centro'; ?></th>
			<th><?php echo 'Derecha'; ?></th>
			<!-- <th class="actions"><?php echo __('Acciones'); ?></th> -->
	</tr>
	<?php
	for ($i=0; $i < $tuplasestantes; $i++) { ?>
		<tr>
		<?php
		for ($j=0; $j < $tuplasposiciones; $j++) {
			$estante = $estantes[$i]['Shelf']['id'];
			$posicion = $posiciones[$j]['Position']['id']; ?>
			<td>
			<?php foreach($prodxposicion[$estante][$posicion] as $key => $valor): ?>
			<?php while($key != 0) {
				$key = $key - 1; ?>
		<!-- <td> -->
			<?php echo $this->Html->image($valor[$key]['imagen'], array('url' => array('controller' => 'Labels', 'action' => 'edit', $valor[$key]['label']), 'class' => 'product-image')); ?>
		<!-- </td> -->
	<?php } ?>
	<?php endforeach; ?>
	</td>
	<?php } ?>
	</tr>
<?php } ?>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Etiqueta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Posiciones'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Posicion'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estantes'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estante'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); 
		} ?> </li>
		<li><?php if(isset($user['user_type_id']) && $user['user_type_id'] === '1') {
			echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); 
			} ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
	</ul>
</div>
