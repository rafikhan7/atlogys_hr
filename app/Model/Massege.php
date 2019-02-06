<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('User', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Massege extends AppModel {

  public $belongsTo = array('User');

  public function massegesList() { 
    $this->Behaviors->load('Containable');
  return  $query = $this->find('all', array(
    'fields' => array('Massege.*'),
        'contain' => array(
            'User' => array(
                'fields' => array('User.*'),
                 
            )
        )
    ));
  
  }
	public function addMasseges($data){
 
      	$this->saveAll($data);
      	return true;
    }

}