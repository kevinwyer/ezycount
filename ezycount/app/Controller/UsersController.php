<?php
App::uses ( 'AppController', 'Controller' );
class UsersController extends AppController {
	public $components = array (
			'Paginator',
			'Session' 
	);
	public function deleteSession() {
		
		// check if a name was stored in the session
		// if existing remove it
		if ($this->Session->check ( 'search_name' ))
			$this->Session->destroy ( 'search_name' );
			
			// check if a mail was stored in the session
			// if existing remove it
		if ($this->Session->check ( 'search_email' ))
			$this->Session->destroy ( 'search_email' );
			
			// check if a radiobutton (and / or) was stored in the session
			// if existing remove it
		if ($this->Session->check ( 'select_condition' ))
			$this->Session->destroy ( 'select_condition' );
			
		// check if the dropdownlist was stored in the session
		// if so -> delete it 
		if ($this->Session->check ( 'search_current_step' ))
			$this->Session->destroy ( 'search_current_step' );
		
			// reload the page
		header ( "location:/Git/ezycount/ezycount/users" );
		exit ();
	}
	private function searchFieldsUsed() {
		
		// check if session containing a search select  --> default OR
		if (! $this->Session->check ( 'select_condition' )) {
			// default
			$this->Session->write ( 'select_condition', 'OR' );
		}
		
		// check if the search function was used
		if (isset ( $_POST ["search_name"] ) && isset ( $_POST ["search_email"] )) {
			
			// check if the search fields are NOT containing something
			if ($_POST ["search_name"] == "")
				$this->Session->destroy ( 'search_name' );
				// nothing in the input fields
			
			if ($_POST ["search_email"] == "") {
				$this->Session->destroy ( 'search_email' );
				// nothing in the input fields
			}
			
			// only add the session variable if a name was searched
			if ($_POST ["search_name"] != "")
				$this->Session->write ( 'search_name', $_POST ["search_name"] );
				
				// only add the session variable if a mail was searched
			if ($_POST ["search_email"] != "")
				$this->Session->write ( 'search_email', $_POST ["search_email"] );
			
			
			// add search condition in the session (or / and)
			if ($_POST ["search_condition"] != "")
				$this->Session->write ( 'select_condition', $_POST ["search_condition"] );
			
		}
		
		// only add the session variable if the dropdownlist has some changes
		if (isset($_POST["search_current_step"])){
			$valueDropdown = $_POST ["search_current_step"];
			if ($valueDropdown == "")
				$valueDropdown = 'empty';
			$this->Session->write ( 'search_current_step', $valueDropdown );
		}
		
	
	}
	public function index() {
		$this->User->recursive = 0;
		
		// We use this to paginate the page, and to fix a limit in the records we want
		$defaultLimit = 10;
		
		$conditionAND = "";
		$conditionOR = "";
		$conditionCurrentStep = "";
		
		// Check if we chose something from the limit dropdownlist
		if (isset ( $_POST ["select_value"] )) {
			

			$defaultLimit = $_POST ["select_value"];
			
			// Put the value in Session to use when the page refreshes
			$this->Session->write ( 'session', $defaultLimit );
			
			// Check if there's something in the session
		} else if ($this->Session->check ( 'session' )) {
						
			// Put the value as defaultLimit when the page refreshes
			$defaultLimit = $this->Session->read ( 'session' );
		}
		
		$this->searchFieldsUsed ();

		
		// check dropdownlist (current step) is used to search
		if ($this->Session->check ( 'search_current_step' )){
			$conditionCurrentStep =  ' current = ' ."'" . $this->Session->read('search_current_step') ."'";
		}
		
		// display result of search
		if ($this->Session->check ( 'search_email' ) || $this->Session->check ( 'search_name' )) {
			
			
			// prepare statement OR
			$conditionOR = ' where ( u.first_name LIKE "' . $this->Session->read ( 'search_name' ) . '"' . 
			' OR  ' . ' u.last_name LIKE "' . $this->Session->read ( 'search_name' ) . '")' . 
			' OR ' . ' u.email LIKE "' . $this->Session->read ( 'search_email' ) . '"'
					
			// add condition from current step dropdownlist (only when needed
			 . ($this->Session->check ( 'search_current_step' ) ? ' OR ' . $conditionCurrentStep : '')
			;
			
			if ($this->Session->read ( 'search_name' ) != "" && $this->Session->read ( 'search_email' ) != "") {
				
				// prepare statement AND
				// when email and firstname / lastname are search criterias
				$conditionAND = 
						($this->Session->read ( 'search_name' ) == "" ? '' : ' where 
								( u.first_name LIKE "' . $this->Session->read ( 'search_name' ) . '"' . 
								' OR  ' . 
								' u.last_name LIKE "' . $this->Session->read ( 'search_name' ) . '" )' )
										 . 
						( $this->Session->read ( 'search_email' ) == "" ? '' : ' AND u.email LIKE "' . $this->Session->read ( 'search_email' ) . '"  ')
						
						// add condition from current step dropdownlist (only when needed
						. ($this->Session->check ( 'search_current_step' ) ? ' AND ' . $conditionCurrentStep : '')
						;
			} else {
				
				// prepare statement AND
				// when either email or firstname / lastname are search criterias
				$conditionAND = 
						($this->Session->read ( 'search_name' ) == "" ? '' : ' where ( 
								u.first_name LIKE "' . $this->Session->read ( 'search_name' ) . '"' . 
								' OR  ' . 
								' u.last_name LIKE "' . $this->Session->read ( 'search_name' ) . '" )') . 
						($this->Session->read ( 'search_email' ) == "" ? '' : ' where u.email LIKE "' . $this->Session->read ( 'search_email' ) . '" ')
						
						// add condition from current step dropdownlist (only when needed
						. ($this->Session->check ( 'search_current_step' ) ? ' AND ' . $conditionCurrentStep : '')
						;
			}

		}
		// no content in the search fields
		// make dropdown (current step) functionality aviable
		else{
			$conditionOR = ($this->Session->check ( 'search_current_step' ) ? ' where ' . $conditionCurrentStep : '');
			$conditionAND = ($this->Session->check ( 'search_current_step' ) ? ' where ' . $conditionCurrentStep : '');
		}
		
		
		// query the right information
		$this->paginate = array (
				'User' => array (
						'conditions' => ($this->Session->read ( 'select_condition' ) == "AND" ? $conditionAND : $conditionOR),
						'limit' => $defaultLimit
				)
		);
		
		// display users
		$this->set ( 'users', $this->paginate ( 'User' ) );
	}
	public function view($id = null) {
		
		if (! $this->User->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}

		$this->paginate = array (
				'User' => array (
						'conditions' => (
					'where u.id = ' . $id
				),
						'limit' => 1
				)
		);
		
		$this->set ( 'user', $this->paginate ( 'User' ) );
	}
	public function add() {
		if ($this->request->is ( 'post' )) {
			$this->User->create ();
			if ($this->User->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The user has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		}
	}
	public function edit($id = null) {
		if (! $this->User->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
			// When you click on cancel
			if (isset ( $this->request->data ['cancel'] )) {
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
			// When you click on submit
			if ($this->User->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The user has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				
				$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		} else {
			$this->paginate = array (
					'User' => array (
							'conditions' => ('where u.id = ' . $id),
							'limit' => 1 
					) 
			);
			
			$this->set ( 'User', $this->paginate ( 'User' ) );
		}
	}
	public function delete($id = null) {
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		$this->request->allowMethod ( 'post', 'delete' );
		if ($this->User->delete ()) {
			$this->Session->setFlash ( __ ( 'The user has been deleted.' ) );
		} else {
			$this->Session->setFlash ( __ ( 'The user could not be deleted. Please, try again.' ) );
		}
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
}