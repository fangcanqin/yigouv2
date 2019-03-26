<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
//导入用户模型类
use App\Models\Users;
class LoginController extends Controller
{
    /**
     * 加载用户登录视图
     * 
     * @return view 用户登录视图
     */
    public function index()
    {
        return view('home.login');
    }

    /**
     * 处理用户登录
     * 
     * @return view 处理用户登录视图
     */
    public function loginCheck(Request $request)
    {
        //获取用户登录的账号
        $username = $request->input('username',' ');
        //判断账号是否存在
        $bool = Users::where('username',$username)->orwhere('phone',$username)->orwhere('email',$username)->first();
        if($bool){
            //账号存在 判断密码是否正确
            $password = $request->input('password',' ');
            if (Hash::check($password, $bool->password)) {
                // 密码正确
                //判断用户状态是否已激活
                if($bool->status == 1){
                    //账号正常
                    //将用户的信息储存到session中
                    session(['username'=>$username]);
                    session(['username_id'=>$bool->id]);
                    echo "<script>window.location.href='/home'</script>";
                }else{
                    //用户未激活
                    echo "<script>alert('账号未激活,请登录邮箱进行激活');window.location.href='/home/login/index?username={$username}';</script>";exit;
                }
            }else{
                // 密码错误
                echo "<script>alert('密码错误');window.location.href='/home/login/index?username={$username}';</script>";exit;
            }

        }else{
            //账户不存在
            echo "<script>alert('账号不存在');window.location.href='/home/login/index'</script>";exit;
        }        
    }

    //注销账号
    public function outLogin(Request $request)
    {

        $request->session()->forget('username');
        $request->session()->forget('username_id');
        return redirect('/home');
    }
}
