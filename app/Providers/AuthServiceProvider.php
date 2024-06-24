<?php

namespace App\Providers; // Define the namespace for the provider

use App\Models\User; // Import the User model
use Dusterio\LumenPassport\LumenPassport; // Import LumenPassport for OAuth2 authentication support
use Illuminate\Support\Facades\Gate; // Import Gate facade for authorization
use Illuminate\Support\ServiceProvider; // Import the base ServiceProvider class

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Empty method for registering services
    }

    public function boot()
    {
        // Define how users are authenticated for the application
        // LumenPassport routes registration for OAuth2 authentication
        LumenPassport::routes($this->app->router);
    }
}