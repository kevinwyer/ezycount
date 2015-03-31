<?php
App::uses ( 'AppController', 'Controller' );
class UsersController extends AppController {
	public $components = array (
			'Paginator',
			'Session' 
	);
	
	public function deleteSession(){
	
		// check if a name was stored in the session
		// if existing remove it 
		if ($this->Session->check ( 'search_name' ))
			$this->Session->destroy('search_name');
	
		// check if a mail was stored in the session
		// if existing remove it
		if ($this->Session->check ( 'search_email' ))
			$this->Session->destroy('search_email');
		
		// reload the page
		header("location:/Git/ezycount/ezycount/users"); 
		exit();
	
	}
	
	private function searchFieldsUsed() {
		
		// check if the search function was used
		if (isset ( $_POST ["search_name"] ) && isset ( $_POST ["search_email"] )) {
			
			// check if the search fields are NOT containing something
			if ($_POST ["search_email"] == "" && $_POST ["search_name"] == "") {
				
				// nothing in the input fields
				return false;
			} else {
				
				// only add the session variable if a name was searched
				if ($_POST ["search_name"] != "")
					$this->Session->write ( 'search_name', $_POST ["search_name"] );
				
				// only add the session variable if a mail was searched
				if ($_POST ["search_email"] != "")
					$this->Session->write ( 'search_email', $_POST ["search_email"] );
				
				return true;
			}
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
			$defaultLimit =  $this->Session->read ( 'session' );
			
			// Display with session value
			$this->paginate = array (
					'User' => array (
							'limit' => $defaultLimit
					) 
			);
			
		} 
		else {
			// Display with default value
			$this->paginate = array (
					'User' => array (
							'limit' => $defaultLimit 
					) 
			);
		}
		
		$this->searchFieldsUsed();
		
		// display result of search
		if ($this->Session->check ( 'search_email' ) || $this->Session->check ( 'search_name' ) ) {
			
			// display for test reasons the Session content
			echo 'Search in use <br/>';
			echo '<br/> mail ' . $this->Session->read('search_email');
			echo '<br/> name '  . $this->Session->read('search_name');
			
			// query the right information
			$this->paginate = array (
					'User' => array (
							'conditions' => 
								(' AND  ezycount_users.first_name LIKE "' .  $this->Session->read ( 'search_name' ) . '"') . 
									' OR ' . 
								'( ezycount_users.last_name LIKE "' . $this->Session->read ( 'search_name' ) . '")' .
									 ' OR ' . 
								'( ezycount_users.email LIKE "' .  $this->Session->read ( 'search_email' ) .
								 '"  ) ',
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
		$options = array (
				'conditions' => array (
						'User.' . $this->User->primaryKey => $id 
				) 
		);
		$this->set ( 'user', $this->User->find ( 'first', $options ) );
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
			$options = array (
					'conditions' => array (
							'User.' . $this->User->primaryKey => $id 
					) 
			);
			$this->request->data = $this->User->find ( 'first', $options );
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