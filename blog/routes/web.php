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
//配置后台首页
Route::get('/admin', 'Admin\IndexController@index');
Route::post('/photo/up','Admin\UsersController@uploadfile');

//用户模块路由配置开始

//配置用户地址管理
Route::get('/admin/users/district','Admin\UsersController@district');
//配置用户管理
Route::resource('/admin/users','Admin\UsersController');

//用户模块路由配置结束


//配置管理员
Route::resource('/admin/admin_users','Admin\admin_usersController');

//分类模块路由配置开始

Route::resource('/admin/cates','Admin\CatesController');

//分类模块路由配置结束





























//广告管理  
Route::resource('/admin/ad','Admin\adController');