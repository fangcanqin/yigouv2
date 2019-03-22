<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入商品类
use App\Models\Goods;
//导入库存表
use App\Models\Sku_details;
//商品详情参数表
use App\Models\Goods_details;
use App\Http\Controllers\Home\IndexController;
class IntroductionController extends Controller
{
    //加载商品详情页面
    public function index($id)
    {   
        //查找对应商品信息
        $good = Goods::find($id);
        //获取商品的组合信息
        $good_group = $good->goods_group;
        //获取商品参数信息
        $good_details = Goods_details::where('gid',$id)->first();
        //设置看了又看模块 该模块显示的商品为同类型产品
        //获取改类id
        $cid = $good->cid;
        $look = IndexController::getInfo($cid,7);
        //dump($look);
        return view('home.introduction',['good'=>$good,'good_group'=>$good_group,'good_details'=>$good_details,'look'=>$look,'id'=>$id]);
    }

    //获取商品价格
    public function getPrice(Request $request)
    {
        //根据商品组名
        $group = $request->input('data');
        //查询并返回数据
        return sku_details::where('group',$group)->first();
    }
}
