<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ad;

use App\Http\Requests\AdStoreBlogPost;

use DB;

class adController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //默认显示每页显示5条数据
        $count = $request->input('count',5);
        $search = $request->input('search','');
          
        //分页开始，每页5条数据
        $ad = ad::where('url','like','%'.$search.'%')->paginate($count);
        
        return view('admin.ad.index',['ad'=>$ad]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/ad/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdStoreBlogPost $request)
    {
        //实例化管理员模型类
        $ads = new ad;
        //获取广告地址
        $ads->url = $request->input('url');
        //获取广告状态
        $ads->status = $request->input('status');
        //获取广告开始时间
        $ads->ctime = $request->input('ctime');
        //获取广告结束时间
        $ads->stime = $request->input('stime');
        
        if($request->hasFile('img')){
        //获取广告图片名称
        $res = $request->file('img');
        //获取文件后缀名
        $suffix = $res->extension();
        //拼接完整名字
        $name = time().'.'.$suffix;
        $pic = $res->storeAs('ad',$name);
        //获取新的广告图片
        $ads->img = '/uploads/'.$pic;
        $res = $ads->save();
        if($res){   
                DB::commit();
                return redirect('/admin/ad')->with('success','添加成功');
            }else{
                DB::commit();
                return redirect('/admin/ad/create')->with('error','添加失败');
            }
        }else{
            DB::commit();
                return redirect('/admin/ad/create')->with('error','请添加广告图片');
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
        $ad = ad::find($id);
        return view('admin.ad.edit',['ad'=>$ad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdStoreBlogPost $request, $id)
    {
        
        //链接数据库
        $ad = ad::find($id);
        //修改广告地址
        $ad->url = $request->input('url');
        //修改广告状态
        $ad->status = $request->input('status');
        //修改广告开始时间
        $ad->ctime = $request->input('ctime');
        //修改广告结束时间
        $ad->stime = $request->input('stime');

        //判断是否上传头像
        if($request->hasFile('img')){
        //获取图片
        $res = $request->file('img');
        //获取文件后缀名
        $suffix = $res->extension();

        $arr = ['jpg','png','gif','jpeg'];

        if(!in_array($suffix,$arr)){
            return back()->with('error','请上传正确的图片格式文件');
        }
        //拼接一个完整的名字
        $name = time().'.'.$suffix;
        //将图片放到对应的文件里
        $pic = $res->storeAs('ad',$name);
        //修改广告图片
        $ad->img = '/uploads/'.$pic;
            
        $res = $ad->save();
            if($res){   
                DB::commit();
                return redirect('/admin/ad')->with('success','修改成功');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
                }
        }else{
            $res = $ad->save();
            
            DB::commit();
            return redirect('/admin/ad')->with('success','修改成功');
        }
        
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //通过id进行删除
        $ad = ad::destroy($id);
        //判断是否删除成功
        if($ad){   
                DB::commit();
                return redirect('/admin/ad')->with('success','删除成功');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
            }

    }
}
