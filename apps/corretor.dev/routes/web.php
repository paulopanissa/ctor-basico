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
$app->group(['prefix' => 'config'], function() use ($app){
   $app->get('/profissao', 'ConfigProfissaoController@listAll');
});

$app->group(['prefix' => 'clientes'], function () use ($app) {
    $app->get('/', 'ClientController@index');
    $app->post('/', 'ClientController@store');
    $app->get('/{id}', 'ClientController@show');
    $app->put('/{id}', 'ClientController@update');
    $app->delete('/{id}', 'ClientController@destroy');
});
