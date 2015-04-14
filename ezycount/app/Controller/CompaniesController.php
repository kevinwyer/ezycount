<?php
App::uses('AppController', 'Controller');

class CompaniesController extends AppController {
	
	var $name = 'Companies';
	var $scaffold;

	public $components = array('Paginator', 'Session');
	
	private $defaultLimit = 10;

	public function deleteSearchSession(){
		// check if a name was stored in the session
		// if existing remove it
		if ($this->Session->check ( 'search_company_name' ))
			$this->Session->destroy ( 'search_company_name' );
			
		// check if a mail was stored in the session
		// if existing remove it
		if ($this->Session->check ( 'search_company_email' ))
			$this->Session->destroy ( 'search_company_email' );
			
		// check if a radiobutton (and / or) was stored in the session
		// if existing remove it
		if ($this->Session->check ( 'select_company_condition' ))
			$this->Session->destroy ( 'select_company_condition' );
			
		// reload the page
		header ( "location:/Git/ezycount/ezycount/companies" );
		exit ();
	}
	
	public function saveSearchOptionSession(){
		// stores the search criterias into the session
		// true -> something was stored/searched
		// false -> the search was not used
		
		// check if the search function was used
		if (isset ( $_POST ["search_name"] ) && isset ( $_POST ["search_email"] )) {
				
			// check if the search fields are NOT containing something
			if ($_POST ["search_name"] == "")
				$this->Session->destroy ( 'search_company_name' );
			// nothing in the input fields
				
			if ($_POST ["search_email"] == "") {
				$this->Session->destroy ( 'search_company_email' );
				// nothing in the input fields
			}
				
			// only add the session variable if a name was searched
			if ($_POST ["search_name"] != "")
				$this->Session->write ( 'search_company_name', $_POST ["search_name"] );
		
			// only add the session variable if a mail was searched
			if ($_POST ["search_email"] != "")
				$this->Session->write ( 'search_company_email', $_POST ["search_email"] );
				
			if ($_POST ["search_condition"] != "")
				$this->Session->write ( 'select_company_condition', $_POST ["search_condition"] );
				
			// something was stored/searched
			return true;
		}
		
		// the search was not used
		return false;
	}
	
	public function nbrObjects(){
		// We use this to paginate the page, and to fix a limit in the records we want
		
		// Check if we chose something from the dropdownlist
		if (isset ( $_POST ["select_value"] )) {
		
			 $this->defaultLimit = $_POST ["select_value"];
			
			// Put the value in Session to use when the page refreshes
			$this->Session->write ( 'session', $this->defaultLimit );
		
			// Display with the value sent by the dropdownlist
			$this->paginate = array (
					'Company' => array (
							'limit' => $this->defaultLimit
					)
			);
			// Check if there's something in the session
		} else if ($this->Session->check ( 'session' )) {
		
			// Put the value as defaultLimit when the page refreshes
			$this->defaultLimit =  $this->Session->read ( 'session' );
		
			// Display with session value
			$this->paginate = array (
					'Company' => array (
							'limit' => $this->defaultLimit
					)
			);
		
		}
		else {
			// Display with default value
			$this->paginate = array (
					'Company' => array (
							'limit' => $this->defaultLimit
					)
			);
		}
	}
	
	
	public function index() {
		$this->Company->recursive = 0;
		
		// set the limit of displayed objects
		$this->nbrObjects();
		
		
		// check if session containing a search select ---> OR = default
		if (! $this->Session->check ( 'select_company_condition' )) {
			// default
			$this->Session->write ( 'select_company_condition', 'OR' );
		}
		else{
			// nothing stored in the session
			// = first load of the page
			// add group by clause
				
				
			$this->paginate = array (
					'Company' => array (
							'conditions' => ('group by ezycount_companies.id'),
							'limit' => $this->defaultLimit
					)
			);
		}
		
		// check if search field are used, and store the information in the session
		$this->saveSearchOptionSession();
		
		// delimit display according to search criterias
		// check if email or name search field has some content
		if ($this->Session->check ( 'search_company_email' ) || $this->Session->check ( 'search_company_name' )) {
				
			// prepare statement OR
			// emails can be empty --> so replace the empty with some text ...
			$conditionOR = ' where  ezycount_companies.name LIKE "' . $this->Session->read ( 'search_company_name' ) . '"' .
							' OR ' . 
							' ezycount_companies.email LIKE "' . 
								($this->Session->read ( 'search_company_email' ) == "" ? ' not empty ' : $this->Session->read ( 'search_company_email' ) ). '"
							group by ezycount_companies.id 
					';
				
			if ($this->Session->read ( 'search_company_name' ) != "" && $this->Session->read ( 'search_company_email' ) != "") {
		
				// prepare statement AND
				// when email and name are search criterias
				$conditionAND =
					($this->Session->read ( 'search_company_name' ) == "" ? '' : ' where
								 ezycount_companies.name LIKE "' . $this->Session->read ( 'search_company_name' ) . '" '  )
						.
					( $this->Session->read ( 'search_company_email' ) == "" ? '' : ' and ezycount_companies.email LIKE "' . $this->Session->read ( 'search_company_email' ) . '"  ')
						. ' group by ezycount_companies.id ';
			} else {
		
				// prepare statement AND
				// when either email or firstname / lastname are search criterias
				$conditionAND =
					($this->Session->read ( 'search_company_name' ) == "" ? '' : ' where 
								ezycount_companies.name LIKE "' . $this->Session->read ( 'search_company_name' ) . '" ' ) .
					($this->Session->read ( 'search_company_email' ) == "" ? '' : ' where ezycount_companies.email LIKE "' . $this->Session->read ( 'search_company_email' ) . '" ')
						.' group by ezycount_users.id';
			}
				
			// query the right information
			$this->paginate = array (
					'Company' => array (
							'conditions' => ($this->Session->read ( 'select_company_condition' ) == "AND" ? $conditionAND : $conditionOR),
							'limit' => $this->defaultLimit
					)
			);
		}
		
		$this->set('companies', $this->paginate('Company'));
	}


	public function view($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array(
				'conditions' => array(
				'Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Company->create();
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
			}
		}
	}

	
	public function edit($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
			$this->request->data = $this->Company->find('first', $options);
		}
	}


	public function delete($id = null) {
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Company->delete()) {
			$this->Session->setFlash(__('The company has been deleted.'));
		} else {
			$this->Session->setFlash(__('The company could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}