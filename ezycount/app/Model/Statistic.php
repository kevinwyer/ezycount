<?php
App::uses ( 'AppModel', 'Model' );
class User extends AppModel {
	
	
	private $selectAll = "";
	
	// custom paginator
	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$recursive = - 1;
	
		$key = null;
		$column = null;
	
		// Mandatory to have
		$this->useTable = false;
		$sql = '';
	
		$sql .= $this->selectAll;
	
		// check if there are conditions
		if (! empty ( $conditions )) {
			$sql .= $conditions;
		}
	
		// make the order by title aviable
		if ($order != null) {

		}
	
		// Adding LIMIT Clause
		$sql .= " limit " . (($page - 1) * $limit) . ', ' . $limit;
	
		$results = $this->query ( $sql );
	
		return $results;
	}
	public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
		$sql = '';
	
		$sql .= $this->selectAll;
		if (! empty ( $conditions ))
			$sql .= $conditions;
	
		$this->recursive = $recursive;
	
		$results = $this->query ( $sql );
	
		return count ( $results );
	}
}