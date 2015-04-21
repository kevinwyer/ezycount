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
		
		$languageArray = $this->paginate ( 'Statistic' );
		$this->set ( 'languages',  $languageArray);
		
		
		// display cantons where the companies are located
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('canton'),
				)
		);
		$cantonArray = $this->paginate ( 'Statistic' );
		$this->set ( 'cantons',  $cantonArray);
		
		// display different steps of the user
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('steps'),
				)
		);
		$this->set ( 'steps', $this->paginate ( 'Statistic' ) );
		
		
		// _________________________________________  Google Chart __________________________________
		// source:
		// https://github.com/scottharwell/googlecharts
		
		//Setup data for chart
		$chart = new GoogleCharts();
		
		$chart->type("PieChart");
		
		//Options array holds all options for Chart API
		$chart->options(array('title' => "Language"));
		
		$chart->columns(array(
				//Each column key should correspond to a field in your data array
				'language' => array(
						//Tells the chart what type of data this is
						'type' => 'string',
						//The chart label for this column
						'label' => 'Language'
				),
				'number' => array(
						'type' => 'number',
						'label' => 'Amount'
				)
		));
		
		foreach ($languageArray as $language){
// 			var_dump($language);
// 			echo '<br/>';
			
			$chart->addRow(array('language' => $language['user']['language'], 'number' => $language[0]['number']));
		}
		
// 		$chart->addRow(array('language' => 'deutsch', 'number' => 55));
// 		$chart->addRow(array('language' => 'französisch', 'number' => 50));
		//Set the chart for your view
		$this->set(compact('chart')); //
		
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