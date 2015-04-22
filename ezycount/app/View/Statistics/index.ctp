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
	
	<b>Number of companies:</b> 
		<?php echo $oneLines[0]['totalCompanies']['totalCompanies'] ?>
	</p>
	
	<p>
	<b>Number of users having paid:</b>
		<?php  
		echo round( $paid[1][0]['numberPaid'] / ($paid[0][0]['numberPaid'] +  $paid[1][0]['numberPaid']) * 100 , 2) ;
		echo '%';
		?>
	</p>	
	<p>
	<b>New user this month:</b>
		<?php echo $newUser[0][0]['numberUserMonth'] ?>
	</p>
	</tr>
	<tr>
	<td>
	<!-- steps -->
	<p>
	<!-- Steps chart -->
	<?php $stepsChart->div('chart_steps_div');?>
	<div id="chart_steps_div">
	<?php $this->GoogleCharts->createJsChart($stepsChart);?>
	</div>
	
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
	
	<tr>
	<td>

	</td>
	</tr>
	</table>
	
	

</div>