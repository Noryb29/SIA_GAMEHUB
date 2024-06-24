<?php

namespace App\Http\Middleware; // Define the namespace for this middleware

use Closure; // Import the Closure class
use Illuminate\Contracts\Auth\Factory as Auth; // Import the Auth factory interface

class Authenticate
{
    protected $auth; // Declare a protected property to hold the Auth factory instance

    public function __construct(Auth $auth) // Constructor method to initialize the middleware
    {
        $this->auth = $auth; // Assign the injected Auth factory instance to the property
    }
    
    public function handle($request, Closure $next, $guard = null) // Method to handle an incoming request
    {
        if ($this->auth->guard($guard)->guest()) { // Check if the user is not authenticated for the specified guard
            return response('Unauthorized.', 401); // Return an unauthorized response with status code 401
        }

        return $next($request); // Pass the request to the next middleware or controller
    }
}
