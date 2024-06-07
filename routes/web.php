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

$router->get('/', function () use ($router)
{
    return $router->app->version();
});

// ======================== STEAM API ROUTES =================================


$router->get('/steam/gameID/{id}', 'STEAMapiController@getAppDetailsbyID'); // get appDetails by ID
$router->get('/steam/{title}', 'STEAMapiController@searchByTitle');
$router->get('/steam/reviews/{id}', 'STEAMapiController@searchReviews');

$router->get('/twitch/streamer/{channel}', 'TWITCHapiController@getStreamerInfo');
$router->get('/twitch/videos/{channel}', 'TWITCHapiController@getChannelVideos');

// $router->get('/opencritic/game/most_popular','OPENCRITICController@popularGames');
$router->get('/opencritic/game/{id}','OPENCRITICController@gameSearch');
$router->get('/opencritic/author/{author}','OPENCRITICController@findAuthor');
$router->get('/opencritic/game/hall_of_fame/year/{year}','OPENCRITICController@gameHallofFameYear');
$router->get('/opencritic/search/{value}','OPENCRITICController@generalSearch');
$router->get('/opencritic/reviews/{id}','OPENCRITICController@gameReviews');










