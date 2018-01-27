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
    Route::any('/wechat', 'WeChat\WeChatController@server')->name('wechat.server');
    //小程序
    Route::group(['prefix' => 'wechatMini'], function () {
        Route::get('/auth/cookie', 'WeChatMini\WeChatMiniController@cookie')->name('wechatMini.auth.cookie');
        Route::post('/auth/login', 'WeChatMini\WeChatMiniController@login')->name('wechatMini.auth.login');

        Route::group(['middleware' => 'wx.mini.auth'], function () {
            Route::post('/auth/banner', 'WeChatMini\WeChatMiniController@banner')->name('wechatMini.auth.banner');
        });
    });

});




