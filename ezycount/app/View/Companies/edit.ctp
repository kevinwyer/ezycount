<div class="companies form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Company'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Company.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Company.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Companies'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Company', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('number', array('class' => 'form-control', 'placeholder' => 'Number'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('street', array('class' => 'form-control', 'placeholder' => 'Street'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('zip', array('class' => 'form-control', 'placeholder' => 'Zip'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => 'City'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('country', array('class' => 'form-control', 'placeholder' => 'Country'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => 'Phone'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('website', array('class' => 'form-control', 'placeholder' => 'Website'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('type', array('class' => 'form-control', 'placeholder' => 'Type'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('first_accounting_year', array('class' => 'form-control', 'placeholder' => 'First Accounting Year'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('closing_date', array('class' => 'form-control', 'placeholder' => 'Closing Date'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('blocking_date', array('class' => 'form-control', 'placeholder' => 'Blocking Date'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('currency', array('class' => 'form-control', 'placeholder' => 'Currency'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('vat_registered', array('class' => 'form-control', 'placeholder' => 'Vat Registered'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('vat_model', array('class' => 'form-control', 'placeholder' => 'Vat Model'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('vat_both', array('class' => 'form-control', 'placeholder' => 'Vat Both'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('vat_number', array('class' => 'form-control', 'placeholder' => 'Vat Number'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('starting_vat', array('class' => 'form-control', 'placeholder' => 'Starting Vat'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('expiration_date', array('class' => 'form-control', 'placeholder' => 'Expiration Date'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('current_step', array('class' => 'form-control', 'placeholder' => 'Current Step'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('test', array('class' => 'form-control', 'placeholder' => 'Test'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('logo', array('class' => 'form-control', 'placeholder' => 'Logo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('background_color', array('class' => 'form-control', 'placeholder' => 'Background Color'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('model', array('class' => 'form-control', 'placeholder' => 'Model'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('rounding_option', array('class' => 'form-control', 'placeholder' => 'Rounding Option'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('disabled', array('class' => 'form-control', 'placeholder' => 'Disabled'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('canton', array('class' => 'form-control', 'placeholder' => 'Canton'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
