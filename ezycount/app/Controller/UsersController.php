<?php
App::uses ( 'AppController', 'Controller' );
class UsersController extends AppController {
	public $components = array (
			'Paginator',
			'Session' 
	);
	private function searchFieldsUsed() {
		
		// check if the search function was used
		if (isset ( $_POST ["search_name"] ) && isset ( $_POST ["search_email"] )) {
			
			// check if the search fields are NOT containing something
			if ($_POST ["search_email"] == "" && $_POST ["search_name"] == "") {
				
				// nothing in the input fields
				return null;
			} else {
				
				return array (
						"name" => $_POST ["search_name"] != "" ? $_POST ["search_name"] : null,
						"mail" => $_POST ["search_email"] != "" ? $_POST ["search_email"] : null 
				);
			}
		}
		return null;
	}
	
	public function index() {
		// $this->User->recursive = 0;
		$defaultLimit = 10;

		if (isset ( $_POST ["select_value"] )) {
				
			$this->Session->write('session', $_POST ["select_value"]);
		
			$this->paginate = array (
					'User' => array (
							'limit' => $_POST ["select_value"]
					)
			);
				
				
				
		}
		elseif($this->Session->check('session')) {
			
			$this->paginate = array (
					'User' => array (
							'limit' => $this->Session->read('session')
					)
					);
			
			//$this->Session->destroy('session');
					
		}		
		
		else {
			$this->paginate = array (
					'User' => array (
							'limit' => $defaultLimit
					)
			);
		}
		
		// display result of search
		$searchFieldArray = $this->searchFieldsUsed ();
		
		if ($searchFieldArray != null) {
			
			if ($searchFieldArray ['mail'] != null)
				echo "Search E-Mail " . $_POST ["search_email"] . "<br/>";
			
			if ($searchFieldArray ['name'] != null)
				echo "Search Name " . $_POST ["search_name"] . "<br/>";
			
			$this->paginate = array (
					'User' => array (
							'conditions' => ('where first_name LIKE "' . $searchFieldArray ['name'] . '"') .
							'OR' .
							'(last_name LIKE "' . $searchFieldArray['name'] . '")' .
							'OR' .
							'(email LIKE "' . $searchFieldArray['mail'] . '")',
							'limit' => $defaultLimit,
					) 
			);
		}
		// else // display all users
		
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