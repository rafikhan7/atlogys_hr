<?php
// app/Model/Image.php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Image extends AppModel {

  public function addImage($data){  
    	$saveData['Image'] = $data;
    	$this->clear();
      	$this->saveAll($saveData);
      	return true;
    }

  public function getAllimage($user_id){
  	    $params = array(
        'conditions' => array(
        'Image.user_id' => $user_id
          )
        );

  		return	$query = $this->find('all', $params);
  }

  public function deleteImages($id){

  return $this->delete($id);

  }


}






	?>