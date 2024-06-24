<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Define a GET route for the root URI '/'
$router->get('/', function () use ($router) {
    return $router->app->version(); // Return the application version
});

// Define a route group with 'client.credentials' middleware applied
$router->group(['middleware' => 'client.credentials'], function () use ($router) {

    // ======================== STEAM API ROUTES =================================

    $router->get('/steam/gameID/{id}', 'STEAMapiController@getAppDetailsbyID'); // Route to get app details by ID from STEAMapiController
    $router->get('/steam/{title}', 'STEAMapiController@searchByTitle'); // Route to search games by title from STEAMapiController
    $router->get('/steam/reviews/{id}', 'STEAMapiController@searchReviews'); // Route to fetch reviews for a game by ID from STEAMapiController

    // ======================== TWITCH API ROUTES =================================

    $router->get('/twitch/streamer/{channel}', 'TWITCHapiController@getStreamerInfo'); // Route to get streamer information by channel name from TWITCHapiController
    $router->get('/twitch/videos/{channel}', 'TWITCHapiController@getChannelVideos'); // Route to get channel videos by channel name from TWITCHapiController

    // ======================== OPENCRITIC API ROUTES ============================

    $router->get('/opencritic/game/{id}', 'OPENCRITICController@gameSearch'); // Route to search for a game by ID from OPENCRITICController
    $router->get('/opencritic/search/{value}', 'OPENCRITICController@generalSearch'); // Route to perform a general search on OpenCritic by value from OPENCRITICController
    $router->get('/opencritic/reviews/{id}', 'OPENCRITICController@gameReviews'); // Route to fetch reviews for a game by ID from OPENCRITICController  

    // ======================== USERS ROUTES ======================================

    $router->get('/users', 'UserController@index'); // Route to get all users records from UserController
    $router->get('/users/{id}', 'UserController@show'); // Route to get a specific user by ID from UserController
    $router->post('/users', 'UserController@add'); // Route to add a new user record via UserController
    $router->put('/users/{id}', 'UserController@update'); // Route to update a user record via UserController
    $router->patch('/users/{id}', 'UserController@update'); // Route to update a user record partially via UserController
    $router->delete('/users/{id}', 'UserController@delete'); // Route to delete a user record via UserController
});

