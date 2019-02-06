<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');
App::uses('Notification','Model');
App::uses('Email', 'Lib');
App::uses('CakeEmail', 'Network/Email');

class NotificationsController extends AppController {

    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('Notification.notification_title' => 'asc' ) 
    );

    public $uses = array('User','Notification','Activity');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
         if ($this->request->is('requested') && $this->request->params['action'] == 'index') {
         $this->Auth->allow(array('index'));
        // do any additional beforeFilter stuff after calling the parent function
     }
    }
   function viewNotification() {
        $this->set('title_for_layout', 'View Users');
        $this->layout = 'custom';
    }
  

    public function admin_notification_list() {
        
         $this->paginate = array(
            'limit' => 10,
            'order' => array('Notification.created' => 'asc' ),
        );
        $data = $this->paginate('Notification');
        $this->set('notification', $data);
        $this->render('/Notifications/notifications_list'); 
    }
    public function admin_notification_add() {
        
        
            if ($this->request->is('post')) {

                 $data = $this->request->data;
                // $users = $this->User->userList();
                
                // foreach ($users as  $value) {
                // $userEmail= $value['User']['email'];
                // $userName= $value['User']['first_name'];
                // $currentUserData = $this->Session->read('Auth.User');
                // $publisher_name= $currentUserData['name'];
                // $url = Router::url(array(
                //                 'controller' => 'users',
                //                 'action' => 'login') , true);
                // $dataArry = array('event_name'=>$this->request->data['event_title'],
                //     'publisher_name'=>$publisher_name,
                //     'user_name'=>$userName,
                //     'url'=>$url);
                // if($userName != $publisher_name){

                // $Email = new Email();
                // $send = $Email->sendEmail($userEmail, 'New Notification', 'new_event_publish', $dataArry);

                //  }
                //  }
 
                 $this->Notification->addNotification($data);
                 $this->redirect(array('controller' => 'Notifications', 'action' => 'admin_notification_list'));    
            }

   }

   public function admin_notification_edit($id) {

    if ($this->request->is('post')) {

          $data = $this->request->data;
          $id = $data['id'];
          $this->Notification->updateNotification($id, $data);
             $this->redirect(array('controller' => 'Notifications', 'action' => 'admin_notification_list'));    
            }
        $data = $this->Notification->findById($id);
        $this->set('notification', $data);
        $this->render('/Notifications/notification_edit');
        
    }


    public function admin_notification_delete($id) {
      
          $this->Notification->deleteNotification($id);

           $this->redirect(array('controller' => 'Notifications', 'action' => 'admin_notification_list'));    
            
    }
    public function admin_newsfeed(){
       
       $allUser = $this->User->userList();       
       $activity = $this->Activity->getActivity();

       foreach ($activity as $activity) {

        $activityData['activities_id'] = $activity['Activity']['id'];
        $activityData['object_id'] = $activity['Activity']['object_id'];
        $activityData['object_type'] = $activity['Activity']['object_type'];
        $activityData['action_type'] = $activity['Activity']['action_type'];
        $activityData[''] = $activity['Activity']['additional_detail'];
        $activityData[''] = $activity['Activity']['create'];
        foreach ($allUser as $user) {

           $activityData['user_id'] = $user['User']['id'];

             $status = $this->Notification->addNotification($activityData);
          # code...
        }

         # code...
       }
        

    }
}