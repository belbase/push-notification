<?php

namespace Belbase\PushNotification\Exception;

use Exception;

class PushNotificationFailedException extends Exception{

	protected $json;
	
	public function __construct($json=0){
		if($json!=0){
			$this->json = (object)$json[0];
			$this->message= (string) $this->json->error;
		}
		else{
			$this->message="Push Notification can't be sent";
		}

		$this->code="400";
	}
}

?>
