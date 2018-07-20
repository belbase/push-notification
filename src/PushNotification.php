<?php
namespace App\PushNotification;

use App\PushNotification\Providers\FirebaseCloudMessaging;
use App\PushNotification\Providers\PushNotificationInterface;
/**
 * 
 */

class PushNotification
{
	protected $service;

	function __construct(PushNotificationInterface $service){
		$this->service = $service;
	}

	public function service($name){
		$name = strtolower($name);
		switch($name)
		{
		    case 'firebase':
		        $this->service = new FirebaseCloudMessaging();
		    break;
		}
		return $this;
	}

	public function setMessage($title,$body){
		return $this->service->setMessage($title,$body);
	}

	public function sendMessage(){
		return $this->service->sendMessage();
	}

	public function to($to){
		return $this->service->to($to);	
	} 
}
?>