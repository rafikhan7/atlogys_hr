<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('User', 'Model');
App::uses('Manager', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Leave extends AppModel {

    public function leaveList() {
        
        
        //return $query = $this->find('all');
        return $data = $this->find('all',array(
        'order' => array('Leave.id' => 'DESC'),
        'limit' => 10
        ));
        $data = $this->Paginator->paginate('data');
        $this->set(compact('data'));
        //return $data;
        
    }


    public function userLeave($id) {
        return $this->find('all', array(
            'conditions' => array(
                'user_id' => $id
                
            )
        ));
    }
       
    public function userLeaveData($id) 
    {
        return $this->find('first', array(
            'conditions' => array(
                'id' => $id
                
            )
        ));
        
    }
    public function addLeave($data)
    {
     
        $this->saveAll($data);
        return true;
        
        
    }
    public function actionLeave($id, $data)
    {
           /* 'order' => array('Leave.leave_created' => 'desc')
            'limit' => 1*/
        $saveData['Leave']       = $data;
        $saveData['Leave']['id'] = $id;
        $this->saveAll($saveData);
        return true;
    }

 public function getUserLeave($userIds){
        $apiData = array();
        $this->Behaviors->load('Containable');
        $this->bindModel(array('belongsTo' => array('User')));
        $conditions = [
            'conditions' => ['Leave.user_id' => $userIds],
            'fields' => ['Leave.leave_start_date,leave_end_date', 'User.name','UserManager.email','UserManager.name'],
            'contain' => ['User'],
            'joins' => array(
                array(
                    'alias' => 'Manager',
                    'table' => 'managers',
                    'conditions' => array(
                        'Manager.user_id = User.id'
                    ),
                    'type' => 'LEFT'
                ),
                array(
                    'alias' => 'UserManager',
                    'table' => 'users',
                    'conditions' => array(
                        'Manager.manager_id = UserManager.id'
                    ),
                    'type' => 'LEFT'
                )
            ),
            'order' => array('Leave.id' => 'desc'),
            'limit' =>1
        ];
        if(is_array($userIds)) {
            $return = $this->find('all', $conditions);
        } else {
            $return = $this->find('first', $conditions);
        }
        return $return;
    }

   public function getPendingLeave(){
      
        return $this->find('all', array(
            'conditions' => array(
                'Leave.leave_status' => 0
                
            )
        ));

   }
   public function duplicateLeave($id,  $firstdate, $lastdate){
         //pr($id);pr($firstdate);pr($lastdate);die;
        return $this->find('first', array(            
            'conditions' => array(
             'user_id' => $id,
             'leave_start_date >=' => $firstdate,
             'leave_end_date <=' => $lastdate,
            )
        ));
   }
   public function deleteLeave($id){
    return $this->delete($id);
   }

public function lastMonthLeave(){

        $current_month = date('m');
        $current_year = date('Y');
        $lastmonth = $current_month-1;
        $firstdate = $current_year."-".$lastmonth."-01";
        $lastdateofmonth = date('t',$lastmonth);
        $lastdate= $current_year."-".$lastmonth."-".$lastdateofmonth;
      
        return $this->find('all', array(
            
            'conditions' => array(
                'leave_start_date >=' => '2018-06-01',
                 'leave_end_date <=' => '2018-06-31',
            )
        ));

   }

public function managerList(){

     $apiData = array();
        $this->Behaviors->load('Containable');
        $this->bindModel(array('belongsTo' => array('User')));
        $conditions = [
            'conditions' => ['Leave.user_id' => $userIds],
            'fields' => ['Leave.leave_start_date,leave_end_date', 'User.name','UserManager.email','UserManager.name'],
            'contain' => ['User'],
            'joins' => array(
                array(
                    'alias' => 'Manager',
                    'table' => 'managers',
                    'conditions' => array(
                        'Manager.user_id = User.id'
                    ),
                    'type' => 'LEFT'
                ),
                array(
                    'alias' => 'UserManager',
                    'table' => 'users',
                    'conditions' => array(
                        'Manager.manager_id = UserManager.id'
                    ),
                    'type' => 'LEFT'
                )
            ),
            'order' => array('Leave.id' => 'desc'),
            'limit' =>1
        ];
        if(is_array($userIds)) {
            $return = $this->find('all', $conditions);
        } else {
            $return = $this->find('first', $conditions);
        }
        return $return;
    }

  public function approvedCount($id){
    $todayDate = date('Y-m-d');
    $data = $this->find('first', array(
        'conditions' => array('Leave.user_id' => $id,'Leave.leave_status' => 1),
        'fields' => ['SUM(Leave.total_leaves) as Total'],
    ));
    return isset($data['0']['Total']) ? $data['0']['Total'] : 0;
  }

  public function userApproveLeaveData(){
        $todayDate = date('Y-m-d');
        return $this->find('all', array(
       'conditions' => array('Leave.leave_status' => 1,
            'Leave.leave_end_date' =>  $todayDate),
        ));
        
    }
}