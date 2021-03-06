<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/ping', function () {
    return response()->json(['ack' => time()]);
});

$router->get('user', 'UserController@index');
$router->get('user/{id}', 'UserController@show');
$router->post('user', 'UserController@store');

/**
 * Rotas para Eventos
 */
$router->get('event', 'EventController@index');
$router->post('event', 'EventController@store');
