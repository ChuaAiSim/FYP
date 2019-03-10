<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID',''),
    'secret' => env('PAYPAL_SECRET',''),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/Paypal.log',
        'log.LogLevel' => 'INFO',
        'cache.enabled' => true,
        'cache.FileName' => '/var/mypath/logs/auth.cache'
    ),
];