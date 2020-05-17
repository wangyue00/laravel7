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
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function () {

    //后台登录页面
    Route::get('public/login', 'PublicController@login')->name('admin.public.login');
    //后台登录处理
    Route::post('public/check', 'PublicController@check')->name('admin.public.check');
    //后台退出
    Route::get('public/logout', 'PublicController@logout')->name('admin.public.logout');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function () {
    //后台首页
    Route::get('index/index', 'IndexController@index')->name('admin.index.index');
    //后台框架页面
    Route::get('index/welcome', 'IndexController@welcome')->name('admin.index.welcome');



    //管理员的管理首页
    Route::get('manager/index','ManagerController@index')->name('admin.manager.index');
    //后台权限页面
    Route::get('auth/index', 'AuthController@index')->name('admin.auth.index');
    //后台添加权限页面
    Route::any('auth/add', 'AuthController@add')->name('admin.auth.add');


});
