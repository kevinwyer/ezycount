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
			
			// reload the page
		header ( "location:/Git/ezycount/ezycount/users" );
		exit ();
	}
	private function searchFieldsUsed() {
		
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
			
			if ($_POST ["search_condition"] != "")
				$this->Session->write ( 'select_condition', $_POST ["search_condition"] );
			
			return true;
		}
		
		return false;
	}
	public function index() {
		$this->User->recursive = 0;
		
		// We use this to paginate the page, and to fix a limit in the records we want
		$defaultLimit = 10;
		
		// Check if we chose something from the dropdownlist
		if (isset ( $_POST ["select_value"] )) {
			
			// Put the value in Session to use when the page refreshes
			$this->Session->write ( 'session', $_POST ["select_value"] );
			
			// Display with the value sent by the dropdownlist
			$this->paginate = array (
					'User' => array (
							'limit' => $_POST ["select_value"] 
					) 
			);
			// Check if there's something in the session
		} else if ($this->Session->check ( 'session' )) {
			
			// Put the value as defaultLimit when the page refreshes
			$defaultLimit = $this->Session->read ( 'session' );
			
			// Display with session value
			$this->paginate = array (
					'User' => array (
							'limit' => $defaultLimit 
					) 
			);
		} else {
			// Display with default value
			$this->paginate = array (
					'User' => array (
							'limit' => $defaultLimit 
					) 
			);
		}
		
		$this->searchFieldsUsed ();
		
		// check if session containing a search select
		if (! $this->Session->check ( 'select_condition' )) {
			// default
			$this->Session->write ( 'select_condition', 'OR' );
		}
		else{
			// nothing stored in the session
			// = first load of the page
			// add group by clause
			
			
			$this->paginate = array (
					'User' => array (
							'conditions' => ('group by ezycount_users.id'),
							'limit' => $defaultLimit
					)
			);
		}
		
		// display result of search
		if ($this->Session->check ( 'search_email' ) || $this->Session->check ( 'search_name' )) {
			
			
			// prepare statement OR
			$conditionOR = ' where ( ezycount_users.first_name LIKE "' . $this->Session->read ( 'search_name' ) . '"' . 
			' OR  ' . ' ezycount_users.last_name LIKE "' . $this->Session->read ( 'search_name' ) . '")' . 
			' OR ' . ' ezycount_users.email LIKE "' . $this->Session->read ( 'search_email' ) . '"  
						group by ezycount_users.id
					';
			
			if ($this->Session->read ( 'search_name' ) != "" && $this->Session->read ( 'search_email' ) != "") {
				
				// prepare statement AND
				// when email and firstname / lastname are search criterias
				$conditionAND = 
						($this->Session->read ( 'search_name' ) == "" ? '' : ' where 
								( ezycount_users.first_name LIKE "' . $this->Session->read ( 'search_name' ) . '"' . 
								' OR  ' . 
								' ezycount_users.last_name LIKE "' . $this->Session->read ( 'search_name' ) . '" )' )
										 . 
						( $this->Session->read ( 'search_email' ) == "" ? '' : ' and ezycount_users.email LIKE "' . $this->Session->read ( 'search_email' ) . '"  ')
						. ' group by ezycount_users.id ';
			} else {
				
				// prepare statement AND
				// when either email or firstname / lastname are search criterias
				$conditionAND = 
						($this->Session->read ( 'search_name' ) == "" ? '' : ' where ( 
								ezycount_users.first_name LIKE "' . $this->Session->read ( 'search_name' ) . '"' . 
								' OR  ' . 
								' ezycount_users.last_name LIKE "' . $this->Session->read ( 'search_name' ) . '" )') . 
						($this->Session->read ( 'search_email' ) == "" ? '' : ' where ezycount_users.email LIKE "' . $this->Session->read ( 'search_email' ) . '" ')
						.'group by ezycount_users.id';
			}
			
			// query the right information
			$this->paginate = array (
					'User' => array (
							'conditions' => ($this->Session->read ( 'select_condition' ) == "AND" ? $conditionAND : $conditionOR),
							'limit' => $defaultLimit 
					) 
			);
		}
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
					'where ezycount_users.id = ' . $id
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
							'conditions' => ('where ezycount_users.id = ' . $id),
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