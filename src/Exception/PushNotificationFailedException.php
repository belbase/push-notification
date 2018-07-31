<?php

namespace Belbase\PushNotification\Exception;

use \Exception; 
class PushNotificationFailedException extends Exception{
	public function __construct(){
		$this->message="Push Notification can't be sent";
		$this->code="400";
	}
}

?>
