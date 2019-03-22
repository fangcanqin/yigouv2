<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Sku_details;
class ShopcartController extends Controller
{
    //显示购物车页面
    public function index()
    {
        //获取该用户的购物车 数据是模拟的记得回来改
        $cart = Cart::where('uid',26)->get();
        //获取购物车商品图  
        $pic_arr = self::getPic($cart);
        //dump($pic_arr);
        return view('home.shopcart',['cart'=>$cart,'pic_arr'=>$pic_arr]);
    }

    //获取购物车里的对应商品图
    public static function getPic($cart)
    {
        foreach($cart as $k => $v){
            $cart[$k]['pic'] = Sku_details::where('group',$v->group)->first()->pic;
        }
        return $cart;
    }

    //商品加入购物车
    public function addCart(Request $request)
    { 
       //接收添加购物车的商品信息
       $info = $request->input('data',' ');
       //实例化购物车模型类
       $cart = new Cart();
        //设置用户id 获取session 里的值
       $cart->uid = 26;
       //设置商品id
        $cart->gid = $info[0];
        if(Cart::where('gid',$info[0])->where('uid',26)->first()){
            return 2;
        }
       //设置添加时间
       $cart->addtime = time();
       //设置商品数量
       $cart->num = $info[1];
       //设置商品单价
       $cart->price = $info[2];
       //设置组合名
       $cart->group = $info[3];
       $cart->total = $info[4];
       $cart->gname = $info[5];
       //执行添加操作
       if($cart->save()){
          return 1;
       }else{
          return 0;
       }
      //return $info;
    }

    //动态改变对应用户的购物车表信息
    public function changeCart(Request $request)
    {
        //获取当前用户的id 该数据为模拟 
        $uid = 26;
        //查询对应变动的数据进行修改
        $info = Cart::where('uid',$uid)->where('group',$request->input('group_name',' '))->first();
        if($request->input('good_num',' ') <=  0){
            //修改商品数量 为1
           $info->num = 1;
           $info->total = $info->price;
        }else{
            //修改商品数量
            $info->num = $request->input('good_num',' ');
            $info->total = ($request->input('good_num',' '))*($info->price);
        }

     
        //统计合计
        //执行修改
        if($info->save()){
            //统计商品数量和
            $data['num'] = Cart::where('uid',$uid)->sum('num');
            $data['total'] = Cart::where('uid',$uid)->sum('total');
            return $data;
        }else{
            return 0;
        }
        //return $request->input('group',' ');
    }
}
