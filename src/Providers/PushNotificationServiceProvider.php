<?php 
namespace Belbase\PushNotification\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class PushNotificationServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Stored the service name along with service key.
	 *
	 * @var array
	 */
	protected $Service = [
		'firebase'=>'FirebaseCloudMessaging'
	];

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $serviceKey = Config::get('pushnotification.service');
        $this->app->bind('PushNotification', 'Belbase\PushNotification\PushNotification');
        $this->app->bind('Belbase\PushNotification\Providers\PushNotificationInterface','Belbase\PushNotification\Providers\\'.$this->service[$serviceKey]);
	}

    public function boot(){
        $this->publishes([
            __DIR__.'/../config/config.php' => base_path('config/pushnotification.php'),
        ]);
    }
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
        ];
	}
}