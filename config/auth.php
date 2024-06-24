<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'api'), // Default guard for authentication
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Define every authentication guard for your application.
    |
    */

    'guards' => [
        'api' => ['driver' => 'passport'], // API guard using Passport driver
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Define how users are retrieved from your database or other storage
    | mechanisms used by the application to persist user's data.
    |
    */

    'providers' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Set options for resetting passwords including the view for password reset
    | e-mails and the name of the table that maintains all reset tokens.
    |
    | Specify multiple password reset configurations for different user tables
    | or models in the application.
    |
    */

    'passwords' => [
        //
    ],

];
