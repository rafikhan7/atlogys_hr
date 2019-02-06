<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

App::uses('Image', 'Model');

class ImagesController extends AppController {
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ),
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'front_end';
        
        // do any additional beforeFilter stuff after calling the parent function
    }
    public function viewUsers() {
        $this->set('title_for_layout', 'View Users');
        $this->layout = 'front_end';
    }

    /**
     *   Function Name : upload_images
     *   Description   : This function use to dupload user images for documents on dashboard
     *   Author        : Rafi
     */
    public function upload_images() {
        $Image = new Image();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $this->Auth->user('id');
            $checkimage = $_FILES['files']['name']['0'];
            if(!empty($checkimage)){
            $path = WWW_ROOT . 'files/uploads/users/';
              
            $count =0;
            foreach ($_FILES['files']['name'] as $f => $name) {
                $image = $_FILES['files']['name'][$count];

               
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$image)) {
                    $data['user_id'] = $id;
                    $data['image_name'] = $image;
                    $this->Image->addImage($data);
                    $count++; // Number of successfully uploaded file
                }
            }
                 
            $this->redirect(array('controller'=>'users', 'action'=>'user_dashboard?msg=succesmsg'));
        
       }else{


          $this->redirect(array('controller'=>'users', 'action'=>'user_dashboard?error=error'));
            }
        }
    }

     /**
     *   Function Name : delete_images
     *   Description   : This function use to delete images
     *   Author        : Rafi
     */
    public function delete_images() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data['id'];
            $this->Image->deleteImages($id);
            $this->redirect(array('controller'=>'users', 'action'=>'user_dashboard'));
        }
    }
}
