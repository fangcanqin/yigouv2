<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin_users;
use Hash;
class LoginController extends Controller
{
    /**
     * 加载后台登录页面
     * @return [type] [description]
     */
    public function index()
    {
        return view('admin.login.login');
    }

    /**
     * /
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function loginCheck(Request $request)
    {
        //获取登录用户信息
        $username = $request->input('name',' ');
        //判断用户名是否存在
        $info = admin_users::where('name',$username)->first();
        //dump($bool);
        if($info){
            //用户名存在
            //判断密码是否正确
            if (!Hash::check($request->input('password'), $info->password)) {
                //密码不正确
                return back()->with('error', '密码错误,请重新输入');
            }
            //用户名+密码 正确前提下
            //将管理员存储到sesion中
            session(['userinfo'=>$username]);
            session(['face'=>$info->face]);
            session(['id'=>$info->id]);

           // dump(session('userinfo'));
            return redirect('/admin')->with('success','登录成功');
        }else{
            //用户名不存在
            return back()->with('error', '管理员不存在');
        }
    }

    public function outlog(Request $request)
    {
        //清除sesssion
        $request->session()->flush();
        //跳转登录页面
        return redirect('/admin/login/index');
    } 
}
