<?php
App::uses ( 'AppModel', 'Model' );
class Statistic extends AppModel {
	var $name = 'Statistic';
	
	
	private $selectNumberOfUsers = 
			"(  select count(id)  as totalUsers
				from ezycount_users)
			 as totalUsers ";
	
	private $selectNumberOfCompanies =
			"(  select count(id) as totalCompanies
				from ezycount_companies)
			as totalCompanies ";
	
	private $selectLanguageUsers = 	
			"select
				language,
				count(*) as number
			from ezycount_users as user
			group by language
			 ";
	
	private $selectCantonCompany = 
			"select 
				canton, count(*)  as number
			from ezycount_companies as company
			group by canton
			 " ;
	
	private $selectStepsUser = 
			"select current, count(1) as number
			from (		
                    SELECT 
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
                            
                     group by u.id ) as currentStep
        	group by current
			";

	
	private function getCorrectQuery($condition){
		
		switch ($condition){
			case 'oneLine':
				return "select * from " .
						$this->selectNumberOfUsers . ", " .
						$this->selectNumberOfCompanies ;
				
			case 'language':
				return $this->selectLanguageUsers;
			
			case 'canton':
				return $this->selectCantonCompany;
				
			case 'steps':
				return  $this->selectStepsUser;
		}
	}
	
	// custom paginator
	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$recursive = - 1;
	
		$key = null;
		$column = null;
	
		// Mandatory to have
		$this->useTable = false;
		$sql = '';
	
		
		$sql .= $this->getCorrectQuery($conditions);
	
		$results = $this->query ( $sql );
		
		
		return $results;
	}
	public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
		$sql = '';
	
		$this->recursive = $recursive;
		
		$sql .= $this->getCorrectQuery($conditions);
		
		$results = $this->query ( $sql );
	
		return count ( $results );
	}
}