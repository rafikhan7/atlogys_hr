<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');
App::uses('Leave', 'Model');
App::uses('Email', 'Lib');
App::uses('xls', 'Lib');
App::uses('xlsHelper', 'View/Helper');
App::uses('HtmlHelper', 'View/xls');
App::uses('CakeEmail', 'Network/Email');
$Leave = new Leave();



class LeavesController extends AppController
{
    public $paginate = array('limit' => 25, 'conditions' => array('status' => '1'), 'order' => array('Event.event_title' => 'asc'));
    
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->layout = 'admin';
        
        // do any additional beforeFilter stuff after calling the parent function
    }
    public function viewLeav()
    {
        $this->set('title_for_layout', 'View Users');
        $this->layout = 'custom';
    }
    
    
    public function admin_leave_list() {
        $conditions = array();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $requestedData = isset($data['myselect']) ? $data['myselect'] : null;
            switch ($requestedData) {
                case 1:
                case 2:
                case 0:
                    $conditions = array('Leave.leave_status' => $requestedData);
                    break;
                default:
                    # code...
                    break;
            }
            $data = $this->paginate = array(
                'limit' => 2000,
                'order' => array('Leave.leave_created' => 'desc'),
                'conditions' => $conditions
            );
            $data = $this->paginate('Leave');
            $this->set('leave', $data);
            $this->set('selected', $requestedData);
            $this->render('/Leaves/leave_list');
        } else{ 
            $this->paginate = array(
                'limit' => 10,
                'order' => array('Leave.leave_created' => 'desc'),
            );
            $LeaveData = $this->paginate('Leave');
            $this->set('leave', $LeaveData);
            $requestedData=3;
            $this->set('selected', $requestedData);
            $this->render('/Leaves/leave_list');
       }

    }
    
    
    public function admin_action_leave()
    {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            $data = $this->request->data;
            $id   = $this->request->data['leave_id'];
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
                'action' => 'leave_list',
            ));
        }
    } 
    
    public function admin_leave_notification()
    {
        $getpending = $this->Leave->getPendingLeave();
        pr($getpending); die('kmke');
         foreach ($getpending as $pendigdata) {
            $pendiguserId = $value['Leave']['user_id'];
            if (!empty($pendiguserId)) {
                $detail = $this->Leave->getUserLeave($user_id);
                foreach ($detail as $value) {
                    $name = $value['User']['name'];
                    $manager_email = $value['UserManager']['email'];
                    $manager_name  = $value['UserManager']['name'];
                    $leave_start_date = $value['Leave']['leave_start_date'];
                    $leave_end_date = $value['Leave']['leave_end_date'];
                    $url = Router::url(array(
                    'controller' => 'leaves',
                    'action' => 'leave_list'
                ), true);

                    $dataArry =array('manager_name' => $manager_name,
                              'user_name' => $name,
                              'leave_start_date'=> $strt,
                              'leave_end_date'=>$end,
                              'url' =>$url

                );  $headers = "CC: hr@atlogys.com";
                    $Email = new Email();
                    $Email->sendEmail($manager_email, 'Leave Application Pending', 'leave_application_pending', $dataArry, $headers);
                }
            }
        }
    }

    public function admin_export()
    {
        $this->layout=false;
        require_once 'php-export-data.class.php';

        $students=$this->Leave->lastMonthLeave('all');

        $exporter = new ExportDataExcel('browser', 'EmployeLeave.xls'); 
        $exporter->initialize(); // starts streaming data to web browser
        $exporter->addRow(array("Name", "Leeve Start Date", "Leave End Date", "Total Leave","leave_status","leave_approve_by","available_leaves","Is Unique","Status"));


        foreach ($students as $key => $data) {
            $leaveStatus = $data['Leave']['leave_status'];

            if($leaveStatus == 0 ){
                $leaveStatus = "Pending";
            }elseif($leaveStatus == 1){
                 $leaveStatus = "Approved";
            }else{
                $leaveStatus = "Rejected";
            }
            $exporter->addRow(array($data['Leave']['apply_by'], $data['Leave']['leave_start_date'], $data['Leave']['leave_end_date'], $data['Leave']['total_leaves'],$leaveStatus,$data['Leave']['leave_approve_by'],$data['Leave']['available_leaves']));
        }

        $exporter->finalize(); // writes the footer, flushes remaining data to browser.
            exit(); // all done
    }

    public function admin_leave_monthly()
    {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('Leave.created' => 'asc' ),
        );
        $data = $this->paginate('Leave');
        $this->set('leave', $data);
        $this->render('/Leaves/leave_last_month');
    }

}
