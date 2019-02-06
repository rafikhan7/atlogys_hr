<?php

// app/Model/User.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Notification extends AppModel{
  public function notificationtList()
    {
    return $query = $this->find('all');
    }

  public function addNotification($data)
    {
    $saveData['Notification'] = $data;
    $this->clear();
    $this->saveAll($saveData);
    return true;
    }

  public function updateNotification($id, $data)
    {
    $saveData['Notification'] = $data;
    $saveData['Notification']['id'] = $id;
    
    return $this->saveAll($saveData);
    }

  public function deleteNotification($id)
    {
    return $this->delete($id);
    }

  public function getNotification($id)
    {
       return $data = $this->find('all', array(
      'conditions' => array(
        'user_id' => $id,
      )
      ));
    }
  }
