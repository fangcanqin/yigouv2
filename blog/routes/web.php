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
    Route::get('/admin/slid/changeStatus','Admin\SlidController@changeStatus');
    Route::post('/admin/slid/batchDelete','Admin\SlidController@batchDelete');
    Route::resource('/admin/slid','Admin\SlidController');
    //轮播图路配置结束

    //广告管理  
    Route::resource('/admin/ad','Admin\adController');
    //商品模块路由配置开始
    Route::get('/admin/goods/version/{id}/{gid}','Admin\GoodsController@version');
    Route::post('/admin/goods/setversion','Admin\GoodsController@setVersion');
    Route::post('/admin/goods/setattr','Admin\GoodsController@setAttr');
    Route::get('/admin/goods/setversiontype','Admin\GoodsController@setVersionType');
    Route::get('/admin/goods/showSku','Admin\GoodsController@showSku');
    Route::get('/admin/goods/goodsdel/{id}','Admin\GoodsController@goodsDel');
    Route::get('/admin/goods/goodsedit/{id}','Admin\GoodsController@goodsEdit');
    Route::get('/admin/goods/groupdel/{id}','Admin\GoodsController@groupDel');
    Route::post('/admin/goods/goodsupdate','Admin\GoodsController@goodsUpdate');
    Route::post('/admin/goods/setgroup','Admin\GoodsController@setGroup');
    Route::post('/admin/goods/setdata','Admin\GoodsController@setData');
    Route::post('/admin/goods/changepic','Admin\GoodsController@changePic');
    Route::post('/admin/goods/groupdata','Admin\GoodsController@groupData');
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
//注销
Route::get('/home/outlogin','Home\LoginController@outLogin');
//登录验证
Route::post('home/login/loginCheck','Home\LoginController@loginCheck');

//前台用户注册路由结束
//前台无限递归分类路由开始
Route::get('/home','Home\IndexController@index');
//前台无限递归分类路由结束
//商品详情页
Route::get('/home/introduction/index/{id}','Home\IntroductionController@index');
//获取商品单价
Route::get('/home/introduction/getprice','Home\IntroductionController@getPrice');
//加入购物车
Route::post('/home/shopcart/addcart','Home\ShopcartController@addCart');
//显示购物页面
Route::get('/home/shopcart/index','Home\ShopcartController@index');
//动态改变用户购物车信息
Route::post('/home/shopcart/changecart','Home\ShopcartController@changeCart');
//重新修改商品
Route::post('/home/shopcart/editgroup','Home\ShopcartController@editGroup');
//点击修改商品
Route::post('/home/shopcart/clickgroup','Home\ShopcartController@clickGroup');
//执行修改商品
Route::post('/home/shopcart/newgroup','Home\ShopcartController@newGroup');
//单个删除商品
Route::get('/home/shopcart/delete','Home\ShopcartController@delete');
//批量删除商品
Route::post('/home/shopcart/deleteall','Home\ShopcartController@deleteAll');
//选中购买的商品
Route::get('/home/shopcart/selectgood','Home\ShopcartController@selectGood');
Route::get('/home/shopcart/getgoodtotal','Home\ShopcartController@getGoodTotal');
//获取当前的商品件数和合计 getGoodTotal
Route::get('/home/shopcart/goodtotal','Home\ShopcartController@goodTotal');
//结算页面
Route::get('/home/pay/index','Home\PayController@index');
//结算页面的添加地址
Route::post('/home/pay/insert','Home\PayController@insert');
//个人中心
Route::get('/home/personal/index','Home\PersonalController@index');
//个人资料
Route::get('/home/information/index','Home\InformationController@index');
//修改个人信息
Route::post('/home/information/editinfo','Home\InformationController@editInfo');
//修改头像
Route::post('/home/information/changeface','Home\InformationController@changeFace');
//地址管理
Route::get('/home/address/index','Home\AddressController@index');
//获取地址
Route::get('/home/address/district','Home\AddressController@district');
//设置默认地址
Route::get('/home/address/changestatus','Home\AddressController@changeStatus');
//添加地址
Route::post('/home/address/insert','Home\AddressController@insert');
//修改地址界面
Route::get('/home/address/edit/{id}','Home\AddressController@edit');
//执行修改
Route::post('/home/address/update','Home\AddressController@update');
//删除收件人
Route::get('/home/address/del','Home\AddressController@del');