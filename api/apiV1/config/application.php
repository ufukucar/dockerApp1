<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Uygulama Servisleri
    |--------------------------------------------------------------------------

    */


    'application' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

];
