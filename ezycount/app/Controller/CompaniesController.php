<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class CompaniesController extends AppController {
	
	var $name = 'Companies';
	var $scaffold;

	public $components = array('Paginator', 'Session');

	public function index() {
		$this->Company->recursive = 0;
		
		// We use this to paginate the page, and to fix a limit in the records we want
		$defaultLimit = 10;
		
		// Check if we chose something from the dropdownlist
		if (isset ( $_POST ["select_value"] )) {
				
			// Put the value in Session to use when the page refreshes
			$this->Session->write ( 'session', $_POST ["select_value"] );
				
			// Display with the value sent by the dropdownlist
			$this->paginate = array (
					'Company' => array (
							'limit' => $_POST ["select_value"]
					)
			);
			// Check if there's something in the session
		} else if ($this->Session->check ( 'session' )) {
		
			// Put the value as defaultLimit when the page refreshes
			$defaultLimit =  $this->Session->read ( 'session' );
				
			// Display with session value
			$this->paginate = array (
					'Company' => array (
							'limit' => $defaultLimit
					)
			);
				
		}
		else {
			// Display with default value
			$this->paginate = array (
					'Company' => array (
							'limit' => $defaultLimit
					)
			);
		}
		
		
		$this->set('companies', $this->paginate('Company'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
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

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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