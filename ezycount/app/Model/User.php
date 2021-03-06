<?php
App::uses ( 'AppModel', 'Model' );
class User extends AppModel {
	var $name = 'User';
	var $belongsTo = 'Company';
	public $displayField = 'title';
	
	private $selectAll = 
			"select u.* from (		
                    SELECT 	u.*, 
                			c.name,
   	 						c.canton, 
    						c.country as 'company_country',
    						c.id as 'company_id',
							c.user_id,
                
							MAX(case
							
								when o.status = 'ok' then 8
            			    	when o.status = '' then 7
                                
       				        	when c.current_step = 5 then 6
         			        	when c.current_step = 4 then 5
         			        	when c.current_step = 3 then 4
           				    	when c.current_step = 2 then 3
           				    	when c.current_step = 1 then 2
                				when c.current_step = 0 then 1
                                
								else 
                                	(case 
                                	when c.name LIKE '%test%' then 0
                                
                                	else 'Empty'
                                end )
                                
                			end) as current
                            
 					FROM ezycount_users u 
					LEFT OUTER JOIN ezycount_companies c ON c.user_id = u.id
					LEFT OUTER JOIN ezycount_orders o ON o.user_id = u.id
                            
                     group by u.id ) as u ";
	
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
					) 
			)
			// 'message' => 'Your custom message here',
			
			,
			'is_admin' => array (
					'required' => array (
							'rule' => array (
									'boolean' 
							) 
					) 
			)
			// 'message' => 'Your custom message here',
			
			,
			'created' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							) 
					) 
			)
			// 'message' => 'Your custom message here',
			
			,
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
					) 
			)
			// 'message' => 'Your custom message here',
			
			,
			'didTour' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							) 
					) 
			)
			// 'message' => 'Your custom message here',
			
			 
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
		
		// check if there are conditions
		if (! empty ( $conditions )) {
			$sql .= $conditions;
		}
		
		// make the order by title aviable
		if ($order != null) {
			
			$key = array_keys ( $order )[0];
			
			// replace User.id with ezycount_users
			// avoiding name conflict problems
			$column = str_replace ( 'User', 'u', $key );
			
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
