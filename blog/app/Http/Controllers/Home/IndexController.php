<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入分类模型类 
use App\Models\Cates;
use App\Models\admin_users;
class IndexController extends Controller
{
    /**
     * 加载前台首页页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {

        return view('home.index');
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function getfff(){
         $mes = admin_users::where('name',session('userinfo'))->first();
        //dump(session('userinfo'));
        return $mes;
    }
}
