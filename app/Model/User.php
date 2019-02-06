<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('Manager',  'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	
	//public $belongsTo = 'Manager';
    
public $validate = array(
		'email' => array(
			'required' => array(
				'rule' => array('email', true),    
				'message' => 'Please provide a valid email address.'    
			),
			 'unique' => array(
				'rule'    => array('isUniqueEmail'),
				'message' => 'This email is already in use',
			),
			'between' => array( 
				'rule' => array('between', 6, 60), 
				'message' => 'Usernames must be between 6 to 60 characters'
			),
	   
		),
		'employe_id' => array(
			'required' => array(
				'rule' => array('employe_id', true),    
				'message' => 'Please provide a valid Employe Id.'    
			),
			'unique' => array(
				'rule'    => array('isUnique'),
				'message' => 'This Employe Id is already in use',
			)
		)	
    );
	
		/**
	 * Before isUniqueUsername
	 * @param array $options
	 * @return boolean
	 */
 function isUniqueEmployeId($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.employe_id'
				),
				'conditions' => array(
					'User.employe_id' => $check['employe_id']
				)
			)
		);

		if(!empty($username)){
			if($this->data[$this->alias]['employe_id'] == $username['User']['employe_id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
   
	/**
	 * Before isUniqueEmail
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueEmail($check) {

		$email = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.email'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			)
		);

		if(!empty($email)){
			if($this->data[$this->alias]['email'] == $email['User']['email']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
	
	public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
	
	public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 


    public function userList() { 

		//return	$query = $this->find('all');
		return $data = $this->find('all',array(
                'order' => array('User.id' => 'DESC'),
                'limit' => 10
        ));
        $data = $this->Paginator->paginate('data');
    	$this->set(compact('data'));
    	//return $data;

	}

	 public function userData($id) { 
	  return $this->find('first',array(
            'conditions' => array(
                'id' => $id,
             
            )
        ));
	}
	public function userBirthday($todatDate) { 
	  return $this->find('all',array(
            'conditions' => array(
                'date_of_birth' => $todatDate,
             
            )
        ));
	}
	public function userManger($id) { 
	  return $this->find('first',array(
            'conditions' => array(
                'id' => $id,
             
            ),
            'fields'=>'name'
        ));
	}
public function allUserBirthday() { 
	  return $this->find('all',array(
	  	    'fields'=>'date_of_birth,profile_image,name'           
        ));
	}

    public function registerUser($data){
    	$saveData['User'] = $data;
    	$this->clear();
      	$this->saveAll($saveData);
      	return true;
    }

    public function updateUser($id, $data){
    
          $saveData['User'] = $data;
          $saveData['User']['id'] = $id;   
    	  return $this->saveAll($saveData,['validate' => false]);
           
	}
	public function deleteUser($id){
	return $this->delete($id);
	}
	/**
	 * Before Save
	 * @param array $options
	 * @return boolean
	 */
  public function beforeSave($options = array()) {

		// hash the user's password befor we save it
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		
				
		// if we get an updated password, hash it
		if (isset($this->data[$this->alias]['password_update'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password_update']
			);
			
		}
		
		// fallback to our parent
		return parent::beforeSave($options);
	}

}