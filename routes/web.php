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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/expences', 'as' => 'expences'], function() use ($router) {
    $router->get('/', ['as' => 'list', 'uses' => 'ExpenceController@list']);
    $router->post('/', ['as' => 'create', 'uses' => 'ExpenceController@create']);
    $router->get('/{id}', ['as' => 'get', 'uses' => 'ExpenceController@get']);
    $router->delete('/{id}', ['as' => 'delete', 'uses' => 'ExpenceController@delete']);
});

$router->post('/register', ['as' => 'register', 'uses' => 'UsersController@create']);

$router->group(['prefix' => '/users', 'as' => 'users'], function() use ($router) {
    $router->get('/{id}', ['as' => 'update', 'uses' => 'UsersController@update']);
    $router->delete('/{id}', ['as' => 'me', 'uses' => 'UsersController@me']);
});
