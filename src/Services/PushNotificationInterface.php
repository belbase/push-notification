<?php
namespace Belbase\PushNotification\Providers;

interface PushNotificationInterface{

	public function setMessage($title,$body,$data);
	public function sendMessage();
	public function to($to);
	// private function request($data);
}

?>