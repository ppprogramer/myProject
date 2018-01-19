<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    //ckeditor 编辑器接口
    $router->any('upload/image', 'UploadImageController@image')->name('admin.upload.image');

    //WeChat
    $router->any('weChat/material/image/upload', 'MaterialImageController@upload')->name('admin.weChat.material.image.upload');

    /*-------------------------------------------resources route------------------------------------------------*/
    $router->resource('item', ItemController::class);
    $router->resource('bale', BaleController::class);
    $router->resource('rollPicture', RollPictureController::class);

    //WeChat
    $router->resource('weChat/material/image', MaterialImageController::class);
    $router->resource('weChat/material/imageText', MaterialImageTextController::class);

});
