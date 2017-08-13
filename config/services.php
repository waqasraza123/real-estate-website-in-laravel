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

    'facebook' => [
        'client_id' => '160520161175997',
        'client_secret' => 'f49f8e92f3867eaac869b7cf0d0526e3',
        'redirect' => 'http://www.2ndchanceleasing.com/callback',
    ],

    'google' => [
        'client_id'     => '976622990411-6puqvbt2aip6rsbcni725vpbvoqhk74n.apps.googleusercontent.com',
        'client_secret' => 'LbhJ46npMSfxEotou_JyLEID',
        'redirect'      => 'http://www.2ndchanceleasing.com/social/handle/google'
    ]


];
