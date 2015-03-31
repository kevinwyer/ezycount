<div class="companies index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Companies'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Company'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('user_id'); ?></th>						
						<th><?php echo $this->Paginator->sort('number'); ?></th>
						<th><?php echo $this->Paginator->sort('street'); ?></th>
						<th><?php echo $this->Paginator->sort('email'); ?></th>
						<th><?php echo $this->Paginator->sort('phone'); ?></th>
						<th><?php echo $this->Paginator->sort('website'); ?></th>
						<th><?php echo $this->Paginator->sort('currency'); ?></th>
						<th><?php echo $this->Paginator->sort('city'); ?></th>
						<th><?php echo $this->Paginator->sort('canton'); ?></th>
						<th><?php echo $this->Paginator->sort('vat_number'); ?></th>
						<th><?php echo $this->Paginator->sort('vat_model'); ?></th>
						<th><?php echo $this->Paginator->sort('vat_registered'); ?></th>
						<th><?php echo $this->Paginator->sort('expiration_date'); ?></th>
						<th><?php echo $this->Paginator->sort('rounding_option'); ?></th>
						<th class="actions">Actions</th>
						
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($companies as $company): ?>
					<tr>
						<td><?php echo h($company['ezycount_companies']['id']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['name']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($company['ezycount_users']['title'], array('controller' => 'users', 'action' => 'view', $company['ezycount_users']['id'])); ?>
		</td>
						
						<td><?php echo h($company['ezycount_companies']['number']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['street']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['email']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['phone']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['website']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['currency']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['city']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['canton']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['vat_number']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['vat_model']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['vat_registered']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['expiration_date']); ?>&nbsp;</td>
						<td><?php echo h($company['ezycount_companies']['rounding_option']); ?>&nbsp;</td>
						
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $company['ezycount_companies']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $company['ezycount_companies']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $company['ezycount_companies']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $company['ezycount_companies']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<table>
	<form id="paginateFunction" method="post" action="/ezycount/ezycount/companies">
	<tbody>
		<tr>
			
			<th>
			Number of results :
			</th>
			
			<th>
			<select name ="select_value">
				<option value="5">5</option>
  <option value="10">10</option>
  <option value="15">15</option>
  <option value="20">20</option>
			</select>			</th>
		</tr>
		
		<tr>
			<th><input type="submit" value="Submit"></th>
		</tr>
	</tbody>
	</form>
</table>


			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->