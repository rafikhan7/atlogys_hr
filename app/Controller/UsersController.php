<?php 

// app/Controller/UsersController.php

App::uses('AppController', 'Controller');
App::uses('User', 'Model');
App::uses('Event', 'Model');
App::uses('Post', 'Model');
App::uses('Image', 'Model');
App::uses('Manager', 'Model');
App::uses('Leave', 'Model');
App::uses('Email', 'Lib');
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {


    public $paginate = array(

        'limit' => 25,
        'conditions' => array(
            'status' => '1',
        ) ,
        'order' => array(
            'User.username' => 'asc',
        ),
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';

        // do any additional beforeFilter stuff after calling the parent function
    }

    public function viewUsers() {
        $this->set('title_for_layout', 'View Users');
        $this->layout = 'custom';
    }
    
     /**
     *   Function Name : login
     *   Description   : This function is use for user login  
     *   Author        : Rafi
     */
    public function login() {
        $this->layout = 'custom';
        if ($this->request->is('post')) {
            $data = $this->request->data;
        }
        $this->request->data['User'] = $data;
            
        {
            if ($this->Auth->loggedIn()) {
                $this->Auth->logout();
            }

            if ($this->Auth->login()) {
                if ($this->Auth->user('role') === 'admin') {
                    $this->Session->setFlash('You are Suucessfully Login HR admin panel.');
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Session->setFlash('You are Suucessfully Login Hr user dashboard.');
                    return $this->redirect($this->Auth->redirectUrl(array(
                        'controller' => 'users',
                        'action' => 'user_dashboard',
                    )));
                }
            } else {
                $this->Session->setFlash('Your User Name or Password is not correct.');
                return $this->redirect('/');
            }
            
            }
    }

     /**
     *   Function Name : admin log out
     *   Description   :admin_logout
     *   Author        : Rafi
     */
    public function admin_logout() {
        $this->Session->destroy();
        $this->Session->delete('User');
        return $this->redirect('/');
    }
    
     public function user_logout() {
        $this->Session->destroy();
        $this->Session->delete('User');
        return $this->redirect('/');
    }
    
     /**
     *   Function Name : admin_profile
     *   Description   : for admin  profile show
     *   Author        : Rafi
     */
     
    public function admin_profile() {

        // nothing done here, everything happens in the view

        $user = $this->User->findById($this->Auth->user('id'));
        $this->set(compact('user'));
    }
     /**
     *   Function Name : admin_index
     *   Description   : this function is for landing on index page
     *   Author        : Rafi
     */
    public function admin_index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array(
                'User.username' => 'asc',
            ) ,
            'conditions' => array(
                'User.status' => 1,
            ),
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }
      
       /**
     *   Function Name : admin_add
     *   Description   : this function is use for add mnew admin in system
     *   Author        : Rafi
     */
    public function admin_add() {
        if ($this->isAuthorized()) {
            if ($this->request->is('post')) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been created'));
                    return $this->redirect(array(
                        'action' => 'index',
                    ));
                } else {
                    $this->Session->setFlash(__('The user could not be created. Please, try again.'));
                }
            }
        } else {
            $this->Session->setFlash(__('You do not have permission to do this'));
            return $this->redirect(array(
                'action' => 'admin_dashboard',
            ));
        }
    }
    
     /**
     *   Function Name : admin_edit
     *   Description   : this function is use for edit admin information 
     *   Author        : Rafi
     */
    public function admin_edit($id = null) {
        if ($this->isAuthorized()) {
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                return $this->redirect(array(
                    'action' => 'index',
                ));
            }

            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash('Invalid User ID Provided');
                return $this->redirect(array(
                    'action' => 'index',
                ));
            }

            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    return $this->redirect(array(
                        'action' => 'edit',
                        $id,
                    ));
                } else {
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            }

            if (!$this->request->data) {
                $this->request->data = $user;
            }
        } else {
            $this->Session->setFlash(__('You do not have permission to do this'));
            return $this->redirect(array(
                'action' => 'admin_dashboard',
            ));
        }
    }
    
     /**
     *   Function Name : admin_delete
     *   Description   : This function is use for delete site admin
     *   Author        : Rafi
     */
    public function admin_delete($id = null) {
        if ($this->isAuthorized()) {
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                return $this->redirect(array(
                    'action' => 'admin_dashboard',
                ));
            }

            $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->Session->setFlash('Invalid user id provided');
                return $this->redirect(array(
                    'action' => 'admin_dashboard',
                ));
            }

            if ($this->User->saveField('status', 0)) {
                $this->Session->setFlash(__('User deleted'));
                return $this->redirect(array(
                    'action' => 'admin_dashboard',
                ));
            }

            $this->Session->setFlash(__('User was not deleted'));
            return $this->redirect(array(
                'action' => 'admin_dashboard',
            ));
        } else {
            $this->Session->setFlash(__('You do not have permission to do this'));
            return $this->redirect(array(
                'action' => 'admin_dashboard',
            ));
        }
    }

     /**
     *   Function Name : update_profileImage
     *   Description   : This function is use for update user profile image
     *   Author        : Rafi
     */
    public function update_profileImage() {
            
            $data = $_POST['image'];

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $imageName = time().'.png';

            file_put_contents('files/uploads/users/'.$imageName, $data);
            $data = $this->request->data;
            $id = $this->Auth->user('id');
            $profile_image = $imageName;
            if (!empty($profile_image)) {
                $ext = substr(strtolower(strrchr($profile_image, '.')), 1);
                $arr_ext = array(
                    'jpg',
                    'jpeg',
                    'gif',
                    'png',
                );
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($profile_image, WWW_ROOT . 'files/uploads/users/' . $profile_image);
                    
                    $data['profile_image'] = $profile_image;
                    $update = $this->User->updateUser($id, $data);
                    if ($update == 1) {
                        $this->Session->write('Auth.User.profile_image', $profile_image);
                        die();
                    }
                }
            }
        
        
        
    }
    
     /**
     *   Function Name : admin_dashboard
     *   Description   : This function is use for  landing on admin Dashboard
     *   Author        : Rafi
     */
    public function admin_dashboard() {
        $userData = $this->Auth->user();
        $role = $userData['role'];
        if ($role == "admin") {
            $this->loadModel('Post');
            $this->loadModel('Event');
            $this->loadModel('Massege');
            $datalist = $this->User->userList();
            $eventlist = $this->Event->eventList();
            $postlist = $this->Post->postList();
            $massege = $this->Massege->massegesList();
            $datacount = count($datalist);
            $eventcount = count($eventlist);
            $postcount = count($postlist);
            $this->set('users', $datalist);
            $this->set('user', $datacount);
            $this->set('event', $eventcount);
            $this->set('post', $postcount);
            $this->set('massege', $massege);
            $this->render('/Users/dashboard');
        } else {
            $this->redirect(array('controller' => 'users', 'action' => 'admin_logout'));
        }
    }
    


     /**
     *   Function Name : admin_register
     *   Description   : This function is use for register new user by admin
     *   Author        : Rafi
     */

    public function admin_register() {
        $data = $this->request->data;
        if (empty($data)) {
            $errors = $this->User->validationErrors;
            $this->set('errormsg', $errors);
            $this->render('/Users/user_list');
        }
        $this->loadModel('Manager');
        $this->User->set($this->data);
        if ($this->User->validates()) {
            $managerId = $this->request->data['manager_id'];
            $managerName = $this->User->userManger($managerId);
            $username = $data['email'];
            $firstName = $data['first_name'];
            $lastName = $data['last_name'];
            $name = $firstName.' '.$lastName;
            $email = $data['email'];
            $password = '3mEjwP';
            $data['username'] = $username;
            $data['name'] = $name;
            $data['password'] = $password;
            $data['manager_name'] = $managerName['User']['name'];
     
            $userregister = $this->User->registerUser($data);

            
             $userregister = 'User has been successfully register.';
             $this->set('successmsg', $userregister);
             $this->paginate = array(
                'limit' => 10,
                'order' => array('User.id' => 'desc'),
                'conditions' => array('User.status' => 1),
                );

             $userdata = $this->paginate('User');
             $mngData = $Managerdata = [];
             $Managerdata['user_id']= $this->User->getInsertID();
             $Managerdata['manager_id'] = $this->request->data['manager_id'];
             array_push($mngData, $Managerdata);
             array_push($mngData,[
                'user_id' => $this->User->getInsertID(),
                'manager_id' => $this->request->data['cc_id'],
                ]);
             $this->Manager->addManager($mngData);
             $url = Router::url(array(
                               'controller' => 'users',
                               'action' => 'login'), true);

             $dataArry =array('username' => $username,
                                    'password' =>$password,
                                    'name'=>$name,
                                    'url'=>$url);
              error_log("Big trouble, we're all out of FOOs!", 1,
               "rafi@atlogys.com");
                             // Logging class initialization
             $Email = new Email();
             $status = $Email->sendEmail($email, 'Welcome!', 'welcome', $dataArry);
             $this->set('user', $userdata);
             $this->render('/Users/user_list');    
            
        } else {
            $errors = $this->User->validationErrors;
            if(!empty($errors['email'])){
                $errorsmsg = isset($errors['email']['0']) ? $errors['email']['0'] : null;
            }
            if(!empty($errors['employe_id'])){
                $errorsmsg = isset($errors['employe_id']['0']) ? $errors['employe_id']['0']:null;
            }
            $this->set('errormsg', $errorsmsg);
            $this->paginate = array(
            'limit' => 10,
            'order' => array('User.id' => 'desc'),
            'conditions' => array('User.status' => 1),
        );

        $data = $this->paginate('User');
        $this->set('user', $data);
        $this->render('/Users/user_list');
        }
    }

     /**
     *   Function Name : admin_user_list
     *   Description   : this function is for get user list on admin dashboard
     *   Author        : Rafi
     */

    public function admin_user_list() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('User.created' => 'desc' ),
            'conditions' => array('User.status' => 1),
        );
        $data = $this->paginate('User');
        $this->set('user', $data);
        $this->render('/Users/user_list');
    }
 /**
     *   Function Name : admin_user_edit
     *   Description   : This function is for edit user informaytion by admin
     *   Author        : Rafi
     */
    public function admin_user_edit($id) {
        if ($this->request->is('post')) {
            $this->loadModel('Manager');
            $data = $this->request->data;
            if(!isset($data['is_reporting_manager'])){
                $data['is_reporting_manager'] = 0;
            }
            $id = $data['id'];
            $repmanager = $data['reporting_manager'];
            $update = $this->User->updateUser($id, $data);
            if(!empty($repmanager)){
             $update = $this->Manager->updateManager($id, $repmanager);
            }
            $this->redirect(array(
                        'action' => 'user_list?msg=succesmsg',
              ));
            
        }

        $data = $this->User->findById($id);
        $this->set('user', $data);
        $friendList = $this->User->userList();
        $this->set('friendList', $friendList);
        $this->render('/Users/user_edit');
    }
 /**
     *   Function Name : user_info_edit
     *   Description   : This function is for edit user informaytion by user
     *   Author        : Rafi
     */
    public function user_info_edit($id) {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data['id'];
            $update = $this->User->updateUser($id, $data);

            $this->redirect(array(
                        'action' => 'user_dashboard?msg=succesmsg',
              ));
        }
    }

     /**
     *   Function Name : user_update
     *   Description   : this function use for update user banner image by admin
     *   Author        : Rafi
     */
    public function user_update($id) {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data['id'];
            $banner_image = $_FILES['banner_image']['name'];
            if (!empty($banner_image)) {
                $ext = substr(strtolower(strrchr($banner_image, '.')), 1);
                $arr_ext = array(
                    'jpg',
                    'jpeg',
                    'gif',
                    'png',
                );
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($_FILES["banner_image"]["tmp_name"], WWW_ROOT . 'files/uploads/banner/' . $banner_image);
                    $data['banner_image'] = $banner_image;
                    $update = $this->User->updateUser($id, $data);
                    $this->redirect(array(
                        'action' => 'user_dashboard?msg=succesmsg',
                    ));
                }
            }else{

                 $this->redirect(array(
                        'action' => 'user_dashboard?error=error',
                    ));
            }
        }
    }
   
     /**
     *   Function Name : user_viewuserId
     *   Description   : Thsi function use for view user profile
     *   Author        : Rafi
     */
     public function user_view(){   

        $link = $this->request->here;
        $link_array = explode('/', $link);
        $id = end($link_array);
        $this->layout = 'front_end';
        $this->loadModel('Image');
        $this->loadModel('Post');
        $this->loadModel('Leave');
        $date = date('Y-m-d');
        $friendList = $this->User->userList();
        $data = $this->User->userData($id);
        $allImage = $this->Image->getAllimage($id);
        $userPost = $this->Post->userPostData($id);
        $this->paginate = array(
            'limit' => -1,
            'order' => array('Leave.leave_created' => 'asc' ),
            'conditions' => array('Leave.user_id' => $id),
        );
        $leave_data = $this->paginate('Leave');
        $this->set('leave', $leave_data );
        $this->set('userpost', $userPost);
        $this->set('user', $data);
        $this->set('image', $allImage);
        $this->render('/Users/user_view');
     }

    /**
     *   Function Name : admin_user_delete
     *   Description   : Thsi function use for delet user by admin
     *   Author        : Rafi
     */
    public function admin_user_delete($id) {
        $this->User->deleteUser($id);
        $this->redirect(array(
            'action' => 'user_list',
        ));
    }
    
     /**
     *   Function Name : admin_user_birthday
     *   Description   : this  function use for acces admin panel birthaday page
     *   Author        : Rafi
     */
    public function admin_user_birthday() {
        
        $data = $this->User->userList();
        $this->set('user', $data);
        $this->render('/Users/user_birthday');
    }

     /**
     *   Function Name : user_dashboard
     *   Description   : This function is use for  landing on Dashboard
     *   Author        : Rafi
     */
    public function user_dashboard() {

        $this->loadModel('TeamUser');
        $this->loadModel('Team');
        $this->loadModel('Image');
        $this->loadModel('Post');
        $this->loadModel('Leave');
        $this->loadModel('Manager');
        $this->loadModel('Holiday');
        $this->layout = 'front_end';
        $this->loadModel('Notification');
        $id = $this->Auth->user('id');
        $sortBy = 1;
        $leave_data = $this->Manager->LeaveManagerlist($id,$sortBy);
        $notification = $this->user_notification();     
        $friendList = $this->User->userList();
        $userBirthday = $this->User->allUserBirthday();
        $post = $this->Post->postData();
        $event = $this->Event->eventList();
        $data = $this->User->userData($id);
        $allImage = $this->Image->getAllimage($id);
        $userLeave =$this->Leave->userLeave($id);
        $atlogysLeave =$this->Holiday->hlidayList();
        $team = $this->Team->TeamList();
        $this->set('notification', $notification);
        $this->set('teams', $team);
        $this->set('holiday', $atlogysLeave);       
        $this->set('post', $post);
        $this->set('user', $data);
        $this->set('userBirthday', $userBirthday);
        $this->set('managerleavList', $leave_data);
        $this->set('leave', $userLeave);
        $this->set('image', $allImage);
        $this->set('friend', $friendList);
        $this->set('events', $event);
        $this->render('/Users/user_dashboard');
    }


     /**
     *   Function Name : user_leave
     *   Description   : This function is use for  landing on leave page
     *   Author        : Rafi
     */
     public function user_notification(){
        $apiData = array();
        $this->loadModel('Post');
        $this->loadModel('Event');
        $this->loadModel('Notification');
        $id = $this->Auth->user('id');
        $notification = $this->Notification->getNotification($id);
        if(!empty($notification)) {
            $data = array();
            $keyValue = Hash::combine($notification ,'{n}.Notification.object_id','{n}.Notification.object_id','{n}.Notification.object_type');
            foreach ($keyValue as  $key => $value) {
                switch($key){
                    case OBJECT_TYPE_EVENT: 
                        $data[OBJECT_TYPE_EVENT] = $this->Event->getEventNotification(array_values($value));
                        break;
                    case OBJECT_TYPE_POST:
                        $data[OBJECT_TYPE_POST] = $this->Post->getPostNotification(array_values($value));
                        break;
                    case OBJECT_TYPE_LEAVE:
                        $data[OBJECT_TYPE_LEAVE] = $this->Leave->getLeaveNotification(array_values($value));
                        break;
                    case OBJECT_TYPE_BIRTHADAY:
                        $data[OBJECT_TYPE_BIRTHADAY] = $this->Birthday->getBirthdayNotification(array_values($value));
                        break;
                    default:
                        echo "No information available for that day.";
                        break;
                }
            }   
        }
        if(!empty($data)) {
            $apiData = $this->getFormatedData($notification, $data);
        }
        return $apiData;
    }

    public function getFormatedData($notification = array(), $data = array()) {
        $returnData = array();
        if(!empty($notification) && !empty($data)) {
            foreach ($notification as $key => $value) {
                $returnData[$key] =  $value;
               /* $returnData[$key]['minMap'] = $data[$value['Notification']['object_type']][$value['Notification']['object_id']];*/
            }
        }
        return $returnData;
    }


    public function user_leave() {
        

        if ($this->request->is('post')) {
            $this->loadModel('Leave');
            $this->layout = 'front_end';
            $user_id  = $this->Auth->user('id');
            $user_name  = $this->Auth->user('name');
            $reqdata  = $this->request->data;
            $leaveDat = $reqdata['date'];
            $leavetyp = $reqdata['leavetype'];
            $requesText = $reqdata['request_text'];
            $leaveDat   = explode("-", $leaveDat);
            $Date1      = $leaveDat['0'];
            $Date2      = $leaveDat['1'];
            $leaveStart = strtotime($Date1);
            $strt       = date('Y-m-d', $leaveStart);
            $leaveEnd   = strtotime($Date2);
            $end        = date('Y-m-d', $leaveEnd);
            $strt_date  = date_create($strt);
            $end_date   = date_create($end);
            date_sub($strt_date, date_interval_create_from_date_string('1 day'));
            $interval            = date_diff($strt_date, $end_date);
            $num                 = $interval->format('%a');
            $total_business_days = 0;
            
            for ($i = 0; $i < $num; $i++) {
                date_add($strt_date, date_interval_create_from_date_string('1 day'));
                $next_day = date_format($strt_date, 'd-m-Y');
                $new_date = new DateTime($next_day);
                $weeknum  = $new_date->format('w');
                if (($weeknum != 0) && ($weeknum != 6)) {
                    $total_business_days++;
                }
            }
            if ($leavetyp == .5) {
                $data['total_leaves'] = $leavetyp;
            } else {
                $data['total_leaves'] = $total_business_days;
            }
            $detail = $this->Leave->getUserLeave($user_id);
            $name = $detail['User']['name'];
            $manager_email = $detail['UserManager']['email'];
            $manager_name  = $detail['UserManager']['name'];
            $leave_start_date = $detail['Leave']['leave_start_date'];
            $leave_end_date = $detail['Leave']['leave_end_date'];
            $data['user_id']          = $user_id;
            $data['apply_by']          = $user_name;
            $data['leave_start_date'] = $strt;
            $data['leave_end_date']   = $end;
            $data['request_text']   = $requesText;
            $compareLeave = $this->Leave->duplicateLeave($user_id, $strt, $end);
            if(empty($compareLeave)){
            $this->Leave->addLeave($data);

            $url = Router::url(array(
                    'controller' => 'leaves',
                    'action' => 'leave_list'
                ), true);

            $dataArry =array('manager_name' => $manager_name,
                              'user_name' =>$name,
                              'leave_start_date'=> $strt,
                              'leave_end_date'=>$end,
                              'url' =>$url

                );
            $headers = "CC: hr@atlogys.com";
            $Email = new Email();
            $Email->sendEmail($manager_email, 'Leave Application', 'leave_application', $dataArry,$headers); 
            }
          
            $this->loadModel('Image');
            $user_id = $this->Auth->user('id');
            $data = $this->User->userData($user_id);
            $allImage = $this->Image->getAllimage($user_id);
            $approvedLeave = $this->Leave->approvedCount($user_id);
            $this->set('leavecount', $approvedLeave);
            $this->set('user', $data);
            $this->set('image', $allImage);
            $this->paginate = array(
            'limit' => 10,
            'order' => array('Leave.leave_created' => 'asc' ),
            'conditions' => array('Leave.user_id' => $user_id),
            );
            $leave_data = $this->paginate('Leave');
            $this->set('leave', $leave_data );
            $this->render('/Users/user_leave');
            
        } else {
            
        $this->layout = 'front_end';
        $this->loadModel('Leave');
        $this->loadModel('Image');
        $user_id = $this->Auth->user('id');
        $data = $this->User->userData($user_id);
        $allImage = $this->Image->getAllimage($user_id);
        $approvedLeave = $this->Leave->approvedCount($user_id);
        $this->set('leavecount', $approvedLeave);
        $this->set('user', $data);
        $this->set('image', $allImage);
        $this->paginate = array(
            'limit' => 10,
            'order' => array('Leave.leave_created' => 'asc' ),
            'conditions' => array('Leave.user_id' => $user_id),
        );
        $leave_data = $this->paginate('Leave');
        $this->set('leave', $leave_data );
        $this->render('/Users/user_leave');
        }
    }

    public function user_leaveUpdate() {
        $this->loadModel('Leave');
        $leaveData = $this->Leave->userApproveLeaveData();
        foreach ($leaveData as $leaveData) {
            $takenlLeave =  $leaveData['Leave']['total_leaves'];
            $userId =  $leaveData['Leave']['user_id'];
            $data = $this->User->userData($userId);
            $el = $data['User']['el'];
            $cl = $data['User']['cl'];
            $remainLeave = 0;
            $updateData = array();
            if($cl > 0) {
                $remainLeave = $cl- $takenlLeave;
                $updateData['cl'] = $remainLeave;
            }
            if($remainLeave <= 0) {
               if($remainLeave < 0){ 
               $remainLeave = $remainLeave * -1;}
               if($cl == 0) {$remainLeave = $takenlLeave;}
               $remainLeave = $el - $remainLeave;
               $updateData['cl'] = 0;
               $updateData['el'] = $remainLeave;
            }
            $update = $this->User->updateUser($userId, $updateData);

        }
        
      
       
       
    }
     /**
     *   Function Name : forget_password
     *   Description   : This function is use for send mail fro password reset
     *   Author        : Rafi
     */
    public function forget_password() {
        $this->layout = 'custom';
        if ($this->request->is('post')) {
            if (empty($this->data['email'])) {
                $errors = 'Please Provide Your Email Adress that You used to Register with Us';
                $this->set('errors', $errors);
                $this->render('/Users/forget_password');
            }

            $emails = $this->request->data['email'];


            // Check if the Email exist

            $firstEmail = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $emails,
                ),
            ));
            if (!empty($firstEmail)) {
                

                // create the url with the reset function
                $name = $firstEmail['User']['first_name'];
                $id = $firstEmail['User']['id'];
                $hash = base64_encode($id);
                $url = Router::url(array(
                    'controller' => 'users',
                    'action' => 'reset',
                ), true) . '/' . $id;
               
                $dataArry =array('url' => $url,
                                'name' =>$name, );
                // ============Email================//

                if ($emails) {
                    $Email = new Email();
                    $status = $Email->sendEmail($emails, 'forget password', 'reset_password', $dataArry);
                    $emailSucces = 'Check Your Email To Reset your password';
                    $this->set('successmsg', $emailSucces);
                    $this->render('/Users/forget_password');
                } else {
                    $errors = 'Please Provide Your Email Adress that You used to Register with Us';
                    $this->set('errors', $errors);
                    $this->render('/Users/forget_password');
                }
            }
        }

        
        $this->render('/Users/forget_password');
    }

     /**
     *   Function Name : managerList
     *   Description   : This function is use get all manager list 
     *   Author        : Rafi
     */
    public function managerList() {
        $this->layout = 'front_end';
        $this->loadModel('Manager');
        $this->loadModel('Image');
        if($this->request->is('post')) {
            $data = $this->request->data;
        }
        $sortBy = isset($data['myselect']) ? $data['myselect'] : null;
        $dateFilter = isset($data['date_filter']) ? $data['date_filter'] : null;
        
        $user_id = $_SESSION['Auth']['User']['id'];
        $parem = array('sortBy' => $sortBy, 'date_filter' => $dateFilter);
        $leave_data = $this->Manager->LeaveManagerlist($user_id, $parem);
        $userdata = $this->User->userData($user_id);
        $allImage = $this->Image->getAllimage($user_id);
        $this->set('image', $allImage);
        $this->set('leave', $leave_data);
        $this->set('user', $userdata);
        $this->set('detail', $leave_data);
        $this->set('filterData', $parem);
        $this->render('/Users/user_managerlist');
    }

     /**
     *   Function Name : reset
     *   Description   : Thsi function is use for reset user password
     *   Author        : Rafi
     */

    public function reset() {
        $this->layout = 'custom';

        if ($this->request->is('post')) {
            $password = $this->request->data['password'];
            $cofirm_password = $this->request->data['confirm_password'];
            if ($password != $cofirm_password) {
                $notSucces = 'Your password is not matching with confirm password.';
                $this->set('notSucces', $notSucces);
                $this->render('/Users/reset');
            }

            $id =  $_SESSION['Auth']['User']['id'];
            $data['password'] = $this->request->data['password'];
            if (!empty($password)) {

                $update = $this->User->updateUser($id, $data);

                $this->redirect(array(
                    'action' => 'login',
                ));
            }
        } else {
            $notSucces = 'Your password is not matching with confirm password.';

            $this->set('notSucces', $notSucces);
            $this->render('/Users/reset');
        }
    }
     /**
     *   Function Name : user_publishPost
     *   Description   : This function use for publish post
     *   Author        : Rafi
     */
  
public function user_publishPost() {
       $this->layout = 'front_end';
           $this->loadModel('Post');
            if ($this->request->is('post')) {

                $data = $this->request->data;
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

               $status =  $this->Post->addPost($data);
             
                $this->redirect(array('controller' => 'Users', 'action' => 'user_dashboard'));
               
           }
   }
     /**
     *   Function Name : todayBirthday_notification
     *   Description   : This function use for send mail to birthday wishes to birthday person
     *   Author        : Rafi
     */
    public function todayBirthday_notification() {
        $this->layout = 'front_end';
        $todayDate = date('Y-m-d');
        $users = $this->User->userList();
        foreach ($users as  $value) {
            $userEmail= $value['User']['email'];
            $userName= $value['User']['first_name'];
            $birthdaydata = $this->User->userBirthday($todayDate);
            foreach ($birthdaydata as $birthdayvalue) {
                $birthday_boy_name= $birthdayvalue['User']['name'];
                $url = Router::url(array(
                                'controller' => 'users',
                                'action' => 'login', ), true);
                $dataArry = array('birthday_boy_name'=>$birthday_boy_name,
                    'user_name'=>$userName,
                    'url'=>$url, );
                if ($userName != $publisher_name) {
                    $Email = new Email();
                    $send = $Email->sendEmail($userEmail, 'Birthday Notification', 'today_birthday_notification', $dataArry);
                }
            }
        }
    }
    /**
     *   Function Name : user_post
     *   Description   :  This function use for retrive data on post page
     *   Author        : Rafi
     */
    public function user_post() {
        $this->loadModel('Image');
        $id = $this->Auth->user('id');
        $this->layout = 'front_end';
        $allImage = $this->Image->getAllimage($id);
        $data = $this->User->userData($id);
        $this->loadModel('Post');
        $post = $this->Post->postList();
        $this->set('image', $allImage);
        $this->set('user', $data);
        $this->set('post', $post);
        $this->render('/Users/user_post');
    }
     /**
     *   Function Name : user_event
     *   Description   : This function use for retrive data on event page
     *   Author        : Rafi
     */
    public function user_event() {
        $this->loadModel('Image');
        $id = $this->Auth->user('id');
        $this->layout = 'front_end';
        $allImage = $this->Image->getAllimage($id);
        $this->set('image', $allImage);
        $data = $this->User->userData($id);
        $this->set('user', $data);
        $this->loadModel('Event');
        $event = $this->Event->eventList();
        $this->set('events', $event);
        $this->render('/Users/user_event');
    }
     /**
     *   Function Name : user_birthday
     *   Description   : This function use for retrive data on birthday page
     *   Author        : Rafi
     */
    public function user_birthday() {
        $this->loadModel('Image');
        $this->loadModel('Birthday');
        $this->loadModel('Comment');
        $this->layout = 'front_end';
        $id = $this->Auth->user('id');
        $allImage = $this->Image->getAllimage($id);
        $this->set('image', $allImage);
        $data = $this->User->userData($id);
        $this->set('user', $data);
        $this->loadModel('Post');
        $post = $this->Post->postList();
        $this->set('$post', $post);
        $todayDate = date('Y-m-d');
        $birthdaydata = $this->User->userBirthday($todayDate);
        
        if(!empty($birthdaydata)){
            $insertData['user_id'] =  $birthdaydata['0']['User']['id'];
            $birthdayadded = $this->Birthday->addBirhtday($insertData);
            $getbirtday = $this->Birthday->getBirhtday($insertData);
            $birthday_id =  $getbirtday['0']['Birthday']['id'];
            $comments = $this->Comment->getUserComment($birthday_id);
            $this->set('birthdayId', $birthday_id);
            $this->set('comments', $comments);
            $this->set('birthdaydata', $birthdaydata);
        }
        
        $this->render('/Users/user_birthday');
    }
     /**
     *   Function Name : manger_action_leave
     *   Description   : This function use for action on leave by manager
     *   Author        : Rafi
     */
 
   public function manger_action_leave()
    {

        if ($this->request->is('post')) {
            $this->loadModel('Leave');
            $data = $this->request->data;
            $data['leave_approve_date'] = date("Y-m-d");
            $id   = $this->request->data['leave_id'];
            $leavedate = $this->request->data['date'];
            $leaveDat   = explode("-", $leavedate);
            $Date1      = $leaveDat['0'];
            $Date2      = $leaveDat['1'];
            $leaveStart = strtotime($Date1);
            $strt       = date('Y-m-d', $leaveStart);
            $leaveEnd   = strtotime($Date2);
            $end        = date('Y-m-d', $leaveEnd);
            $data['leave_start_date'] = $strt;
            $data['leave_end_date']   = $end;
            $status = $this->request->data['leave_status'];
            $approver_comment = $data['approver_comment'];
            $this->Leave->actionLeave($id, $data);            
            $user_data = $this->Leave->userLeaveData($id);
            $leave_status  = $user_data['Leave']['leave_status'];
            $subject = 'Leave Approved!';
            if ($leave_status != LEAVE_STATUS_APPROVE) {
                $subject = 'Leave Rejected!';
              }
            $action_by  = $user_data['Leave']['leave_approve_by'];
            $user_name =  $user_data['Leave']['apply_by'];
            $user_id =  $user_data['Leave']['user_id'];
            $user_datas = $this->User->userData($user_id);
            $user_email = $user_datas['User']['email'];
            $dataArry = array('user_name'=>$user_name,
                'action_by'=>$action_by,
                'action_text'=>$approver_comment,
                'status'=>$status
                );
            $headers = "CC: hr@atlogys.com";
            $Email = new Email();
            $status = $Email->sendEmail($user_email, $subject, 'leave_action', $dataArry, $headers);
            $LeaveData = $this->Leave->leaveList();
            $this->set('leave', $LeaveData);
            return $this->redirect(array(
                'action' => 'managerList',
            ));
        }
    } 
     /**
     *   Function Name : user_cron_update
     *   Description   : This function use for update user data EL and  manage balance of leave on 31st of march 
     *   Author        : Rafi
     */

    public function user_cron_update(){
      $this->loadModel('Leave');      
      $userData = $this->User->userList();     
      foreach ($userData as  $users) {
        $joiningDate = $users['User']['joining_date'];
        $user_id = $users['User']['id'];
        $user_leav_data = $this->Leave->userLeaveData($user_id);
        $today = date('Y-m-d');
        $date = $joiningDate;
        // End date
        $end_date = '2020-12-31';

        while (strtotime($date) <= strtotime($end_date)) {
                    echo "$date\n";
                    $date = date ("Y-m-d", strtotime("+4 month", strtotime($date)));
                    if($date == $today){
                    $userEl = $users['User']['el'];
                    $data['el'] = $userEl + 4;
                    $update = $this->User->updateUser($user_id, $data);
                    }
        
        }
         $today_date = date('d');
         $today_mnth = date('m');
         if ($today_date == 31 && $today_mnth == 3) {
            $data['el'] = 0;
            $update = $this->User->updateUser($user_id, $data);
         }

      }
    }
    public function birthday_comments(){
        $this->layout = 'front_end';
        $this->loadModel('Comment');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $current_user_id = $_SESSION['Auth']['User']['id'];
            $data['user_id'] = $current_user_id;
            $commnent = $this->Comment->addComment($data);  

            if($commnent == 1){  
                $succesmsg = "Successfully Commented";
                 return $this->redirect(array(
                'action' => 'user_birthday?msg=succesmsg',
            ));
            }else{

                return $this->redirect(array(
                'action' => 'user_birthday',
            ));
            }

        }
    }
   public function leave_delete($id){
        $this->layout = 'front_end';

        $this->loadModel('Leave');
        $this->Leave->deleteLeave($id);
        $this->layout = 'front_end';
        $this->loadModel('Leave');
        $this->loadModel('Image');
        $user_id = $this->Auth->user('id');
        $data = $this->User->userData($user_id);
        $allImage = $this->Image->getAllimage($user_id);
        $approvedLeave = $this->Leave->approvedCount($user_id);
        $this->set('leavecount', $approvedLeave);
        $this->set('user', $data);
        $this->set('image', $allImage);
        $this->paginate = array(
            'limit' => 10,
            'order' => array('Leave.leave_created' => 'asc' ),
            'conditions' => array('Leave.user_id' => $user_id),
        );
        $leave_data = $this->paginate('Leave');
        $this->set('leave', $leave_data );
        $this->render('/Users/user_leave');
    }
   /* public function apply_leave(){
        $this->layout = 'custom';

        if ($this->request->is('post')) {
            $this->loadModel('Leave');
            die;
            $user_id  = $this->Auth->user('id');
            $user_name  = $this->Auth->user('name');
            $reqdata  = $this->request->data;
            pr($reqdata);die;
            $leaveDat = $reqdata['date'];
            $leavetyp = $reqdata['leavetype'];
            $requesText = $reqdata['request_text'];
            $leaveDat   = explode("-", $leaveDat);
            $Date1      = $leaveDat['0'];
            $Date2      = $leaveDat['1'];
            $leaveStart = strtotime($Date1);
            $strt       = date('Y-m-d', $leaveStart);
            $leaveEnd   = strtotime($Date2);
            $end        = date('Y-m-d', $leaveEnd);
            $strt_date  = date_create($strt);
            $end_date   = date_create($end);
            date_sub($strt_date, date_interval_create_from_date_string('1 day'));
            $interval            = date_diff($strt_date, $end_date);
            $num                 = $interval->format('%a');
            $total_business_days = 0;
            
            for ($i = 0; $i < $num; $i++) {
                date_add($strt_date, date_interval_create_from_date_string('1 day'));
                $next_day = date_format($strt_date, 'd-m-Y');
                $new_date = new DateTime($next_day);
                $weeknum  = $new_date->format('w');
                if (($weeknum != 0) && ($weeknum != 6)) {
                    $total_business_days++;
                }
            }
            if ($leavetyp == .5) {
                $data['total_leaves'] = $leavetyp;
            } else {
                $data['total_leaves'] = $total_business_days;
            }
            
            $data['user_id']          = $user_id;
            $data['apply_by']          = $user_name;
            $data['leave_start_date'] = $strt;
            $data['leave_end_date']   = $end;
            $data['request_text'] = $requesText;
            $this->Leave->addLeave($data);
            $detail = $this->Leave->getUserLeave($user_id);
            $name = $detail['User']['name'];
            $manager_email = $detail['UserManager']['email'];
            $manager_name  = $detail['UserManager']['name'];
            $leave_start_date = $detail['Leave']['leave_start_date'];
            $leave_end_date = $detail['Leave']['leave_end_date'];
            $url = Router::url(array(
                    'controller' => 'leaves',
                    'action' => 'leave_list'
                ), true);

            $dataArry =array('manager_name' => $manager_name,
                              'user_name' =>$name,
                              'leave_start_date'=> $strt,
                              'leave_end_date'=>$end,
                              'url' =>$url

                );
            $headers = "CC: somebodyelse@example.com";
            $Email = new Email();
            $Email->sendEmail($manager_email, 'Leave Application', 'leave_application', $dataArry,$headers);
            $LeaveData = $this->Leave->leaveList();
            $this->set('leave', $LeaveData);
            $approvedLeave = $this->Leave->approvedCount($user_id);
            $this->set('leavecount', $approvedLeave);
            $this->render('/Users/user_leave');
        } else {
            
            $this->render('/Users/user_leave');
        }
       
    }*/
}
