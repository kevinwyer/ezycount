<div class="companies view">
<h2><?php echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($company['Company']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($company['Company']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($company['Company']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($company['Company']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($company['Company']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($company['Company']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($company['Company']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($company['Company']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($company['Company']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Accounting Year'); ?></dt>
		<dd>
			<?php echo h($company['Company']['first_accounting_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Closing Date'); ?></dt>
		<dd>
			<?php echo h($company['Company']['closing_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blocking Date'); ?></dt>
		<dd>
			<?php echo h($company['Company']['blocking_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currency'); ?></dt>
		<dd>
			<?php echo h($company['Company']['currency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vat Registered'); ?></dt>
		<dd>
			<?php echo h($company['Company']['vat_registered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vat Model'); ?></dt>
		<dd>
			<?php echo h($company['Company']['vat_model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vat Both'); ?></dt>
		<dd>
			<?php echo h($company['Company']['vat_both']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vat Number'); ?></dt>
		<dd>
			<?php echo h($company['Company']['vat_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Starting Vat'); ?></dt>
		<dd>
			<?php echo h($company['Company']['starting_vat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiration Date'); ?></dt>
		<dd>
			<?php echo h($company['Company']['expiration_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Step'); ?></dt>
		<dd>
			<?php echo h($company['Company']['current_step']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test'); ?></dt>
		<dd>
			<?php echo h($company['Company']['test']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($company['Company']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Background Color'); ?></dt>
		<dd>
			<?php echo h($company['Company']['background_color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($company['Company']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rounding Option'); ?></dt>
		<dd>
			<?php echo h($company['Company']['rounding_option']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disabled'); ?></dt>
		<dd>
			<?php echo h($company['Company']['disabled']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), array(), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
	</ul>
</div>
