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
class IndexController extends Controller
{
    /**
     * 加载前台首页页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {
        //获取轮播图数据
        $slid = self::showSlid();
        //获取轮播图
        $notice = self::showNotice('DESC',2);
        //获取活动产品数据
        $huodong = self::getCates(78);
        //获取分类商品数据
        $cates = self::getCates(0);
        //点心/蛋糕 产品 cid 32
        $cake = self::getInfo(32,8);
        //获取点心蛋糕的 二级分类
        $cake_two = self::getCates(32);
        //dump($cake_two);
        return view('home.index',['slid'=>$slid,'notice'=>$notice,'huodong'=>$huodong,'cates'=>$cates,'cake'=>$cake,'cake_two'=>$cake_two]);
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

}
