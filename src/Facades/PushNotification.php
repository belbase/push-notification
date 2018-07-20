<?php
namespace App\PushNotification\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 
 */
class PushNotification extends Facade
{
	
	protected static function getFacadeAccessor() { return 'PushNotification'; }
}
?>