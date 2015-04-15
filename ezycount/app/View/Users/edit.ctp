<div class="users form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit User'); ?></h1>
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

								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('action' => 'index'), array('escape' => false)); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array(	'class' => 'form-control', 
																'placeholder' => 'Id',
																'value' => $User[0]['u']['id']));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('first_name', array(	'class' => 'form-control', 
																		'placeholder' => 'First Name',
																		'value' => $User[0]['u']['first_name']  ));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('last_name', array('class' => 'form-control', 
																		'placeholder' => 'Last Name',
																		'value' => $User[0]['u']['last_name'] ));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array(	'class' => 'form-control', 
																	'placeholder' => 'Email',
																	'value' => $User[0]['u']['email']));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('country', array(	'class' => 'form-control', 
																	'placeholder' => 'Country',
																	'value' => $User[0]['u']['country']));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('language', array('class' => 'form-control', 
																	'placeholder' => 'Language',
																	'value' => $User[0]['u']['language']));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default', 'name' => 'ok', 'div' => false)); ?>
					<?php echo $this->Form->submit(__('Cancel', true), array('class' => 'btn btn-default', 'name' => 'cancel', 'div' => false)); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
