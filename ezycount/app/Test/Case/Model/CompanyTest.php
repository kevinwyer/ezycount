<?php
App::uses('Company', 'Model');


class CompanyTest extends CakeTestCase {

	public $autoFixtures = true;
	
	
	public $fixtures = array(
		'app.company'
	);

	private $Company;
	
	public function setUp() {
		parent::setUp();
		$this->Company = ClassRegistry::init('Company');
	}

	
	public function tearDown() {
		unset($this->Company);

		parent::tearDown();
	}

	
	public function testPaginate(){
		$this->Company = ClassRegistry::init('Company');
		$this->Company = new Company();
		
		$toCompare = array("TEST EZYCafé", "EZYCafé" );
		
		$result = $this->Company->paginate(array(), null, null, 10);
		debug ( $result  ) ;
		
		var_dump($result);
		
		$this->assertTextContains("EZYCafé", $result);
	}
}
