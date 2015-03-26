<?php
App::uses ( 'AppController', 'Controller' );
class CitiesController extends AppController {
	public $components = array (
			'Paginator',
			'Session' 
	);
	public function index() {
		
		// check if the search function was used
		if (isset ( $_POST ["search_city"] ) && isset ( $_POST ["search_plz"] )) {
			
			// check if the search fields containing something
			if ($_POST ["search_plz"] == "" && $_POST ["search_city"] == "") {
				
				// nothing in the input fields
				$this->displayAll ();
			} else {
				
				if ($_POST ["search_plz"] != "")
					echo "Search Zip " . $_POST ["search_plz"] . "<br/>";
				
				if ($_POST ["search_city"] != "")
					echo "Search City " . $_POST ["search_city"] . "<br/>";
				
				$this->search ( 
						($_POST ["search_city"] != "" ? $_POST ["search_city"] : null), 
						($_POST ["search_plz"] != "" ? $_POST ["search_plz"] : null) );
			}
		} else { // loading the page the first time
			$this->displayAll ();
		}
	}
	private function displayAll() {
		$this->City->recursive = 0;
		$this->set ( 'cities', $this->Paginator->paginate () );
	}
	public function search($city = null, $zip = null) {

		$options = array(
			'conditions' => array(
				'City.city' => $city
			)
		);
		
		$this->set ( 'cities',  $this->City->find ( 'all', $options ) );
	}
	
	public function view($id = null) { // view with search function
		if (! $this->City->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid city' ) );
		}
		
		$options = array (
				'conditions' => array (
						'City.' . $this->City->primaryKey => $id 
				) 
		);
		$this->set ( 'city', $this->City->find ( 'first', $options ) );
	}
	public function add() {
		if ($this->request->is ( 'post' )) {
			$this->City->create ();
			if ($this->City->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The city has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The city could not be saved. Please, try again.' ) );
			}
		}
	}
	public function edit($id = null) {
		if (! $this->City->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid city' ) );
		}
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
			if ($this->City->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The city has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The city could not be saved. Please, try again.' ) );
			}
		} else {
			$options = array (
					'conditions' => array (
							'City.' . $this->City->primaryKey => $id 
					) 
			);
			$this->request->data = $this->City->find ( 'first', $options );
		}
	}
	public function delete($id = null) {
		$this->City->id = $id;
		if (! $this->City->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid city' ) );
		}
		$this->request->allowMethod ( 'post', 'delete' );
		if ($this->City->delete ()) {
			$this->Session->setFlash ( __ ( 'The city has been deleted.' ) );
		} else {
			$this->Session->setFlash ( __ ( 'The city could not be deleted. Please, try again.' ) );
		}
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
}
