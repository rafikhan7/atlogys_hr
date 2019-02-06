<?php

// app/Model/User.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Event extends AppModel

    {
    public function eventList()
        {
            return $this->find('all');
        }

    public function addEvent($data)
        {
            $saveData['Event'] = $data;
            $this->clear();
            $this->saveAll($saveData);
            return true;
        }

    public function updateEvent($id, $data)
        {
            $saveData['Event'] = $data;
            $saveData['Event']['id'] = $id;
            return $this->saveAll($saveData);
        }

    public function deleteEvent($id)
        {
            return $this->delete($id);
        }

    public function todayEvent($today) {

        // $this->layout = false;

        return $data = $this->find('all', array(
            'conditions' => array(
                'event_date' => $today,
            )
        ));
    }

    public function getEventNotification($eventIds) {
            $apiData = array();
            $this->Behaviors->load('Containable');
            $this->bindModel(array(
                'belongsTo' => array(
                    'User'
                )
            ));
            $conditions = ['conditions' => ['Event.id' => $eventIds], 'fields' => ['Event.id', 'Event.event_title,Event.event_created', 'User.name', 'User.profile_image'], 'contain' => ['User'], 'order' => array(
                'Event.id' => 'ASC'
            ) , ];
            $return = $this->find('all', $conditions);
            if(!empty($return)) {
                $return = Hash::combine($return, '{n}.Event.id','{n}');
            }
            return $return;
        }
    } 
