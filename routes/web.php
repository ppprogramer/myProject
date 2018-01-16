<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'IndexController@index');

    //微信
    Route::any('/wechat', 'WeChat\WeChatController@serve');
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {


});




