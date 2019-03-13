<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入分类模型类
use App\Models\Cates;
//导入DB类
use DB;
//导入添加分类验证类
use App\Http\Requests\CatesStoreBlogPost;
class CatesController extends Controller
{
    /**
     * 显示分类列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cates.index',['data'=>self::getCates()]);
    }

    /**
     * 显示添加分类界面
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //获取指定要添加的子分类pid
        $pid = $request->input('pid',' ');
        //初始化
        $name = '';
        //获取该商品名字
        if($pid != ' '){
            $name = Cates::find($pid)->name;
        }
        //加载添加分类界面以及分配数据
        return view('admin.cates.create',['data'=>self::getCates(),'pid'=>$pid,'name'=>$name]);
    }

    /**
     *  分类信息处理
     * @return [type] [description]
     */
    public static function getCates()
    {
        // 原生语句sql： select *,concat(path,',',id) as paths from cates order by paths asc;
        //按照排序获取所有分类信息
        $data = Cates::select('*',DB::raw('concat(path,",",id) as paths'))->orderBy('paths','asc')->get();
        //将分类信息进行处理
        foreach($data as $key => $value){
            //获取每条分类信息的path ,出现的次数
            $num = substr_count($value['path'],',');
            //根据次数拼接分类排版
            $data[$key]['name'] =  str_repeat('|----',$num).$value['name'];
        }
        return $data;
    }

    /**
     * 添加分类处理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatesStoreBlogPost $request)
    {
        //dd($request->all());
        $cates = new Cates();
        //设置分类名
        $cates->name = $request->input('name','');
        //设置pid
        $cates->pid = $request->input('pid','');
        //判断是否为顶级分类
        if($request->input('pid') == 0){
            //设置path
            $cates->path = 0;
        }else{
            //非顶级分类
            //获取父类信息
            $parent_info = Cates::find($request->input('pid'));
            $cates->path = $parent_info->path.','.$parent_info->id;
        }
        //执行添加操作
        $res = $cates->save();
        if($res){
            return redirect('/admin/cates')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
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
}
