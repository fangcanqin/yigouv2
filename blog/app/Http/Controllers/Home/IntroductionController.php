<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入商品表
use App\Models\Goods;
use App\Models\Sku_details;
class IntroductionController extends Controller
{
    //获取商品详情信息
    public function index($id)
    {   
        //获取该商品信息
        $good = Goods::find($id);
        //商品组合信息
        $good_group = $good->goods_group;
        dump($good_group);
        return view('home.introduction',['good'=>$good,'good_group'=>$good_group]);
    }

    //动态获取商品单价
    public function getPrice(Request $request)
    {
        //获取商品组信息
        $group = $request->input('data');
        //通过该信息查找对应信息
        
        return sku_details::where('group',$group)->first();
    }
}
