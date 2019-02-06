<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');
App::uses('Event', 'Model');
App::uses('Email', 'Lib');
App::uses('CakeEmail', 'Network/Email');

class HolidaysController extends AppController
{
    public $paginate = array(
        'limit' => 10,
        'conditions' => array('status' => '1'),
        'order' => array('Holiday.holiday_date' => 'asc' )
    );

    public $uses = array('User','Holiday');

    
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

    public function admin_holiday_list()
    {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('Holidays.created' => 'asc' ),
        );
        $data = $this->paginate('Holiday');
        $this->set('holidays', $data);
        $this->render('/Holidays/holiday_list');
    }

    public function admin_holiday_add(){

      if ($this->request->is('post')) {
            $data = $this->request->data;          
 
            $this->Holiday->addHoliday($data);
           
            $this->redirect(array('action' => 'holiday_list'));
        }

    }
       /**
     *   Function Name : admin_event_edit
     *   Description   : This function use to edit event
     *   Author        : Rafi
     */
    public function admin_holiday_edit($id)
    {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data['id'];
            $this->Event->updateHoliday($id, $data);
            $this->redirect(array('action' => 'holiday_list'));
        }
        $data = $this->Holiday->findById($id);
        $this->set('holidays', $data);
        $this->render('/Holidays/holiday_list');
    }

    
     /**
     *   Function Name : admin_event_delete
     *   Description   : This function use to delet event
     *   Author        : Rafi
     */
    public function admin_holidays_delete($id)
    {
        $this->Holiday->deleteHoliday($id);

        $this->redirect(array('action' => 'holiday_list'));
    }

     


}
