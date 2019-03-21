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
//后台登录界面路由配置
Route::get('admin/login/index','Admin\LoginController@index');
//注销后台路由配置
Route::get('admin/outlog','Admin\LoginController@outlog');
Route::post('admin/login/loginCheck','Admin\LoginController@loginCheck');

Route::middleware(['checklogin'])->group(function(){
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
    //轮播图路配置开始
    Route::post('/admin/slid/change','Admin\SlidController@change');
    Route::get('/admin/slid/test','Admin\SlidController@test');
    Route::post('/admin/slid/batchDelete','Admin\SlidController@batchDelete');
    Route::resource('/admin/slid','Admin\SlidController');
    //轮播图路配置结束
    //
    //广告管理  
    Route::resource('/admin/ad','Admin\adController');
    //商品模块路由配置开始
    Route::get('/admin/goods/version/{id}/{gid}','Admin\GoodsController@version');
    Route::post('/admin/goods/setversion','Admin\GoodsController@setVersion');
    Route::post('/admin/goods/setattr','Admin\GoodsController@setAttr');
    Route::get('/admin/goods/setversiontype','Admin\GoodsController@setVersionType');
    Route::get('/admin/goods/showSku','Admin\GoodsController@showSku');
    Route::post('/admin/goods/setgroup','Admin\GoodsController@setGroup');
    Route::post('/admin/goods/setdata','Admin\GoodsController@setData');
    Route::resource('/admin/goods','Admin\GoodsController');
    //商品模块路由配置结束   
    //公告模块路由配置开始
    Route::resource('/admin/notice','Admin\NoticeController');
    //公告模块路由配置结束
    //友情链接
    Route::resource('/admin/flink','Admin\FlinkController');

    //订单管理
    Route::get('/admin/orders/{id}/datas','Admin\OrdersController@datas');
    Route::resource('/admin/orders','Admin\OrdersController');

});
//前台用户注册路由开始

//注册界面
Route::get('/home/register/index','Home\RegisterController@index');
//邮箱注册
Route::post('/home/register/insert','Home\RegisterController@insert');
//手机号注册
Route::post('/home/register/store','Home\RegisterController@store');
//发送验证码
Route::get('/home/register/sendMobileCode','Home\RegisterController@sendMobileCode');
//用户激活
Route::get('/home/register/change/{id}/{token}','Home\RegisterController@change');

//用户登录界面
Route::get('/home/login/index','Home\LoginController@index');
Route::post('home/login/loginCheck','Home\LoginController@loginCheck');

//前台用户注册路由结束
//前台无限递归分类路由开始
Route::get('/home','Home\IndexController@index');
//前台无限递归分类路由结束
