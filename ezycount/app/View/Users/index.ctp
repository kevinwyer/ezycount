<div class="users index">


	<!-- Search function -->

	<table>
		<form id="searchFunction" method="post"
			action="/Git/ezycount/ezycount/users">
			<tbody>
				<tr>
					(% for missing letters)
					<td><input name="search_name" placeholder="Firstname / Lastname"  
							<?php echo $this->Session->check('search_name') ? 'value="' . $this->Session->read('search_name') .'"' : 'value=""'; 	
							?>	/>
					</td>

					<td><input name="search_email" placeholder="E-Mail" 
					<?php echo $this->Session->check('search_email') ? 'value="' . $this->Session->read('search_email') .'"' : 'value=""'; 	
							?>
					/></td>
					
					<td>
					<input name="search_canton" placeholder="Canton"/>
					</td>
			
					<td>
					<input name="search_language" placeholder="Language"/>
					</td>
			
					<td>
					<input name="search_registrationDate" placeholder="Registration date"/>
					</td>
			
				</tr>

				<tr>
					<td>
						<Input type = 'Radio' Name ='search_condition' value= 'AND'  
						<?php 
							 if($this->Session->check('select_condition'))
							echo $this->Session->read('select_condition') == 'AND' ? 'checked="checked"' : '';
						 ?>
						> AND
					</td>
					<td>
						<Input type = 'Radio' Name ='search_condition' value= 'OR'
						<?php 
							 if($this->Session->check('select_condition'))
							echo $this->Session->read('select_condition') == 'OR' ? 'checked="checked"' : '';
						 ?>
						> OR
					</td>
					<td>
						<select name="search_current_step">
							<option value="" > </option>
							<option value="0" >0: Test company created</option>
							<option value="1" >1: create company - Step 1</option>
							<option value="2" >2: create company - Step 2</option>
							<option value="3" >3: create company - Step 3</option>
							<option value="4" >4: create company - Step 4</option>
							<option value="5" >5: create company - Step 5</option>
							<option value="6" >6: create company - Step 6</option>
							<option value="7" >7: Booking</option>
							<option value="8" >8: Payment test</option>
							<option value="9" >9: Payment successful</option>
							
						</select>
					</td>
					
					<td><input type="submit" value="Submit"></td>
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
						<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Company'), array('action' => 'add'), array('escape' => false)); ?></li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Companies'), array('controller' => 'companies', 'action' => 'index'), array('escape' => false)); ?> </li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
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
						<th><?php echo $this->Paginator->sort('current'); ?></th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo h($user['u']['id']); ?>&nbsp;</td>
						<td><?php echo h($user['u']['first_name']); ?>&nbsp;</td>
						<td><?php echo h($user['u']['last_name']); ?>&nbsp;</td>
						<td><?php echo h($user['u']['email']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($user['u']['canton'], 
									array('controller' => 'companies', 'action' => 'view', $user['u']['company_id'])); ?>
						</td>
						<td><?php echo h($user['u']['company_country']); ?>&nbsp;</td>
						<td><?php echo h($user['u']['created']); ?>&nbsp;</td>
						<td><?php echo h($user['u']['language']); ?>&nbsp;</td>
						<td><?php echo h($user['u']['current']); ?>&nbsp;</td>
						
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['u']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['u']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['u']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['u']['id'])); ?>
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
									<option value="5"   						
										<?php 
 											if($this->Session->check('session'))
												echo $this->Session->read('session') == '5' ? ' selected="selected"' : '';
										?>
									>5</option>
									
									<option value="10"
										<?php 
 											if($this->Session->check('session'))
											echo $this->Session->read('session') == '10' ? 'selected="selected"' : '';
										?>
									>10</option>
									
									<option value="15"
										<?php 
 											if($this->Session->check('session'))
											echo $this->Session->read('session') == '15' ? ' selected="selected"' : '';
										?>
									>15</option>
									
									<option value="20"
										<?php 
 											if($this->Session->check('session'))
											echo $this->Session->read('session') == '20' ? ' selected="selected"' : '';
										?>
									>20</option>
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
