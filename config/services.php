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
	      'client_id' => 'AS1z9CWySUO4HjcLrfOK-J1Q8yZNAlP9djQlVahnL8mduSMY1lTrLNuplPa1JV2oEWYAxfbmebm_U7qw',
	      'secret' => 'EKyTeTddYgVOAIJFTWyo6k60CXGb1b8sFfP8_6zO58chIk_An4acPb5nmqKlQFKdkhDfesHzHNdOVjgW'
       ],

];
