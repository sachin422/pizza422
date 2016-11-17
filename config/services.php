<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

   

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '00000000',
        'client_secret' => '000000000000000000',
        'redirect' => 'http://xxxxxx/auth/callback/facebook',
    ],
    'google' => [
        'client_id' => 'sfsdfsdfsfsdf.apps.googleusercontent.com',
        'client_secret' => 'sfsdfsfsaferwer',
        'redirect' => 'http://xxxxxxx/auth/callback/google',
    ],

];
