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
Route::group(['middleware' => 'web'], function ($router) {
    $router->get('/', 'IndexController@index');

    //微信
    $router->any('/wechat', 'WeChat\WeChatController@server')->name('wechat.server');
    //小程序
    $router->group(['namespace' => 'WeChatMini', 'prefix' => 'wechatMini'], function ($router) {
        $router->get('/auth/cookie', 'WeChatMiniAuthController@cookie')->name('wechatMini.auth.cookie');
        $router->post('/auth/login', 'WeChatMiniAuthController@login')->name('wechatMini.auth.login');
        $router->group(['middleware' => 'wx.mini.auth'], function ($router) {
            $router->post('/home/banner', 'WeChatMiniHomeController@banner')->name('wechatMini.home.banner');
            $router->post('/home/categories', 'WeChatMiniHomeController@categories')->name('wechatMini.home.categories');
        });
    });
    $router->get('/auth/callback', function (\Illuminate\Http\Request $request) {
        if ($request->get('code')) {
            return 'Login Success';
        } else {
            return 'Access Denied';
        }
    });
});







