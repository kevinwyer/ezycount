<?php
App::uses('AppModel', 'Model');

class Company extends AppModel {
	
	var $name = 'Company';
	var $belongsTo = 'User';

	public $displayField = 'name';
	
	private $selectImports = "SELECT * FROM `ezycount_companies` as company, `ezycount_bookings` as bookings WHERE company.id = bookings.company_id AND bookings.source = 'import'";
	
	private $selectAll = "SELECT * FROM ezycount_companies LEFT JOIN ezycount_users ON ezycount_companies.user_id = ezycount_users.id ";
	
	public $validate = array(
		'id' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),
		'user_id' => array(
			'required' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
			),
		),
		'name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),
		'number' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),
		'street' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),
		'zip' => array(
			'required' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
			),
		),
		'city' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),
		'country' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),
		'phone' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
		),
		'email' => array(
			'required' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',

			),
		),
		'website' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',

			),
		),
		'type' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',

			),
		),
		'first_accounting_year' => array(
			'required' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',

			),
		),
		'closing_date' => array(
			'required' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',

			),
		),
		'blocking_date' => array(
			'required' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',

			),
		),
		'currency' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',

			),
		),
		'vat_registered' => array(
			'required' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',

			),
		),
		'vat_model' => array(
			'required' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',

			),
		),
		'vat_both' => array(
			'required' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',

			),
		),
		'vat_number' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',

			),
		),
		'starting_vat' => array(
			'required' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',

			),
		),
		'created' => array(
			'required' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',

			),
		),
		'expiration_date' => array(
			'required' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',

			),
		),
		'current_step' => array(
			'required' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',

			),
		),
		'test' => array(
			'required' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',

			),
		),
		'logo' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',

			),
		),
		'background_color' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',

			),
		),
		'disabled' => array(
			'required' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',

			),
		),
		'canton' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',

			),
		),
	);
	
	// custom paginator
	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$recursive = - 1;
	
		// variable used for order
		$key = null;
		$column = null;
	
		// Mandatory to have
		$this->useTable = false;
		$sql = '';
	
		$sql .= $this->selectAll;
	
		// only use conditions if used 
		// ex. where clause
		if (! empty ( $conditions ))
			$sql .= $conditions;
		
		// only add the order clause if needed
		if ($order != null) {
			$key = array_keys ( $order )[0];

			// replace Company.id with ezycount_companies
			// avoiding name conflict problems
			$column = str_replace('Company', 'ezycount_companies', $key);
			
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