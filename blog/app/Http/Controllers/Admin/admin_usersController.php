<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入管理员添加验证类
use App\Http\Requests\admin_usersStoreBlogPost;
//导入管理员模型表
use App\Models\admin_users;
use Illuminate\Support\Facades\Hash;
//导入DB类
use DB;
class admin_usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo '<img src="/uploads/admin/1552314963.jpeg"/>';
    }

    /**
     * 显示管理员添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin_users.create');
    }

    /**
     * 管理员添加操作处理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(admin_usersStoreBlogPost $request)
    {
        //判断头像是否上传
        if($request->hasFile('face')){
             $res = $request->file('face');
             dd($res);
            //获取文件名后缀
            $suffix = $res->extension();
            //拼接完整名字
            $name = time().'.'.$suffix;
            $pic = $res->storeAs('admin',$name);
            //实例化管理员模型表类
            $admins = new admin_users;

            //添加头像
            $admins->face = '/uploads/'.$pic;
            //添加名称
            $admins->name = $request->input('name','');
            //密码加密
            $admins->password = Hash::make($request->input('password'));
            //设置添加时间
            $admins->addtime = time();
            $res = $admins->save();   
            //判断是否添加成功
            if($res){   
                DB::commit();
                return redirect('/admin/admin_users')->with('success','成功');
            }else{
                DB::commit();
                return redirect('/admin/admin_users/create')->with('error','失败');
            }

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
