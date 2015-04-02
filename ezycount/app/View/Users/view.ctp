<div class="users view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('User'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit User'), array('action' => 'edit', $user[0]['ezycount_users']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete User'), array('action' => 'delete',$user[0]['ezycount_users']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user[0]['ezycount_users']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
<tr>

		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('First Name'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['first_name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Last Name'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['last_name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Country'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['country']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Is Activated'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['is_activated']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Is Admin'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['is_admin']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Language'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['language']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Disabled'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['disabled']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('DidTour'); ?></th>
		<td>
			<?php echo h($user[0]['ezycount_users']['didTour']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

