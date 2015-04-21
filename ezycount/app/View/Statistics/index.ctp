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
	
	<table>
	<tr>
	<td>
	<!-- display all the statistics in paragraphs -->
	<!-- total users -->
	<p>
	<b>Number of users:</b> 
		<?php echo $oneLines[0]['totalUsers']['totalUsers'] ?>
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
	</td>
	<td>
	<!-- cantons -->
	<?php $cantonChart->div('chart_canton_div');?>
	
	<div id="chart_canton_div">
	<?php $this->GoogleCharts->createJsChart($cantonChart);?>
	</div>
	</td>
	<td>
	<!-- Languages chart -->
	<div id="chart_div">
	<?php $this->GoogleCharts->createJsChart($chart);?>
	</div>
	
	</td>
	</tr>
	</table>
	
	

</div>