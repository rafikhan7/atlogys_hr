<?php
/**
 * Class Name     : Email
 * Description    : This class provide email functionality
 * Author         : Nitin sharma
 * Created On     : 10-June-2015
 * Copyright      : Recruitmates
 */
App::uses('CakeEmail', 'Network/Email');
App::uses('HttpSocket', 'Network/Http');

class Email {
    protected $cakeEmailObj = null;
    protected $fromEmailAddress = array('rafikhan321992@gmail.com'=>'Atlogys HR');

    public function __construct() {
        $this->cakeEmailObj = new CakeEmail('smtp');
    }

    public function sendEmail($toAddress, $subject, $template=null, $dataArray=null) {
        $params = array(
            'api_user'  => 'rafiahmadkhan7@gmail.com',
            'api_key'   => 'rafi@123#',
            'to'        => 'rafi@atlogys.com',
            'subject'   => "sendgrid test",
            'html'      => 'this is bodydddd',
            'text'      => 'text here',
            'from'      => "hr@atlogys.com",

        );

        $request =  'https://api.sendgrid.com/api/mail.send.json';
        $email = new HttpSocket(array(
          'ssl_verify_host' => false,
        ));
//        $response = $email->post($request, $params);


        //return true;
        
        $this->cakeEmailObj->from($this->fromEmailAddress);
        $this->cakeEmailObj->to($toAddress);
        $this->cakeEmailObj->cc($headers);
        $this->cakeEmailObj->subject($subject);
        $this->cakeEmailObj->emailFormat('html');
        $this->cakeEmailObj->template($template);
        if ($dataArray) {
            $this->cakeEmailObj->viewVars($dataArray);
        }
        if (SEND_EMAIL) {
            try { //echo SEND_EMAIL;die;
                $this->cakeEmailObj->send_sendgrid();
            } catch (Exception $e) {
                print_r($e->getMessage());
            }
           
            return true;
        }
    }
}
