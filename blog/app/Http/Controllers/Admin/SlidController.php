<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入轮播图模型类
use App\Models\Slid;
class SlidController extends Controller
{
    /**
     * 显示轮播图列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取轮播图所有数据
        $slid = Slid::all();
        //dump($slid);
        return view('admin.slid.index',['slid'=>$slid]);
    }

    /**
     * 判断网址是否能正常访问
     *
     * @param  [string]      [url]
     * @return [int]       [错误码]
     */
    public static function httpcode($url){
          $ch = curl_init();
          $timeout = 10;
          curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
          curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
          curl_setopt($ch, CURLOPT_HEADER, 1);
          curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
          curl_setopt($ch,CURLOPT_URL,$url);
          curl_exec($ch);
          return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
          curl_close($ch);
    }



    /**
     * 显示轮播图添加界面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.slid.create');
    }

    /**
     * 处理轮播图添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //实例化轮播图模型类
        $slid = new Slid();
        //判断是否上传文件
        if($request->hasFile('simg')){
            //获取上传的轮播图并上传
            $res = $request->file('simg');
            //获取上传文件的后缀
            $suffix = $res->extension();
            //判断是否符合图片文件格式
            if(!getTypeImg($suffix)){
                return back()->with('error','请上传符合图片格式的文件');
            }
            //上传文件
            $path = $res->store('slid');
            //检查网址是否能正常访问
            if(self::httpcode($request->input('surl')) != 200){
                return back()->with('error','温馨提示:URL不能正常访问');
            }
            $slid->surl = $request->input('surl',' ');
            $slid->simg = '/uploads/'.$path;
            //设置轮播图状态
            $slid->status = $request->input('status',' ');
            //执行添加操作
            $res = $slid->save();
            if($res){
                return redirect('admin/slid')->with('success','添加成功');
            }else{
                return with('admin/slid/create')->with('error','添加失败');
            }

        }else{
            return back()->with('error','轮播图不能为空');
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

    /**
     * 无刷新修改轮播图信息
     * 
     * @param  Request $request [description]
     * @return [string]           [新修改的内容]
     */
    public function change(Request $request)
    {
        $sid = $request->input('sid');
        $res = Slid::find($sid);
        //$bool = is_numeric($request->input('data'));
        // if($bool){
        //     $res->token = $request->input('data');
        // }else{
        //     $res->surl = $request->input('data');
        // }
        //$res->save();
        $re = is_numeric($request->input('data'));
        if($re){
            $res->token = $request->input('data');
            $res->save();
            return $request->input('data');
        }else{
            $res->surl = $request->input('data');
            $res->save();
            return 2;
        }
        //return $request->input('data');
    }

    public function batchDelete(Request $request)
    {   
        return Slid::destroy($request->input('arr',''));
    }

    //改变轮播图状态
    public function changeStatus(Request $request)
    {
        $slid = Slid::find($request->input('id'));
        if($request->input('status') == 0){
            $slid->status = 1;
        }else{
            $slid->status = 0;
        }
        if($slid->save()){
            return 1;
        }else{
            return 0;
        }
       return $request->input('status');
    }
}
