<?php
App::uses ( 'AppController', 'Controller' );
class StatisticsController extends AppController{
	public $components = array (
			'Paginator',
			'Session'
	);
	
	public function index(){
		
		$this->paginate = array (
				'Statistic' => array (
						)
		);
		
		$this->set ( 'statistics', $this->paginate ( 'Statistic' ) );
	}
}