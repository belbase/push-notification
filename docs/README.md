# PushNotification
[![Build Status](https://travis-ci.org/belbase/push-notification.svg?branch=0.1)](https://travis-ci.org/belbase/push-notification)
<br/>
The Laravel 5 Package for Push Notification. Currently supported Services: <a href="https://firebase.google.com/">Firebase Cloud Messaging</a>

## Installation
**Step 1:** Install package using composer
```
    composer require belbase/push-notification
```

**Step 2:** Add the service provider to the config/app.php file in Laravel (Optional for Laravel 5.5)
```php
    Belbase\PushNotification\Providers\PushNotificationServiceProvider::class,
```

**Step 3:** Add an alias for the Facade to the config/app.php file in Laravel (Optional for Laravel 5.5)
```php 
    'PushNotification' => Belbase\PushNotification\Facades\PushNotification::class,
```

**Step 4:** Publish the config by running in your terminal
```
    php artisan vendor:publish
```

## Usage

Edit the config/pushnotification.php. Set the appropriate Service and its parameters. Then in your code... <br>
``` use PushNotification;  ``` <br>

Initiate Request and Redirect using the default service:-
```php 
      /* All Required Parameters by your Service */
      $deviceAccessToken = 'DEVICE-ACCESS-TOKEN-HERE';
      $metaData=[
        // enter data to send along with notification
      ];
      return PushNotification::to($deviceAccessToken)->setMessage('title','body',$metaData)->sendMessage();
```

## Contributors
1. Deepak Belbase
2. Deepak Gupta

## License

The PushNotification is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
  