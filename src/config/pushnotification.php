<?php
return [

	/*
    |--------------------------------------------------------------------------
    | Push Notification Service
    |--------------------------------------------------------------------------
    |
    | This value determines the "url" your application is currently
    | using for pushnotification.
    |
    */

    'service'	=>	env('PUSH_NOTIFICATION_SERVICE','Firebase'),

    /*
    |--------------------------------------------------------------------------
    | Firebase
    |--------------------------------------------------------------------------
    |
    | This value determines the "api_key" your application is currently
    | using for pushnotification.
    |
    */
    'firebase' =>   [
        /*
        |--------------------------------------------------------------------------
        | Source URL
        |--------------------------------------------------------------------------
        |
        | This value determines the "url" your application is currently
        | using for pushnotification.
        |
        */
            'url' => 'https://fcm.googleapis.com/fcm/send',
        /*
        |--------------------------------------------------------------------------
        | Server Key
        |--------------------------------------------------------------------------
        |
        | This value determines the "api_key" your application is currently
        | using for pushnotification.
        |
        */
            'server_key' => 'AAAAYYQ-TFY:APA91bH2ZaNE0lY_rhgBleERh_zGYuRDLs8ztQuLt2Q1wxzKpIoijNQxcMpKi0YGXwC5Xt6haTDav-xSCyEdEBNjmTnVlSvlxKGCGiPAMybmyMyNS5S6Ahdd-AdgQJxObO9GTUOWfQgyftEKYJjjnKoNLs_YKoUAJA',
        /*
        |--------------------------------------------------------------------------
        | sender ID
        |--------------------------------------------------------------------------
        |
        | This value determines the "api_key" your application is currently
        | using for pushnotification.
        |
        */
            'sender_id' => '418830502998',
        /*
        |--------------------------------------------------------------------------
        | API Key
        |--------------------------------------------------------------------------
        |
        | This value determines the "api_key" your application is currently
        | using for pushnotification.
        |
        */
            'api_key' => 'AIzaSyBq7WGNmc63guVM-lwqKF5Ad5nPKfpcL_g',
    ],
    

    
];