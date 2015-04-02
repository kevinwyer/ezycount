<?php
App::uses ( 'AppModel', 'Model' );
class User extends AppModel {
	
	var $name = 'User';
	var $belongsTo = 'Company';
	
	public $displayField = 'title';
	
	private $selectAll = "SELECT * FROM ezycount_users LEFT JOIN ezycount_companies ON ezycount_companies.user_id = ezycount_users.id ";
	
	public $validate = array (
			'id' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							) 
					) 
			),
			'email' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'E-Mail required' 
					) 
			),
			'password' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'Password required' 
					) 
			),
			'title' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'Title required (Mr. or Mrs.)' 
					) 
			),
			'first_name' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'First name required' 
					) 
			),
			'last_name' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'Last name required' 
					) 
			),
			'country' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'Country required' 
					) 
			),
			'is_activated' => array (
					'required' => array (
							'rule' => array (
									'boolean' 
							) 
					// 'message' => 'Your custom message here',
										) 
			),
			'is_admin' => array (
					'required' => array (
							'rule' => array (
									'boolean' 
							) 
					// 'message' => 'Your custom message here',
										) 
			),
			'created' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							) 
					// 'message' => 'Your custom message here',
										) 
			),
			'language' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'Language required' 
					) 
			),
			'disabled' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							) 
					// 'message' => 'Your custom message here',
										) 
			),
			'didTour' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							) 
					// 'message' => 'Your custom message here',
										)
			) 
	);
	
	// custom paginator
	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$recursive = - 1;
		
		$key = null;
		$column = null;
		
		// Mandatory to have
		$this->useTable = false;
		$sql = '';
		
		$sql .= $this->selectAll;
		
		//check if there are conditions
		if (! empty ( $conditions )){
			$sql .= $conditions;
		}
		
		// make the order by title aviable
		if ($order != null) {
			$key = array_keys ( $order )[0];
			
			// replace User.id with ezycount_users
			// avoiding name conflict problems
			$column = str_replace('User', 'ezycount_users', $key); 
			
			$sql .= 'ORDER BY ' . $column . ' ' . $order [$key];
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
