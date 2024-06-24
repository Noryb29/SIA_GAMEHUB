<?php

require_once __DIR__.'/../vendor/autoload.php'; // Load Composer's autoloader

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__) // Bootstrap Lumen application with environment variables
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC')); // Set default timezone from environment

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Initialize the Lumen application instance which serves as the IoC container
| and router for the framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__) // Create new Lumen application instance with base directory
);

$app->withFacades(); // Enable facades for the application
$app->withEloquent(); // Enable Eloquent ORM for database interactions

$app->configure('services'); // Configure services from configuration file
$app->configure('auth'); // Configure authentication settings

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Bind exception handler and console kernel to the service container.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class // Bind custom exception handler
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class // Bind custom console kernel
);

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
|
| Load application configuration files.
|
*/

$app->configure('app'); // Load application configuration file

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Register middleware to be used by the application.
|
*/

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class, // Register authentication middleware
    'client.credentials' => Laravel\Passport\Http\Middleware\CheckClientCredentials::class, // Register client credentials middleware
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Register service providers to bind services into the container.
|
*/

$app->register(App\Providers\AuthServiceProvider::class); // Register authentication service provider
$app->register(Laravel\Passport\PassportServiceProvider::class); // Register Passport service provider
$app->register(Dusterio\LumenPassport\PassportServiceProvider::class); // Register Lumen Passport service provider

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Include routes file to define all URLs and controllers.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers', // Set namespace for controllers
], function ($router) {
    require __DIR__.'/../routes/web.php'; // Include web routes
});

return $app; // Return configured Lumen application instance