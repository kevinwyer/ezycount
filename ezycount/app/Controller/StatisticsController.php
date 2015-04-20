<?php
App::uses ( 'AppController', 'Controller' );
class StatisticsController extends AppController{
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
	}
}