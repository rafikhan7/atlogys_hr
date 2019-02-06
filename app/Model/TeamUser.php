<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('User', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class TeamUser extends AppModel {


   public $belongsTo = 'User';

	 public function getUsers() { 

		return	$query = $this->find('all');
		return $data = $this->find('all',array(
                'order' => array('Team.id' => 'DESC'),
                'limit' => 10
        ));
        $data = $this->Paginator->paginate('data');
    	$this->set(compact('data'));
    	//return $data;

	}
	public function addTeamUsers($userid,$teamid){
    	$saveData['user_id'] = $userid;
      $saveData['team_id'] = $teamid;
    	$this->clear();
      	$this->saveAll($saveData);
      	return true;
    }

    public function updateTeam($id, $data){
          $saveData['Team'] = $data;
    	  return $this->saveAll($saveData);
        }
}