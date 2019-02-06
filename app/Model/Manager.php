<?php
// app/Model/Manager.php
App::uses('AppModel', 'Model');
App::uses('Profile',  'Model');
App::uses('User',     'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Manager extends AppModel {
	
   	public $belongsTo = array('User' => array('foreignKey' => 'manager_id'));
	public function addManager($data)
    {  
        $this->saveAll($data);
        return true;
    }

    public function LeaveManagerlist($user_id, $parem){
        $sortBy = $parem['sortBy'];
        $dateFilter = $parem['date_filter'];
        $currentDate = date('Y-m-d');
        $conditions = array('Manager.manager_id' => $user_id);
    	if(!empty($sortBy)){
            $conditions['Leave.leave_status'] = $sortBy;
        }
    	if(!empty($dateFilter)){
            if($dateFilter == STATUS_TWO){
                $conditions['Leave.leave_end_date >= '] = $currentDate; 
            }
            if($dateFilter == STATUS_ONE){
                $conditions['Leave.leave_end_date <= '] = $currentDate; 
            }
        }
	      $apiData = $this->find('all', array(
		            'conditions' =>$conditions,
		            'fields' => array('User.name','Leave.*'),
		            'contain' => array(
		                'User' => array(
		                    'fields' => array('User.name'),
		                    'Leave' => array('fields' => array('Leave.*')),
		                ),
		            ),
		            'joins' => array(
		                array(
		                    'alias' => 'Leave',
		                    'table' => 'leaves',
		                    'conditions' => array(
		                        'Manager.user_id = Leave.user_id'
		                    ),
		                    'type' => 'inner',
		                    
		                )
		            ),
		            'order' => array('Leave.id' => 'desc'),
		        ));
	      return $apiData;
		}

		public function updateManager($userId, $managerId){
		    return $this->updateAll(['Manager.manager_id' => $managerId],
		    	['Manager.user_id' => $userId]);
		}

}