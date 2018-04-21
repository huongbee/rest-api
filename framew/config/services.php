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
        'client_id' => '293019917798091',
        'client_secret' => '22a76ff6db6759475b7bf57196119c22',
        'redirect' => 'http://localhost/canceraid/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '696025184931-3p6o68amk687hamor8huqnjg3446ra25.apps.googleusercontent.com',
        'client_secret' => 'DPMHD286rDosRt107UfWKk6B',
        'redirect' => 'http://localhost/canceraid/login/google/callback',
    ],

];
