<div class="statistics index">
 <script src="https://www.google.com/jsapi"></script> 

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
	<b>Number of users:</b> 
		<?php echo $oneLines[0]['totalUsers']['totalUsers'] ?>
	</p>
	
	
	
	<!-- languages -->
	<p>
	<b>Languages:</b>  <br/>
		<?php 
			$count = 0;
		
		echo '<br/>';
		
			foreach ($languages as $language):
			
				echo $language['user']['language'];   
				echo '  ';
				echo $language[0]['number'];
				echo '<br/>';
			
				$count += $language[0]['number'];
			endforeach;
			
			echo 'TOTAL:  ' . $count;
		?>
	</p>
	
	<!-- Languages chart -->
	<div id="chart_div">
	<?php $this->GoogleCharts->createJsChart($chart);?>
	</div>
	
	<!-- cantons -->
	<p><br><br>
	<b>Cantons:</b> <br/>
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
	<p><br><br>
	<b>Steps:</b> <br/>
		<?php 

		foreach ($steps as $step):
		
			echo 'step ';
			echo $step['currentStep']['current'];
			echo ': currently ';
			echo $step[0]['number'];
			echo ' users <br/>';
			
		endforeach;
		?>
	
	</p>

</div>