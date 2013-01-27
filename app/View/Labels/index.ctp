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
	<?php echo $this->Form->input('search', array('id'=>'search')); ?>
	<?php echo $this->Form->end('Buscar'); ?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('position_id'); ?></th>
			<th><?php echo $this->Paginator->sort('shelf_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('aisle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('alive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
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
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $label['Label']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $label['Label']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $label['Label']['id']), null, __('Are you sure you want to delete # %s?', $label['Label']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Label'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aisles'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aisle'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
	</ul>
</div>
