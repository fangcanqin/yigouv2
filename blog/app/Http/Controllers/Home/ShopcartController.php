<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Sku_details;
use App\Models\Users;
use App\Models\Goods;
class ShopcartController extends Controller
{
    //显示购物车页面
    public function index(Request $request)
    {
        //获取用户信息
        if ($request->session()->has('username')) {
            $username = session('username');
            //获取用户头像
            $userInfo = Users::find(session('username_id'))->user_details;
        }else{
            $username = ' ';
            $userInfo = ' ';
        }
        //获取该用户的购物车 
        $cart = Cart::where('uid',session('username_id'))->get();
        //获取购物车商品图  
        $pic_arr = self::getPic($cart);
        //获取当前的商品件数和商品合计
        $good_total = self::getGoodTotal();
        //dump($good_total);
        return view('home.shopcart',['cart'=>$cart,'pic_arr'=>$pic_arr,'username'=>$username,'userInfo'=>$userInfo,'good_total'=>$good_total]);
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
       $cart->uid = session('username_id');
       //设置商品id
        $cart->gid = $info[0];
        if(Cart::where('gid',$info[0])->where('uid',session('username_id'))->first()){
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
        $uid = session('username_id');
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

    //重新修改组合名
    public function editGroup(Request $request)
    {
      //获取当前的组名根据组名查询商品
      $gid = Sku_details::where('group',$request->input('group',' '))->first()->gid;
      //获取当前该购买的商品的数量
      $cart = Cart::where('group',$request->input('group',' '))->first();
      $num = $cart->num;
      //通过商品id 查询商品的所有
      $sku_details = Sku_details::where('gid',$gid)->get();
      foreach($sku_details as $k => $v){
        if($v->group == $request->input('group',' ')){
          $sku_details[$k]['number'] = $num;
        }         
      }
      return $sku_details;
    }

    //点击获取当前的商品详情信息
     public function clickGroup(Request $request)
     {
        //获取当前的商品详情信息
        $sku = Sku_details::where('group',$request->input('group',' '))->first();
        return $sku;
     }

    //执行修改
    public function newGroup(Request $request)
    {
      //获取当前的组名根据组名查询商品
      $gid = Sku_details::where('group',$request->input('new_kowei',' '))->first()->gid;
      //通过当前商品id去查找当前用户购物车中已经查找的同款商品
      $jiu = Cart::where('uid',session('username_id'))->where('gid',$gid)->first();
      //将商品的信息进行替换
      $jiu->num = $request->input('new_num',' ');
      $jiu->price = $request->input('new_qian',' ');
      $jiu->group = $request->input('new_kowei',' ');
      $jiu->total = ($request->input('new_num',' '))*($request->input('new_qian',' '));
      $jiu->tmp_pic = $request->input('new_pic',' ');
      if($jiu->save()){
        echo "<script>alert('修改成功');window.location.href='/home/shopcart/index'</script>";exit;
      }else{
         echo "<script>alert('修改失败');window.location.href='/home/shopcart/index'</script>";exit;
      }
    }

    //删除商品
    public function delete(Request $request)
    {
      //获取当前要删除的id 进行删除
      if(Cart::destroy($request->id)){
        return 1;
      }else{
        return 0;
      }
    }

    //批量删除商品
    public function deleteAll(Request $request)
    {
      //获取当前要删除的id 进行删除
      if(Cart::destroy($request->arr_del)){
        return 1;
      }else{
        return 0;
      }
    }

    //选中购买的商品
    public function selectGood(Request $request)
    {
      //将当前当前商品作为选中状态
      $current_good = Cart::find($request->input('id',' '));
      //设置选中值
      $current_good->status = $request->input('zt',' ');
      if($current_good->save()){
        //修改成功返回当前商品中所有打勾的商品的价格和总和
        $num = Cart::where('uid',session('username_id'))->where('status',1)->sum('num');
        $total = Cart::where('uid',session('username_id'))->where('status',1)->sum('total');
        $data[] = $num;
        $data[] = $total;
        return $data;
      }
      return 0;
    }

    //获取当前选中的商品的件数和合计
    public static function getGoodTotal()
    {     
      $num = Cart::where('uid',session('username_id'))->where('status',1)->sum('num');
      $total = Cart::where('uid',session('username_id'))->where('status',1)->sum('total');
      $data[] = $num;
      $data[] = $total;
      return $data;
    }

    //发通过请求获取商品的件数和合计
    public static function goodTotal(Request $request)
    {     
      $test = Cart::where('uid',session('username_id'))->update(['status'=>$request->input('zt1',' ')]);
      $num = Cart::where('uid',session('username_id'))->where('status',1)->sum('num');
      $total = Cart::where('uid',session('username_id'))->where('status',1)->sum('total');
      $data[] = $num;
      $data[] = $total;
      return $data;
    }
}
