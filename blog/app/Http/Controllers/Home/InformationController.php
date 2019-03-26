<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\User_details;
use DB;
class InformationController extends Controller
{
    public function index(Request $request)
    {   //获取用户信息
        if($request->session()->has('username')){
            $username = session('username');
            //获取用户头像
            $userInfo = Users::find(session('username_id'))->user_details;
            //获取用户名
            $zname =  Users::find(session('username_id'))->username;
        }else{
            $username = ' ';
            $userInfo = ' ';
            $zname = ' ';
        }
        //获取用户详情资料
        $details = User_details::where('uid',session('username_id'))->first();
        return view('home.information',['username'=>$username,'userInfo'=>$userInfo,'details'=>$details,'zname'=>$zname]);
    }

    //修改个人信息
    public function editInfo(Request $request)
    {
        //获取修改的用户id
        $uid = $request->input('uid',' ');
        $user = Users::find($uid);
        //修改用户名
        $user->username = $request->input('username',' ');
        //执行修改
        $user->save();
        //修改用户的详情信息
        $user_details = $user->user_details;
        //昵称
        $user_details->uname =  $request->input('uname',' ');
        //性别
        $user_details->sex =  $request->input('sex',' ');
        //手机号
        $user_details->tel =  $request->input('tel',' ');
        //邮箱
        $user_details->email =  $request->input('email',' ');
        if($user_details->save()){
            echo "<script>alert('修改成功');window.location.href='/home/information/index'</script>";
        }else{
            echo "<script>alert('网络波动...');window.location.href='/home/information/index'</script>";
        }
    }

    public function changeFace(Request $request)
    {
        //判断是否有文件上传
        if ($request->hasFile('face')) {
           //获取文件后缀
           $pic = $request->file('face');
           $suffix = $pic->extension();
           //判断文件是否为图片格式
           if(!getTypeImg($suffix)){
             return 2;
           }
           //拼接文件名
           $picname = str_random(5).time().'.'.$suffix;
           //上传图片
           $face = $pic->storeAs('head',$picname);
           //修改数据库图片路径
           $user_details = User_details::where('uid',$request->input('uid',' '))->first();
           $user_details->face = '/uploads/'.$face;
           if($user_details->save()){
               return $user_details->face;
           }else{
                return 0;
           }
          //return $user_details;
        }else{
            return 0;
        }
                
    }
}
