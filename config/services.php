<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal' => [
	      'client_id' => 'AdT9YwIPQMIBMfadkaqNqtQnP7yXRBfHA6WMVv2CH5vDTeZZ5qqBGn7Gid9Ajt9BCdM3Ueo9bQ49X6_m',
	      'secret' => 'EAzDB3CBojsXsfgVJcRUBu7_wn-y1-S0kWVtba7gMkRV3zZzRlXoEUufFWjqyYcTOTF5Rk9hk735a_ZZ'
       ],

];
