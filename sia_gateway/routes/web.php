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

$router->group(['prefix' => 'v1'], function($router) {
    $router->get('/users', 'site1Controller@showUsers');

    $router->get('/user/{id}', 'site1Controller@showUser');

    $router->delete('/user/{id}', 'site1Controller@deleteUser');

    $router->post('/user', 'site1Controller@createUser');

    $router->patch('/user/{id}', 'site1Controller@patchUser');

});


$router->group(['prefix' => 'v2'], function($router) {
    $router->get('/users', 'site2Controller@showUsers');

    $router->get('/user/{id}', 'site2Controller@showUser');

    $router->delete('/user/{id}', 'site2Controller@deleteUser');

    $router->post('/user', 'site2Controller@createUser');

    $router->patch('/user/{id}', 'site2Controller@patchUser');

});