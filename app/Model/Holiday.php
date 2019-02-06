<?php

// app/Model/User.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Holiday extends AppModel

    {
    public function hlidayList()
        {
            return $this->find('all');
        }

    public function updateHoliday($id, $data)
        {
            $saveData['Holiday'] = $data;
            $saveData['Holiday']['id'] = $id;
            return $this->saveAll($saveData);
        }

    public function deleteHoliday($id)
        {
            return $this->delete($id);
        }
      public function addHoliday($data)
        {
            $saveData['Holiday'] = $data;
            $this->clear();
            $this->saveAll($saveData);
            return true;
        }

}