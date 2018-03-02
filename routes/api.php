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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['namespace' => 'Api', 'middleware' => 'api'], function ($router) {
    $router->pattern('path', '.+');
    //所有跨域的试探请求路由
    $router->options('{path}', function () {})->name('api,options')->middleware('cors');
    //
    $router->post('/auth/login', 'ApiAuthController@login');
    $router->post('/auth/refreshToken', 'ApiAuthController@refreshToken');
    $router->get('/test', 'ApiUserController@test');

    $router->group(['middleware' => 'api.auth'], function ($router) {
        //用户
        $router->get('/user/info', 'ApiUserController@info')->name('api.user.info');
        $router->get('/order/list', 'ApiOrderController@indexList')->name('api.order.indexList');
    });
});
//
//Route::group(['namespace' => 'Api', 'middleware' => ['api', 'api.auth']], function ($router) {
//    $router->resource('user', 'ApiUserController', ['as' => 'api']);
//});
//
//
//Route::group(['middleware' => ['api', 'cors']], function ($router) {
//    $router->pattern('path', '.+');
//    $router->options('{path}', 'Vue\TestController@index');
//});
