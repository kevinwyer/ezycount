<div class="statistics index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Statistics'); ?></h1>
			</div>
		</div>
		<!-- end col md 12 -->
	</div>
	<!-- end row -->

	
	<!-- display all the statistics in paragraphs -->
	<!-- total users -->
	<p>
	Number of users: 
		<?php echo $oneLines[0]['totalUsers']['totalUsers'] ?>
	</p>
	
	
	
	<!-- languages -->
	<p>
	Languages:  <br/>
		<?php 
			$count = 0;
			
			foreach ($languages as $language):
			
				echo $language['user']['language'];   
				echo '  ';
				echo $language[0]['number'];
				echo '<br/>';
			
				$count += $language[0]['number'];
			endforeach;
			
			echo 'total:  ' . $count;
		?>
	</p>
	
	
	
	<!-- cantons -->
	<p>
	Cantons: <br/>
		<?php 
		$count = 0;
		
		foreach ($cantons as $canton):
		
			echo $canton['company']['canton'];
			echo '  ';
			echo $canton[0]['number'];
			echo '<br/>';
			
			$count += $canton[0]['number'];
		endforeach;
		
		echo 'total:  ' . $count;
		?>
	
	</p>
	
	
	<!-- steps -->
	<p>
	Steps: <br/>
		<?php 

		foreach ($steps as $step):
		
			echo $step['currentStep']['current'];
			echo '  ';
			echo $step[0]['number'];
			echo '<br/>';
			
		endforeach;
		?>
	
	</p>

</div>