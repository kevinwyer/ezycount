<div class="companies form">
<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Add Company'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('number');
		echo $this->Form->input('street');
		echo $this->Form->input('zip');
		echo $this->Form->input('city');
		echo $this->Form->input('country');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('website');
		echo $this->Form->input('type');
		echo $this->Form->input('first_accounting_year');
		echo $this->Form->input('closing_date');
		echo $this->Form->input('blocking_date');
		echo $this->Form->input('currency');
		echo $this->Form->input('vat_registered');
		echo $this->Form->input('vat_model');
		echo $this->Form->input('vat_both');
		echo $this->Form->input('vat_number');
		echo $this->Form->input('starting_vat');
		echo $this->Form->input('expiration_date');
		echo $this->Form->input('current_step');
		echo $this->Form->input('test');
		echo $this->Form->input('logo');
		echo $this->Form->input('background_color');
		echo $this->Form->input('model');
		echo $this->Form->input('rounding_option');
		echo $this->Form->input('disabled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?></li>
	</ul>
</div>
