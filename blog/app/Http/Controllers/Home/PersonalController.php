<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
class PersonalController extends Controller
{
    //个人中心
    public function index(Request $request)
    {
        //获取用户信息
        if ($request->session()->has('username')) {
            $username = session('username');
            //获取用户头像
            $userInfo = Users::find(session('username_id'))->user_details;
        }else{
            $username = ' ';
            $userInfo = ' ';
        }
        return view('home.personal',['username'=>$username,'userInfo'=>$userInfo]);
    }
}
