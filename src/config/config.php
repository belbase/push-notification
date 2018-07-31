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
    | This value determines the firebase service for pushnotification.
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
        | This value determines the "server_key" your application is currently
        | using for pushnotification.
        |
        */
            'server_key' => 'YOUR-SERVER-KEY-HERE',
        /*
        |--------------------------------------------------------------------------
        | sender ID
        |--------------------------------------------------------------------------
        |
        | This value determines the "sender_id" your application is currently
        | using for pushnotification.
        |
        */
            'sender_id' => 'YOUR-SENDER-ID-HERE',
        /*
        |--------------------------------------------------------------------------
        | API Key
        |--------------------------------------------------------------------------
        |
        | This value determines the "api_key" your application is currently
        | using for pushnotification.
        |
        */
            'api_key' => 'YOUR-API-KEY-HERE',
    ],
    

    
];