<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//������Ʒ��
use App\Models\Goods;
use App\Models\Sku_details;
class IntroductionController extends Controller
{
    //��ȡ��Ʒ������Ϣ
    public function index($id)
    {   
        //��ȡ����Ʒ��Ϣ
        $good = Goods::find($id);
        //��Ʒ�����Ϣ
        $good_group = $good->goods_group;
        dump($good_group);
        return view('home.introduction',['good'=>$good,'good_group'=>$good_group]);
    }

    //��̬��ȡ��Ʒ����
    public function getPrice(Request $request)
    {
        //��ȡ��Ʒ����Ϣ
        $group = $request->input('data');
        //ͨ������Ϣ���Ҷ�Ӧ��Ϣ
        
        return sku_details::where('group',$group)->first();
    }
}
