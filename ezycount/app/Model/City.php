<?php
App::uses('AppModel', 'Model');

class City extends AppModel {

	private $selectAll = "SELECT * FROM ezycount_cities ";
	
	public $validate = array(
		'country' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'The country can not be empty',
			),
		),
		'zip' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'The zip code can not be empty',
			),
		),
		'city' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'The city can not be empty',
			),

		),
	);
	
	// custom paginator
	// needed because of the search function
	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$recursive = -1;
	
		// Mandatory to have
		$this->useTable = false;
		$sql = '';
	
		$sql .= $this->selectAll ; 
		
		if (!empty($conditions))
			$sql .= $conditions;
		
		// Adding LIMIT Clause
		$sql .=  " limit " . (($page - 1) * $limit) . ', ' . $limit;
		
	
		$results = $this->query($sql);
		
	
		return $results;
	}
	
	
	public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
	
		$sql = '';
	
		$sql .= $this->selectAll;
		if (!empty($conditions))
			$sql .= $conditions;
	
		$this->recursive = $recursive;
	
		$results = $this->query($sql);
	
		return count($results);
	}
}
