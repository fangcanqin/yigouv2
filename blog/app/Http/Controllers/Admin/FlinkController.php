<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入友情链接模型表
use App\Models\flink;
//导入DB类
use DB;
//导入友情链接添加验证类
use App\Http\Requests\FlinkStoreBlogPost;
class FlinkController extends Controller
{
    /**
     * 显示友情链接列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //默认显示每页显示5条数据
        $count = $request->input('count',5);
        $search = $request->input('search','');
          
        //分页开始，每页5条数据
        $flink = flink::where('url','like','%'.$search.'%')->paginate($count);

        return view('admin.flink.index',['flink'=>$flink]);
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
     * 修改友情链接资料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flink = flink::find($id);
        
        return view('admin.flink.edit',['flink'=>$flink]);
    }

    /**
     * 处理修改友情链接资料
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlinkStoreBlogPost $request, $id)
    {
        //连接数据库
        $flink = flink::find($id);
        //修改链接地址
        $flink->url = $request->input('url');
        //修改链接状态
        $flink->status = $request->input('status');
        //修改开始时间
        $flink->ctime = $request->input('ctime');
        //修改结束时间
        $flink->stime = $request->input('stime');
        //修改申请人
        $flink->uid = $request->input('uid');
        //修改链接内容
        $flink->content = $request->input('content');
        
        //判断是否上传图片
        if($request->hasFile('img')){
        //获取图片
        $res = $request->file('img');
        //获取文件后缀名
        $suffix = $res->extension();
        //指定图片后缀名
        $arr = ['jpg','png','gif','jpeg'];
        //判断是否符合上传规格
        if(!in_array($suffix,$arr)){
            return back()->with('error','请上传正确的图片格式');
        }

        //拼接一个完整的名字
        $name = time().'.'.$suffix;
        //将图片防治对应的文件内
        $pic = $res->storeAs('flink',$name);
        //拼接图片路径
        $flink->img = '/uploads/'.$pic;
        
        $res = $flink->save();
        //判断是否添加成功
            if($res){
                DB::commit();
                return redirect('/admin/flink')->with('success','修改成功');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
        }
    }else{
            $res = $flink->save();
            
            DB::commit();
            return redirect('/admin/flink')->with('success','修改成功');
        }
        
            

    }

    /**
     * 删除友情链接操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flink = flink::destroy($id);

        //判断是否删除成功
        if($flink){   
                DB::commit();
                return redirect('/admin/flink')->with('success','删除成功');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
            }
    }
}
