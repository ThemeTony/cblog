<?php

use Illuminate\Routing\Router;\

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('/articles', ArticleController::class);
    $router->resource('/pages', PageController::class);
    $router->resource('/cates', CateController::class);
    $router->resource('/tags', TagController::class);
    $router->resource('/navs', NavController::class);
    $router->resource('/nav_cates', NavCateController::class);
});
