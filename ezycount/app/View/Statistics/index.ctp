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


	<?php 
		var_dump($statistics);
		echo '<br/>';
		echo '<br/>';
	?>
	
	<!-- display all the statistics in paragraphs -->
	<!-- total users -->
	<p>
	Number of users: 
		<?php echo $statistics[0]['totalUsers']['totalUsers'] ?>
	</p>
	
	<!-- languages -->
	<p>
	Languages:  <br/>
		<?php 
			$count = 0;
			
			foreach ($statistics as $statistic):
			
			echo $statistic['language']['language'];   
			echo '  ';
			echo $statistic['language']['number'];
			echo '<br/>';
			
			$count += $statistic['language']['number'];
			endforeach;
			
			echo 'total:  ' . $count;
		?>
	</p>

</div>