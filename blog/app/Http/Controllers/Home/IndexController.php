<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入分类模型类 
use App\Models\Cates;
use App\Models\admin_users;
//导入轮播图模型类
use App\Models\Slid;
//导入DB类
use DB;
//导入商品模型类
use App\Models\Goods;
//导入库存表模型类
use App\Models\Sku_details;
//用户表
use App\Models\Users;
use App\Models\Cart;
class IndexController extends Controller
{
    /**
     * 加载前台首页页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)  
    {
        //获取用户信息
        if ($request->session()->has('username')) {
            $username = session('username');
            //获取用户头像
            $userInfo = Users::find(session('username_id'))->user_details;
            //获取用户名
            $name = Users::find(session('username_id'))->username;
        }else{
            $username = ' ';
            $userInfo = ' ';
            $name = ' ';
        }
        //获取购物车数量
        $good_num = self::cartNum(session('username_id'));
        //dump($good_num);
        //获取轮播图数据
        $slid = self::showSlid();
        //获取轮播图
        $notice = self::showNotice('DESC',2);
        //获取活动产品数据
        $huodong = self::getCates(78);
        //获取分类商品数据
        $cates = self::getCates(0);
        // 点心/蛋糕 产品 cid 32
        $cake = self::getInfo(32,8);
         // 获取点心蛋糕的 二级分类
        $cake_two = self::getCates(32);
        // 饼干/膨化 产品cid  33
        $cake2 = self::getInfo(33,8);
        $cake_two2 = self::getCates(33);
        // 熟食/肉类
        $cake3 = self::getInfo(34,8);
        $cake_two3 = self::getCates(34);
        // 糖果/蜜饯
        $cake4 = self::getInfo(35,8);
        $cake_two4 = self::getCates(35);
        // 素食/卤味
        $cake5 = self::getInfo(36,8);
        $cake_two5 = self::getCates(36);
        // 巧克力
        $cake6 = self::getInfo(37,8);
        $cake_two6 = self::getCates(37);
        //坚果/炒货
        $cake7 = self::getInfo(38,8);
        $cake_two7 = self::getCates(38);
        // 品牌/礼包
        $cake8 = self::getInfo(39,8);
        $cake_two8 = self::getCates(39);
        // 海味/河鲜
        $cake9 = self::getInfo(40,8);
        $cake_two9 = self::getCates(40);
        //花茶/果茶
        $cake10 = self::getInfo(41,8);
        $cake_two10 = self::getCates(41);
        return view('home.index',['slid'=>$slid,'notice'=>$notice,'huodong'=>$huodong,'cates'=>$cates,'cake'=>$cake,'cake_two'=>$cake_two,'username'=>$username,'userInfo'=>$userInfo,'name'=>$name,'good_num'=>$good_num,'cake2'=>$cake2,'cake_two2'=>$cake_two2,'cake3'=>$cake3,'cake_two3'=>$cake_two3,'cake4'=>$cake4,'cake_two4'=>$cake_two4,'cake5'=>$cake5,'cake_two5'=>$cake_two5,'cake6'=>$cake6,'cake_two6'=>$cake_two6,'cake7'=>$cake7,'cake_two7'=>$cake_two7,'cake8'=>$cake8,'cake_two8'=>$cake_two8,'cake9'=>$cake9,'cake_two9'=>$cake_two9,'cake10'=>$cake10,'cake_two10'=>$cake_two10]);
    }

    public static function getInfo($cid,$num = 8)
    {
        //获取对应类下的商品
        $info = Goods::where('cid',$cid)->where('status',1)->orderBy('id','DESC')->limit($num)->get();
        //获取商品库存信息
        foreach($info as $k => $v){
            $info[$k]['detail'] =  Sku_details::where('gid',$v->id)->first();
        }
        return $info;
    }
    /**
     * 返回所有轮播图信息
     * 
     * @return [type] [description]
     */
    public static function showSlid()
    {
        $slid  = DB::select('SELECT * from slid where status = 1 ORDER BY token ASC');
        return $slid;
    }

    public static function showNotice($sort = 'ASC',$num = 2)
    {
        $notice = DB::select('SELECT * from notice where status = 1 ORDER BY id '.$sort.' LIMIT '.$num);
        return $notice;
    }
    /**
     * [获取递归获取分类数据]
     * @param  integer $pid [description]
     * @return [type]       [全部分类数据]
     */
    public static function getCates($pid = 0)
    {   
        $cates = [];
        $cates_data = Cates::where('pid',$pid)->get();
        foreach($cates_data as $k1 => $v1){
            $catas_a = self::getCates($v1->id);
            $v1['show'] = $catas_a;
            $cates[] = $v1;
        }
        return $cates;
    }

    //获取当前购物车数量
    public static function cartNum($uid)
    {
        return Cart::where('uid',$uid)->count();
    }
}
