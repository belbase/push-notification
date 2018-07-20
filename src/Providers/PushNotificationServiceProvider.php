<?php 
namespace App\Providers;

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
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $service = Config::get('pushnotification.service');
        $this->app->bind('PushNotification', 'App\PushNotification\PushNotification');
        $this->app->bind('App\PushNotification\Providers\PushNotificationInterface','App\PushNotification\Providers\\'.$service.'CloudMessaging');
        // dd($service);
	}

    public function boot(){
  //       $this->publishes([
  //           __DIR__.'/config/config.php' => base_path('config/indipay.php'),
  //           __DIR__.'/views/middleware.blade.php' => base_path('app/Http/Middleware/VerifyCsrfMiddleware.php'),
  //       ]);
		// $this->loadViewsFrom(__DIR__.'/views', 'indipay');
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