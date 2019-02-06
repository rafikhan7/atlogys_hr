 <?php

// app/Model/Comment.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Comment extends AppModel{
	 public function  addComment($data){
	 	   $saveData['Comment'] = $data;
  		   $this->clear();
    	   $this->saveAll($saveData);
     return true; 
	 }
	 public function  getComment($id){
        return $this->find('all', array(
            'conditions' => array(
                'user_birthday_id' => $id
                
            )
        ));
 
    }

 public function getUserComment($userIds){
        $apiData = array();
        $this->Behaviors->load('Containable');
        $this->bindModel(array('belongsTo' => array('User')));
        $conditions = [
            'conditions' => ['Comment.user_birthday_id' => $userIds],
            'fields' => ['Comment.user_id,user_birthday_id,comments', 'User.name','User.profile_image'],
            'contain' => ['User'],
            'order' => array('Comment.id' => 'ASC'),
        ];
        
        $return = $this->find('all', $conditions);
       
        return $return;
    }

} 