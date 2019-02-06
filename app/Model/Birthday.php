<?php

// app/Model/Birthday.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Birthday extends AppModel{
	public $validate = array(
    'user_id' => array(
        'rule' => 'idAndTypeUnique',
        'message' => "ID already exist"
    )
);

public function idAndTypeUnique() 
{
    $existing = $this->find('first', array(
        'conditions' => array(
            'user_id' => $this->data[$this->name]['user_id']
         )
    ));

    return (count($existing) == 0);
}
	 public function  addBirhtday($data){
	 	   $saveData['Birthday'] = $data;
  		   $this->clear();
    	   $this->saveAll($saveData, array('validate' => true));
     return true; 
 

	 }
     public function  getBirhtday($id){
        return $this->find('all', array(
            'conditions' => array(
                'user_id' => $id
                
            )
        ));
 

   }

}