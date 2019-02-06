<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

App::uses('masseges','Model');

class MassegesController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'front_end';
        
        // do any additional beforeFilter stuff after calling the parent function
    }

    public function add_masseges() {

         if ($this->request->is('post')) {

                 $data = $this->request->data;
                 
                 if(!empty($data['massege'])){
                 $massege = $data['massege'];
                 $u = $this->Auth->user();
                 $uid = $u['id'];
                 $data['user_id'] = $uid;
                 $data['massege'] = $massege;
                 $this->Massege->addMasseges($data);
                 $this->redirect(array('controller'=>'users', 'action'=>'user_dashboard?sendmsg=succes'));
                 
                }else{
                  
                    $this->redirect(array('controller'=>'users', 'action'=>'user_dashboard?error=error'));
                }
            }

             }

}