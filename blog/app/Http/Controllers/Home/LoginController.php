<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        
    }
}
