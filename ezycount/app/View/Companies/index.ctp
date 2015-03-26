<div class="companies index">
	<h2><?php echo __('Companies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('first_accounting_year'); ?></th>
			<th><?php echo $this->Paginator->sort('closing_date'); ?></th>
			<th><?php echo $this->Paginator->sort('blocking_date'); ?></th>
			<th><?php echo $this->Paginator->sort('currency'); ?></th>
			<th><?php echo $this->Paginator->sort('vat_registered'); ?></th>
			<th><?php echo $this->Paginator->sort('vat_model'); ?></th>
			<th><?php echo $this->Paginator->sort('vat_both'); ?></th>
			<th><?php echo $this->Paginator->sort('vat_number'); ?></th>
			<th><?php echo $this->Paginator->sort('starting_vat'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('expiration_date'); ?></th>
			<th><?php echo $this->Paginator->sort('current_step'); ?></th>
			<th><?php echo $this->Paginator->sort('test'); ?></th>
			<th><?php echo $this->Paginator->sort('logo'); ?></th>
			<th><?php echo $this->Paginator->sort('background_color'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			<th><?php echo $this->Paginator->sort('rounding_option'); ?></th>
			<th><?php echo $this->Paginator->sort('disabled'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($companies as $company): ?>
	<tr>
		<td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['name']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['number']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['street']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['zip']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['city']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['country']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['phone']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['email']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['website']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['type']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['first_accounting_year']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['closing_date']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['blocking_date']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['currency']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['vat_registered']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['vat_model']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['vat_both']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['vat_number']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['starting_vat']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['created']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['expiration_date']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['current_step']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['test']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['logo']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['background_color']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['model']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['rounding_option']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['disabled']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $company['Company']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $company['Company']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $company['Company']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $company['Company']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?></li>
	</ul>
</div>
