<div class="users index">


	<!-- Search function -->

	<table>
		<form id="searchFunction" method="post"
			action="/Git/ezycount/ezycount/users">
			<tbody>
				<tr>
					(% for missing letters)
					<th><input name="search_name" placeholder="Firstname / Lastname" />
					</th>

					<th><input name="search_email" placeholder="E-Mail" /></th>
					
					<th>
					<input name="search_canton" placeholder="Canton"/>
					</th>
			
					<th>
					<input name="search_language" placeholder="Language"/>
					</th>
			
					<th>
					<input name="search_registrationDate" placeholder="Registration date"/>
					</th>
			
				</tr>

				<tr>
					<th><input type="submit" value="Submit"></th>
				</tr>
			</tbody>
		</form>
	</table>

<!-- Reset the Session of the search -->

	<form id="searchFunction" method="post"
		action="/Git/ezycount/ezycount/users/deleteSession">
		<input type="submit" value="Reset search">
	</form>

<!-- Generated table -->

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Users'); ?></h1>
			</div>
		</div>
		<!-- end col md 12 -->
	</div>
	<!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('action' => 'add'), array('escape' => false)); ?></li>
						</ul>
					</div>
					<!-- end body -->
				</div>
				<!-- end panel -->
			</div>
			<!-- end actions -->
		</div>
		<!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('first_name'); ?></th>
						<th><?php echo $this->Paginator->sort('last_name'); ?></th>
						<th><?php echo $this->Paginator->sort('email'); ?></th>
						<th><?php echo $this->Paginator->sort('canton'); ?></th>
						<th><?php echo $this->Paginator->sort('country'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('language'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo h($user['ezycount_users']['id']); ?>&nbsp;</td>
						<td><?php echo h($user['ezycount_users']['first_name']); ?>&nbsp;</td>
						<td><?php echo h($user['ezycount_users']['last_name']); ?>&nbsp;</td>
						<td><?php echo h($user['ezycount_users']['email']); ?>&nbsp;</td>
						<td>
<?php echo $this->Html->link($user['ezycount_companies']['canton'], array('controller' => 'companies', 'action' => 'view', $user['ezycount_companies']['user_id'])); ?>
						</td>
						<td><?php echo h($user['ezycount_users']['country']); ?>&nbsp;</td>
						<td><?php echo h($user['ezycount_users']['created']); ?>&nbsp;</td>
						<td><?php echo h($user['ezycount_users']['language']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['ezycount_users']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['ezycount_users']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['ezycount_users']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['ezycount_users']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<!-- Dropdownlist: max elements on the page -->

			<table>
				<form id="paginateFunction" method="post"
					action="/Git/ezycount/ezycount/users">
					<tbody>
						<tr>

							<th>Number of results :</th>

							<th><select name="select_value">
									<option value="5">5</option>
									<option value="10">10</option>
									<option value="15">15</option>
									<option value="20">20</option>
							</select></th>
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
			$params = $this->Paginator->params ();
			if ($params ['pageCount'] > 1) {
				?>
			<ul class="pagination pagination-sm">
				<?php
				echo $this->Paginator->prev ( '&larr; Previous', array (
						'class' => 'prev',
						'tag' => 'li',
						'escape' => false 
				), '<a onclick="return false;">&larr; Previous</a>', array (
						'class' => 'prev disabled',
						'tag' => 'li',
						'escape' => false 
				) );
				echo $this->Paginator->numbers ( array (
						'separator' => '',
						'tag' => 'li',
						'currentClass' => 'active',
						'currentTag' => 'a' 
				) );
				echo $this->Paginator->next ( 'Next &rarr;', array (
						'class' => 'next',
						'tag' => 'li',
						'escape' => false 
				), '<a onclick="return false;">Next &rarr;</a>', array (
						'class' => 'next disabled',
						'tag' => 'li',
						'escape' => false 
				) );
				?>
			</ul>
			<?php } ?>

		</div>
		<!-- end col md 9 -->
	</div>
	<!-- end row -->
