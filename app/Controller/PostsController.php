<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');
App::uses('Post','Model');
App::uses('Email', 'Lib');
App::uses('CakeEmail', 'Network/Email');

class PostsController extends AppController {

    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('Post.post_title' => 'asc' ) 
    );

    public $uses = array('User','Post','Activity');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
         if ($this->request->is('requested') && $this->request->params['action'] == 'index') {
         $this->Auth->allow(array('index'));
        // do any additional beforeFilter stuff after calling the parent function
     }
    }
   function viewPost() {
        $this->set('title_for_layout', 'View Users');
        $this->layout = 'custom';
    }

    /*public function index() {
      $this->Session->destroy();
        $this->Session->delete('User');
        return $this->redirect('/');

     }*/
  

    public function admin_post_list() {
        
         $this->paginate = array(
            'limit' => 10,
            'order' => array('Post.created' => 'DESC' ),
        );
        $data = $this->paginate('Post');
        $this->set('post', $data);
        $this->render('/Posts/admin_index'); 
    }
    public function admin_post_add() {
      
            if ($this->request->is('post')) {

                 $data = $this->request->data;
                 $data['user_id'] = $this->Auth->user('id');
                 $users = $this->User->userList();
                 $image = $_FILES['post_image']['name'];
                  if (!empty($image))
                {
                $ext = substr(strtolower(strrchr($image, '.')) , 1);
                $arr_ext = array(
                    'jpg',
                    'jpeg',
                    'gif',
                    'png'
                );
                if (in_array($ext, $arr_ext))
                    {
                    move_uploaded_file($_FILES["post_image"]["tmp_name"], WWW_ROOT . 'files/uploads/post/' . $image);
                $data['post_image'] = $image;

                     }
                 }
                foreach ($users as  $value) {
                $userEmail= $value['User']['email'];
                $userName= $value['User']['first_name'];
                $currentUserData = $this->Session->read('Auth.User');
                $publisher_name= $currentUserData['name'];
                $url = Router::url(array(
                                'controller' => 'users',
                                'action' => 'login') , true);
                $dataArry = array('event_name'=>$this->request->data['post_title'],
                    'publisher_name'=>$publisher_name,
                    'user_name'=>$userName,
                    'url'=>$url);
                if($userName != $publisher_name){

                $Email = new Email();
                $send = $Email->sendEmail($userEmail, 'New Event', 'new_event_publish', $dataArry);

                 }
                 }
                 $this->loadModel('Activity');
                 $this->Post->addPost($data);
                 $objectId = $this->Post->getInsertID();
                 $activityData = array(
                  'object_id'=>$objectId,
                  'object_type'=>OBJECT_TYPE_POST,
                  'action_type'=>ACTION_TYPE_POST,
                  );
                 $activity = $this->Activity->addActivity($activityData);
                 $this->redirect(array('action' => 'post_list'));
                
            }

   }

     public function admin_Post_edit($id) {

      if ($this->request->is('post')) {

            $data = $this->request->data;
            $id = $data['id'];
            $image = $_FILES['post_image']['name'];
                  if (!empty($image))
                {
                $ext = substr(strtolower(strrchr($image, '.')) , 1);
                $arr_ext = array(
                    'jpg',
                    'jpeg',
                    'gif',
                    'png'
                );
                if (in_array($ext, $arr_ext))
                    {
                    move_uploaded_file($_FILES["post_image"]["tmp_name"], WWW_ROOT . 'files/uploads/post/' . $image);
                $data['post_image'] = $image;

                     }
                 }
            $this->Post->updatePost($id, $data);
            $this->redirect(array('action' => 'post_list'));
              }
          $data = $this->Post->findById($id);
          $this->set('post', $data);
          $this->render('/Posts/admin_edit');
          
      }
     public function post_detail($id) {

        $this->layout = 'front_end';
        $this->loadModel('Image');
        $user_id = $this->Auth->user('id');
        $this->layout = 'front_end';
        $allImage = $this->Image->getAllimage($user_id);
        $data = $this->User->userData($user_id);
        $this->loadModel('Post');
        $post = $this->Post->postList();
        $this->set('image', $allImage);
        $this->set('user', $data);
        $this->set('post', $post);
        $data = $this->Post->findById($id);
        $this->set('post', $data);
        $this->render('/Posts/post_view');
        
    }

    public function admin_post_delete($id) {
      
          $this->Post->deletePost($id);

          $this->redirect(array('action' => 'post_list'));
            
    }
  
}