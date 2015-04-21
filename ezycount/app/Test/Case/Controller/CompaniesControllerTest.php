<?php

App::uses('CompaniesController', 'Controller');
class CompaniesControllerTest extends ControllerTestCase{
	
	
	public $fixtures = array(
			'app.company'
	);
	public $autoFixtures = true;
	
	private $Company;
	
	
	// works like a constructor
	// initalize all the variables
	public function setUp(){
		parent::setUp();
		
		$this->Company = ClassRegistry::init('Company');
		$_POST = array();
		
	}
	
	public function testIndex(){
		// checking the right redirection
		$result = $this->testAction('/companies/index');
		debug($result);
	}
	
	public function testSessionVariables(){
		
		$_POST = array(
				'search_name' => '%test%',
				'search_email' => '%mail%'
		);
		
		$search_name = $this->testAction('/companies/saveSearchOptionSession');

// 		debug($search_name);
		debug($this->Session->read('search_name'));
		
		debug($this->controller->Session->read('search_name'));
		debug($_POST);

	}
	
	// -> this function destroyes the sessions (about search)
	public function testDeleteSearchSession(){
		// prepare filled session object
		//$this->Posts->
		
		
	}
	
	public function testSaveSearchOptionSession(){


	}
	
	
	
	
	
}