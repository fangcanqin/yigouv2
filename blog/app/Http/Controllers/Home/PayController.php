<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Users;
use App\Models\Cart;
use App\Models\Sku_details;
use App\Models\District;
use DB;
class PayController extends Controller
{
    //结算界面
    public function index(Request $request)
    {
        //获取用户信息
        if($request->session()->has('username')){
            $username = session('username');
            //$uid = session('username_id')
            //获取用户头像
            $userInfo = Users::find(session('username_id'))->user_details;
            //获取用户名
            $zname =  Users::find(session('username_id'))->username;
            //获取用户id
            $uid = session('username_id');
        }else{
            $username = ' ';
            $userInfo = ' ';
            $zname = ' ';
            $uid = ' ';
        }
        //获取当前登录用户的所有收件人信息
        $user_address = Address::where('uid',$uid)->get();
        //获取该用户的购物车 
        $cart = Cart::where('uid',session('username_id'))->where('status',1)->get();
        //获取购物车商品图  
        $pic_arr = self::getPic($cart);
        //获取当前要收件人信息
        $mr_info = self::getAddInfo(session('username_id'));
        //dump($mr_info);

        return view('home.pay',['userInfo'=>$userInfo,'zname'=>$zname,'username'=>$username,'uid'=>$uid,'user_address'=>$user_address,'cart'=>$cart,'pic_arr'=>$pic_arr,'mr_info'=>$mr_info]);
    }

    //获取购物车里的对应商品图
    public static function getPic($cart)
    {
        foreach($cart as $k => $v){
            $cart[$k]['pic'] = Sku_details::where('group',$v->group)->first()->pic;
        }
        return $cart;
    }

    //添加地址
    public function insert(Request $request)
    {
        //dd($request->all());
        //将用户的收件人信息储存到数据库中
        //获取用户地址
        $arr = $request->except('_token','uid','name','tel','phone','adds');
        $str = '';
        foreach($arr as $k => $v){
            $str .= District::find($v)->name;
        }
        //开启事务
        DB::beginTransaction();
        //实例化用户收件人表
        $address =  new Address();
        //添加收件人姓名
        $address->name = $request->input('name',' ');
        //设置手机号
        $address->phone = $request->input('phone',' ');
        //设置用户id
        $address->uid = $request->input('uid',' ');
        //设置用户基本地址
        $address->adds = $str;
        //设置用户详情
        $address->xq = $request->input('adds',' ');
        $res =  $address->save();
        //判断是否添加成功
        if($res){
            //确认事务
            DB::commit();
            echo "<script>alert('添加成功');window.location.href='/home/pay/index'</script>";exit;
        }else{
            //事务回滚
            DB::rollBack();
            echo "<script>alert('添加失败');window.location.href='/home/pay/index'</script>";exit;
        }
    }

    //获取当前要收件人信息
    public static function getAddInfo($uid)
    {
        //获取该用户的收件人为默认的信息
        return Address::where('uid',$uid)->where('province',1)->first();
    }
}
