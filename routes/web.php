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
Route::get('','IndexController@get')->name('index')->middleware('pjax');
Route::get('article/{id}','ArticleController@get')->name('article')->middleware('pjax');
Route::get('page/{id}','PageController@get')->name('page')->middleware('pjax');
Route::get('cate/{id}','CateController@get')->name('cate')->middleware('pjax');
Route::get('tag/{id}','TagController@get')->name('tag')->middleware('pjax');
Route::group(['prefix' => 'backend'], function () {
    Route::any('upload_image','Backend\UploadController@uploadImage');
});
//Route::get('php_info',function(){
//   return phpinfo();
//});
