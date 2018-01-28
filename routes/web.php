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
    Route::group(['namespace' => 'WeChatMini', 'prefix' => 'wechatMini'], function () {
        Route::get('/auth/cookie', 'WeChatMiniAuthController@cookie')->name('wechatMini.auth.cookie');
        Route::post('/auth/login', 'WeChatMiniAuthController@login')->name('wechatMini.auth.login');
        Route::group(['middleware' => 'wx.mini.auth'], function () {
            Route::post('/home/banner', 'WeChatMiniHomeController@banner')->name('wechatMini.home.banner');
            Route::post('/home/categories', 'WeChatMiniHomeController@categories')->name('wechatMini.home.categories');
        });
    });

});




