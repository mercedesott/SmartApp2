<script type="text/javascript">
	$(document).ready(function(){
	//jquery usa id para referenciar igual que en css
	$("#search").autocomplete({
            minLength: 0,
            source: "labels/autocompletar",
            
            focus: function(event, ui) {
                $("#search").val( ui.item.Product.name);
                return false;
            },
            
            select: function(event, ui) {
            	//window.location.replace('products/view/'+ ui.item.Product.id);
            	
            	window.location.replace('labels/view/'+ ui.item.Label.id);
 
                return false;
         }
            })
            
            //la funcion data itera sobre el resultado del autocomplete y a cada iteracion le llama item
        .data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + item.Product.name + "<br>" + item.Product.id + "</a>" )
                .appendTo( ul );
        };
      })
</script>
<div class="labels index">
	<h2><?php echo __('Etiquetas'); ?></h2>
	
	<?php echo $this->Form->create('Product', array('action'=>'search')); ?>
	<?php echo $this->Form->input('search', array('id'=>'search', 'label' => 'Buscar')); ?>
	<?php echo $this->Form->end('Buscar'); ?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('position_id', 'Posicion'); ?></th>
			<th><?php echo $this->Paginator->sort('shelf_id', 'Estante'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id', 'Producto'); ?></th>
			<th><?php echo $this->Paginator->sort('aisle_id', 'Gondola'); ?></th>
			<th><?php echo $this->Paginator->sort('address', 'Direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('number', 'Numero'); ?></th>
			<th><?php echo $this->Paginator->sort('alive'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($labels as $label): ?>
	<tr>
		<td><?php echo h($label['Label']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($label['Position']['description'], array('controller' => 'positions', 'action' => 'view', $label['Position']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($label['Shelf']['description'], array('controller' => 'shelves', 'action' => 'view', $label['Shelf']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($label['Product']['name'], array('controller' => 'products', 'action' => 'view', $label['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($label['Aisle']['description'], array('controller' => 'aisles', 'action' => 'view', $label['Aisle']['id'])); ?>
		</td>
		<td><?php echo h($label['Label']['address']); ?>&nbsp;</td>
		<td><?php echo h($label['Label']['number']); ?>&nbsp;</td>
		<td><?php echo h($label['Label']['alive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $label['Label']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $label['Label']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $label['Label']['id']), null, __('Are you sure you want to delete # %s?', $label['Label']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
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
