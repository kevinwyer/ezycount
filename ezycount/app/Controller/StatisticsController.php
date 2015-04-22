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
		

		// display all the new registered users in the current month
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('newUser'),
				)
		);
		$this->set ( 'newUser', $this->paginate ( 'Statistic' ) );

		
		
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
		$stepsArray = $this->paginate ( 'Statistic' );
		$this->set ( 'steps', $stepsArray );
		
		// display the % of the paid people
		$this->paginate = array (
				'Statistic' => array (
						'conditions' => ('paid'),
				)
		);
		$this->set ( 'paid', $this->paginate ( 'Statistic' ) );
		
		
		// _________________________________________  Google Chart __________________________________
		// source:
		// https://github.com/scottharwell/googlecharts
		
		// *****************************         
		//            Language 
		// *****************************
		
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
			$chart->addRow(array('language' => $language['user']['language'], 'number' => $language[0]['number']));
		}

		//Set the chart for your view
		$this->set(compact('chart')); 
		
		
		// *****************************
		//            canton
		// *****************************
		//Setup data for chart
		$cantonChart = new GoogleCharts();
		
		$cantonChart->type("PieChart");
		
		//Options array holds all options for Chart API
		$cantonChart->options(array('title' => "Canton"));
		
		$cantonChart->columns(array(
				//Each column key should correspond to a field in your data array
				'canton' => array(
						//Tells the chart what type of data this is
						'type' => 'string',
						//The chart label for this column
						'label' => 'Canton'
				),
				'number' => array(
						'type' => 'number',
						'label' => 'Amount'
				)
		));
		
		foreach ($cantonArray as $canton){
			$cantonChart->addRow(array('canton' => $canton['company']['canton'], 'number' => $canton[0]['number']));
		}
		
		//Set the chart for your view
		$this->set(compact('cantonChart'));
		
		
		// *****************************
		//            steps
		// *****************************
		//Setup data for chart
		$stepsChart = new GoogleCharts();
		
		$stepsChart->type("BarChart");
		
		//Options array holds all options for Chart API
		$stepsChart->options(array('title' => "Steps"));
		
		$stepsChart->columns(array(
				//Each column key should correspond to a field in your data array
				'step' => array(
						//Tells the chart what type of data this is
						'type' => 'string',
						//The chart label for this column
						'label' => 'Step'
				),
				'number' => array(
						'type' => 'number',
						'label' => 'Amount of users'
				)
		));
		
		foreach ($stepsArray as $steps){
			$stepsChart->addRow(array('step' => 'Step '. $steps['currentStep']['current'], 'number' => $steps[0]['number']));
		}
		
		//Set the chart for your view
		$this->set(compact('stepsChart'));

// 		var_dump($stepsArray);
		
	}
}