<?php


class Delivery extends AppModel {
	var $name = 'Delivery';
	var $displayField = 'id';
	var $belongsTo = array(
		'Driver', 'Company'
	);
	
	function route_sms() {
	
		App::import('Core', 'HttpSocket');
		$HttpSocket = new HttpSocket();
		
		//requesting session key
		$response = $HttpSocket->get(
			'https://api.clickatell.com/http/auth', 
			'api_id=3445614&user=HACKATHON7&password=SVSA9ZTms');
		
		$session_id = substr($response, 4, 99);
		$this->log($session_id,'debug');
		//debug($response);
		$recipient = "447840191458";
		$content = urlencode("test message");
		
		$response = $HttpSocket->get(
			"https://api.clickatell.com/http/sendmsg", 
			"session_id={$session_id}&to={$recipient}&text={$content}");
		
		$this->log($response,'debug');
		
		//$this->log($HttpSocket->response,'debug');
		
	}
	
	function route_email() {
	
	}
	
	function route_signature() {
	
	}
}
