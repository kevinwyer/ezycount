<?php
App::uses ( 'AppController', 'Controller');
App::uses ('GoogleCharts', 'GoogleCharts.Lib');

class StatisticsController extends AppController{
	
	public $helpers = array('GoogleCharts.GoogleCharts');
	public $components = array (
			'Paginator',
			'Session'
		);
	
	public function index(){
		
		// display all 'one line query results'
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('oneLine'),
						)
		);
		$this->set ( 'oneLines', $this->paginate ( 'Statistic' ) );
		
		// display languages with corresponding numbers
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('language'),
				)
		);
		$this->set ( 'languages', $this->paginate ( 'Statistic' ) );
		
		
		// display cantons where the companies are located
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('canton'),
				)
		);
		$this->set ( 'cantons', $this->paginate ( 'Statistic' ) );
		
		// display different steps of the user
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('steps'),
				)
		);
		$this->set ( 'steps', $this->paginate ( 'Statistic' ) );
		
		
		
		//Charts (TEST FROM HERE)
		///////////////////////////////////////

		//Get data from model
		//Get the last 10 rounds for score graph
/*		$rounds = $this->Round->find(
				'all',
				array(
						'conditions' => array(
								'Round.user_id' => $this->Auth->user('id')
						),
						'order' => array('Round.event_date' => 'ASC'),
						'limit' => 10,
						'fields' => array(
								'Round.score',
								'Round.event_date'
						)
				)
		);
*/		
		//Setup data for chart
		$chart = new GoogleCharts();
		
		$chart->type("LineChart");
		//Options array holds all options for Chart API
		$chart->options(array('title' => "Recent Scores"));
		$chart->columns(array(
				//Each column key should correspond to a field in your data array
				'event_date' => array(
						//Tells the chart what type of data this is
						'type' => 'string',
						//The chart label for this column
						'label' => 'Date'
				),
				'score' => array(
						'type' => 'number',
						'label' => 'Score',
						//Optional NumberFormat pattern
						'format' => '#,###'
				)
		));
		
		//Loop through our data and creates data rows
		//Data will be added to rows based on the column keys above (event_date, score).
		//If there are missing fields in your data or the keys do not match, then this will not work.
	/*	foreach($model as $round){
			$chart->addRow($round['Round']);
		}
		
		//You can also use this way to loop through data and creates data rows:
		foreach($rounds as $row){
			//$chart->addRow(array('event_date' => $row['Model']['field1'], 'score' => $row['Model']['field2']));
			$chart->addRow(array('event_date' => $row['Round']['event_date'], 'score' => $row['Round']['score']));
		}
		
	*/	
		//You can also manually add rows:
		$chart->addRow(array('event_date' => '1/1/2012', 'score' => 55));
		
		//Set the chart for your view
		$this->set(compact('chart'));

	}
	
	
	
	
	
	
	
	
	
	
	/*
	public function pie() {
		// N.B your $chartData array will be accessed from your model
		$chartData = array(
				array(
						'name' => 'Chrome',
						'y' => 45.0,
						'sliced' => true,
						'selected' => true
				),
				array('IE', 26.8),
				array('Firefox', 12.8),
				array('Safari', 8.5),
				array('Opera', 6.2),
				array('Others', 0.7)
		);
		$chartName = 'pie';
		$pieChart = $this->Highcharts->create( $chartName, 'pie' );
		$this->Highcharts->setChartParams(
				$chartName,
				array
				(
						'renderTo'  => 'piewrapper',  // div to display chart inside
						'chartWidth' => 1000,
						'chartHeight' => 750,
						'chartTheme' => 'gray',
						'title'  => 'Browser Usage Statistics',
						'plotOptionsShowInLegend' => TRUE,
						'creditsEnabled'  => FALSE
				)
		);
		$series = $this->Highcharts->addChartSeries();
		$series->addName('Browser Share')
		->addData($chartData);
		$pieChart->addSeries($series);
	}*/

}