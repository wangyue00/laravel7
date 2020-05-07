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
//后台路由部分
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台登录页面
    Route::get('public/login','PublicController@login');
    Route::post('public/check','PublicController@check')->name('admin.public.check');

});
