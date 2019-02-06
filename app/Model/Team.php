<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('TeamUser', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Team extends AppModel {

  public $hasMany = array('TeamUser');

	public function TeamList() { 
    $this->Behaviors->load('Containable');
	return	$query = $this->find('all', array(
        'contain' => array(
            'TeamUser' => array(
                'fields' => array('TeamUser.*'),
                'User' => array('fields' => array('User.name'))
            )
        )
    ));
	
	}
	public function addTeam($data){
    	$saveData['Team'] = $data;
    	$this->clear();
      	$this->saveAll($saveData);
      	return true;
    }

    public function updateTeam($id, $data){
          $saveData['Team'] = $data;
    	  return $this->saveAll($saveData);
           
	}
	public function deleteTeam($id){
	return $this->delete($id);
	}



}