<?php
namespace App\PushNotification\Providers;

interface PushNotificationInterface{

	public function setMessage($title,$body);
	public function sendMessage();
	public function to($to);
	// private function request($data);
}

?>