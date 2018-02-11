<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api', 'middleware' => 'api'], function ($router) {
    $router->post('/user/login', 'ApiAuthController@login');
});

Route::group(['namespace' => 'Api', 'middleware' => ['api', 'api.auth']], function ($router) {
    $router->resource('user', 'ApiUserController', ['as' => 'api']);
});

//所有跨域的试探请求路由
Route::group(['middleware' => ['api', 'cors']], function ($router) {
    $router->pattern('path', '.+');
    $router->options('{path}', 'Vue\TestController@index');
});
