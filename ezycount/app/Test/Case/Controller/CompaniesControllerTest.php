<?php

App::uses('CompaniesController', 'Controller');
class CompaniesControllerTest extends ControllerTestCase{
	
	
	public $fixtures = array(
			'app.company'
	);
	
	
	// works like a constructor
	// initalize all the variables
	public function setUp(){
		parent::setUp();
	}
	
	public function testIndex(){
		// checking the right redirection
		$result = $this->testAction('/companies/index');
		debug($result);
	}
	
	// -> this function destroyes the sessions (about search)
	public function testDeleteSearchSession(){
		// prepare filled session object
		$Posts = $this->generate('Posts', array(
				'components' => array(
						'Session',
						'search_company_name' => array('%test%'),
						'search_company_email' => array('%mail%'),
						'select_company_condition' => array('AND')
				)
		));
		
		
	}
}