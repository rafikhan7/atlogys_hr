<?php

// app/Model/Activity.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Activity extends AppModel{
	 public function  addActivity($data){
	 	   $saveData['Activity'] = $data;
  		   $this->clear();
    	   $this->saveAll($saveData);
     return true; 
	 }
	 public function  getActivity($id){
        return $this->find('all', array(
            'conditions' => array(
                'status' => LEAVE_STATUS_PENDING
                
            )
        ));
 
    }

 public function getUserActivity($userIds){
           return $this->find('all', array(
            'conditions' => array(
                'user_id' => $userIds
                
            )
        ));
 
    }

} 