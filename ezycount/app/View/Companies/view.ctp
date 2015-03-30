<div class="companies view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Company'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Company'), array('action' => 'edit', $company['Company']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Company'), array('action' => 'delete', $company['Company']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Companies'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Company'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($company['User']['title'], array('controller' => 'users', 'action' => 'view', $company['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Number'); ?></th>
		<td>
			<?php echo h($company['Company']['number']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Street'); ?></th>
		<td>
			<?php echo h($company['Company']['street']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Zip'); ?></th>
		<td>
			<?php echo h($company['Company']['zip']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('City'); ?></th>
		<td>
			<?php echo h($company['Company']['city']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Country'); ?></th>
		<td>
			<?php echo h($company['Company']['country']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Phone'); ?></th>
		<td>
			<?php echo h($company['Company']['phone']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($company['Company']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Website'); ?></th>
		<td>
			<?php echo h($company['Company']['website']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($company['Company']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('First Accounting Year'); ?></th>
		<td>
			<?php echo h($company['Company']['first_accounting_year']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Closing Date'); ?></th>
		<td>
			<?php echo h($company['Company']['closing_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Blocking Date'); ?></th>
		<td>
			<?php echo h($company['Company']['blocking_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Currency'); ?></th>
		<td>
			<?php echo h($company['Company']['currency']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vat Registered'); ?></th>
		<td>
			<?php echo h($company['Company']['vat_registered']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vat Model'); ?></th>
		<td>
			<?php echo h($company['Company']['vat_model']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vat Both'); ?></th>
		<td>
			<?php echo h($company['Company']['vat_both']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vat Number'); ?></th>
		<td>
			<?php echo h($company['Company']['vat_number']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Starting Vat'); ?></th>
		<td>
			<?php echo h($company['Company']['starting_vat']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Expiration Date'); ?></th>
		<td>
			<?php echo h($company['Company']['expiration_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Current Step'); ?></th>
		<td>
			<?php echo h($company['Company']['current_step']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Test'); ?></th>
		<td>
			<?php echo h($company['Company']['test']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Logo'); ?></th>
		<td>
			<?php echo h($company['Company']['logo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Background Color'); ?></th>
		<td>
			<?php echo h($company['Company']['background_color']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Model'); ?></th>
		<td>
			<?php echo h($company['Company']['model']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rounding Option'); ?></th>
		<td>
			<?php echo h($company['Company']['rounding_option']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Disabled'); ?></th>
		<td>
			<?php echo h($company['Company']['disabled']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Canton'); ?></th>
		<td>
			<?php echo h($company['Company']['canton']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

