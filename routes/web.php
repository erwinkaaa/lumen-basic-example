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

$router->get('/{text}', function ($text) use ($router) {
	return $text;
});

$router->group(['prefix' => 'api'], function () use ($router) {

	$router->group(['prefix' => 'v1'], function () use ($router) {

		$router->group(['prefix' => 'todos'], function () use ($router) {
			$router->get('/todo', 'TodoController@index');
			$router->get('/todo/{id}', 'TodoController@show');
			$router->post('/todo', 'TodoController@store');
			$router->put('/todo/{id}', 'TodoController@update');
			$router->delete('/todo/{id}', 'TodoController@destroy');
		});

	});

});

// $router->get('/key', function() {
// 	return \Illuminate\Support\Str::random(32);
// });