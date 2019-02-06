<?php

// app/Model/User.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Post extends AppModel

    {
    public  function postList()
        {
            return $query = $this->find('all', array(
                'order' => array(
                    'Post.id' => 'DESC'
                ) ,
                'limit' =>-1
            ));
        }

    public function addPost($data){

            $saveData['Post'] = $data;
            $this->clear();
            $this->saveAll($saveData);
            return true;
        }

    public function updatePost($id, $data){
            $saveData['Post'] = $data;
            $saveData['Post']['id'] = $id;
            return $this->saveAll($saveData);
        }

    public function deletePost($id){
            return $this->delete($id);
        }

    public function postData(){
            return $query = $this->find('all', array(
                'order' => array(
                    'Post.id' => 'DESC'
                ) ,
                'limit' => 3
            ));
        }
    public function userPostData($userId){
              return $this->find('all',array(
                 'conditions' => array(
                    'user_id' => $userId,
             
                 ),
                  'limit' => 3
                 )
              );
        }
    public  function getPostNotification($postIds)
        {
            $apiData = array();
            $this->Behaviors->load('Containable');
            $this->bindModel(array(
                'belongsTo' => array(
                    'User'
                )
            ));
            $conditions = ['conditions' => ['Post.id' => $postIds], 'fields' => ['Post.id','Post.post_title,Post.created', 'User.name', 'User.profile_image'], 'contain' => ['User'], 'order' => array(
                'Post.id' => 'ASC'
            ) , ];
            $return = $this->find('all', $conditions);
            if(!empty($return)) {
                $return = Hash::combine($return, '{n}.Post.id','{n}');
            }
            return $return;
        }
    }
