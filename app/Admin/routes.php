<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->any('upload/image', 'UploadImageController@image')->name('admin.upload.image');

    $router->resource('item', ItemController::class);
    $router->resource('bale', BaleController::class);
    $router->resource('rollPicture', RollPictureController::class);
    $router->resource('material/image', MaterialImageController::class);
    $router->resource('material/imageText', MaterialImageTextController::class);

});
