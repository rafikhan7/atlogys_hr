<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');
App::uses('Event', 'Model');
App::uses('Email', 'Lib');
App::uses('CakeEmail', 'Network/Email');
App::uses('HttpSocket', 'Network/Http');

class EventsController extends AppController
{
    public $paginate = array(
        'limit' => 10,
        'conditions' => array('status' => '1'),
        'order' => array('Event.event_title' => 'asc' )
    );

    public $uses = array('User','Event');

    
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->layout = 'admin';
        if ($this->request->is('requested') && $this->request->params['action'] == 'index') {
            $this->Auth->allow(array('index'));
            // do any additional beforeFilter stuff after calling the parent function
        }
    }
    public function viewEvent()
    {
        $this->set('title_for_layout', 'View Users');
        $this->layout = 'custom';
    }
     

       /**
     *   Function Name : admin_event_list
     *   Description   : This function use to list event
     *   Author        : Rafi
     */

    public function admin_evnt_list()
    {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('Event.created' => 'asc' ),
        );
        $data = $this->paginate('Event');

        $this->set('events', $data);
        $this->render('/Events/event_list');
    }
      /**
     *   Function Name : admin_event_add
     *   Description   : This function use to add event
     *   Author        : Rafi
     */
    public function admin_event_add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $users = $this->User->userList();
            $image = $_FILES['event_image']['name'];
            if (!empty($image)) {
                $ext = substr(strtolower(strrchr($image, '.')), 1);
                $arr_ext = array(
                    'jpg',
                    'jpeg',
                    'gif',
                    'png'
                );
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($_FILES["event_image"]["tmp_name"], WWW_ROOT . 'files/uploads/event/' . $image);
                    $data['event_image'] = $image;
                }
            }
            foreach ($users as  $value) {
                $userEmail= $value['User']['email'];
                $userName= $value['User']['first_name'];
                $currentUserData = $this->Session->read('Auth.User');
                $publisher_name= $currentUserData['name'];
                $url = Router::url(array(
                                'controller' => 'users',
                                'action' => 'login'), true);
                $dataArry = array('event_name'=>$this->request->data['event_title'],
                    'publisher_name'=>$publisher_name,
                    'user_name'=>$userName,
                    'url'=>$url);
                if ($userName != $publisher_name) {
                    $Email = new Email();
                    $send = $Email->sendEmail($userEmail, 'New Event', 'new_event_publish', $dataArry);
                }
            }
 
            $this->Event->addEvent($data);
            $this->loadModel('Activity');
            $objectId = $this->Event->getInsertID();
                 $activityData = array(
                  'object_id'=>$objectId,
                  'object_type'=>OBJECT_TYPE_EVENT,
                  'action_type'=>ACTION_TYPE_EVENT,
                  );
                 $activity = $this->Activity->addActivity($activityData);
                 
            $this->redirect(array('action' => 'evnt_list'));
        }
    }
    
    /**
     *   Function Name : admin_event_edit
     *   Description   : This function use to edit event
     *   Author        : Rafi
     */
    public function admin_event_edit($id)
    {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data['id'];
            $this->Event->updateEvent($id, $data);
            $this->redirect(array('action' => 'evnt_list'));
        }
        $data = $this->Event->findById($id);
        $this->set('event', $data);
        $this->render('/Events/event_edit');
    }

    
     /**
     *   Function Name : admin_event_delete
     *   Description   : This function use to delet event
     *   Author        : Rafi
     */
    public function admin_event_delete($id)
    {
        $this->Event->deleteEvent($id);

        $this->redirect(array('action' => 'evnt_list'));
    }

     /**
     *   Function Name : event_detail
     *   Description   : This function use get deatil of an event
     *   Author        : Rafi
     */

    public function event_detail($id) {
        $this->layout = 'front_end';
        $this->loadModel('Image');
        $user_id = $this->Auth->user('id');
        $allImage = $this->Image->getAllimage($user_id);
        $userdata = $this->User->userData($user_id);        
        $data = $this->Event->findById($id);
        $this->set('image', $allImage);
        $this->set('user', $userdata);
        $this->set('event', $data);
        $this->render('/Events/event_detail');
        
    }

      /**
     *   Function Name : admin_event_notifications
     *   Description   : This function use send mail to all user if any event is today date
     *   Author        : Rafi
     */


    public function admin_event_notifications()
    {
        $this->layout = false;
        $todayDate = date('Y-m-d');
        $data = $this->Event->todayEvent($todayDate);
        $users = $this->User->userList();
                
        foreach ($users as  $value) {
            $userEmail= $value['User']['email'];
            $userName= $value['User']['first_name'];
            $currentUserData = $this->Session->read('Auth.User');
            $publisher_name= $currentUserData['name'];
            $url = Router::url(array(
                                'controller' => 'users',
                                'action' => 'login'), true);
            $dataArry = array('event_name'=>$this->request->data['event_title'],
                    'publisher_name'=>$publisher_name,
                    'user_name'=>$userName,
                    'url'=>$url);
            if ($userName != $publisher_name) {
                $Email = new Email();
                $send = $Email->sendEmail($userEmail, 'New Event', 'today_event_notification', $dataArry);
            }
        }
    }

    public function mailer() {

      echo '--inside';
       $params = array(
            'api_user'  => 'rafiahmadkhan7@gmail.com',
            'api_key'   => 'rafi@123#',
            'to'        => 'rafi@atlogys.com',
            'subject'   => "sendgrid test",
            'html'      => 'this is body',
            'text'      => 'text here',
            'from'      => "abhaya@atlogys.com",
//            'fromname'  => $this->_config['fromName'],
//            'replyto'   => $replyTos[0],
        );

        $request =  'https://api.sendgrid.com/api/mail.send.json';
        $email = new HttpSocket(array(
          'ssl_verify_host' => false
        ));
        $response = $email->post($request, $params);


        $r =  $response->body;

print_r($r);
exit;


    }

}
