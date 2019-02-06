<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('HttpSocket', 'Network/Http');

class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'you@localhost',
	);

	public $smtp = array(
        'api_user' => 'rafiahmadkhan7@gmail.com',
        'api_key' => 'rafi@123#',
        'transport' => 'Smtp',
        'host' => 'https://api.sendgrid.com/api/mail.send.json', // important
        'port' => 587, // important
        'timeout' => 100, 
        'username' => 'rafiahmadkhan7@gmail.com',
        'password' => 'rafi@123#',
        'tls' => false,
        'log' => false,
        'charset' => 'utf-8',
        'headerCharset' => 'utf-8',        
    );
}
