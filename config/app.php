<?php

return [

   

    'providers' => [

       

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,
        J42\LaravelTwilio\LaravelTwilioServiceProvider::class,
        Laravel\Socialite\SocialiteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

      
        'Twilio'    =>  J42\LaravelTwilio\LaravelTwilioFacade::class,
        'Socialize' => Laravel\Socialite\Facades\Socialite::class,
    ],

];
