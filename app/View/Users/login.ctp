<div class="users form">
	<?php echo $this->Session->flash('Administrador'); ?>
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Ingrese su usuario y contraseña'); ?></legend>
		<?php
		echo $this->Form->input('username', array('label' => 'Usuario'));
		echo $this->Form->input('password', array('label' => 'Contraseña'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
</div>