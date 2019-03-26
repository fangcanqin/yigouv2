<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
//导入城市表模型
use App\Models\District;
use DB;
use App\Models\Address;
class AddressController extends Controller
{
    //地址管理界面
    public function index(Request $request)
    {   
        //获取用户信息
        if($request->session()->has('username')){
            $username = session('username');
            //$uid = session('username_id')
            //获取用户头像
            $userInfo = Users::find(session('username_id'))->user_details;
            //获取用户名
            $zname =  Users::find(session('username_id'))->username;
            //获取用户id
            $uid = session('username_id');
        }else{
            $username = ' ';
            $userInfo = ' ';
            $zname = ' ';
            $uid = ' ';
        }
        //获取当前登录用户的所有收件人信息
        $user_address = Address::where('uid',$uid)->get();
        return view('home.address',['userInfo'=>$userInfo,'zname'=>$zname,'username'=>$username,'uid'=>$uid,'user_address'=>$user_address]);
    }

    //获取地址
    public function district(Request $request)
    {
       $upid = $request->input('upid');
       $list = District::where('upid','=',$upid)->get();
       return  $list; 
       
    }

    //添加地址
    public function insert(Request $request)
    {
        //dump($request->all());
        //将用户的收件人信息储存到数据库中
        //获取用户地址
        $arr = $request->except('_token','uid','name','tel','phone','adds');
        $str = '';
        foreach($arr as $k => $v){
            $str .= District::find($v)->name;
        }
        //开启事务
        DB::beginTransaction();
        //实例化用户收件人表
        $address =  new Address();
        //添加收件人姓名
        $address->name = $request->input('name',' ');
        //设置手机号
        $address->phone = $request->input('phone',' ');
        //设置用户id
        $address->uid = $request->input('uid',' ');
        //设置用户基本地址
        $address->adds = $str;
        //设置用户详情
        $address->xq = $request->input('adds',' ');
        $res =  $address->save();
        //判断是否添加成功
        if($res){
            //确认事务
            DB::commit();
            echo "<script>alert('添加成功');window.location.href='/home/address/index'</script>";exit;
        }else{
            //事务回滚
            DB::rollBack();
             echo "<script>alert('添加失败');window.location.href='/home/address/index'</script>";exit;
        }
    }

    //修改收件人信息
    public function edit(Request $request,$id)
    {
         //获取用户信息
        if($request->session()->has('username')){
            $username = session('username');
            //$uid = session('username_id')
            //获取用户头像
            $userInfo = Users::find(session('username_id'))->user_details;
            //获取用户名
            $zname =  Users::find(session('username_id'))->username;
            //获取用户id
            $uid = session('username_id');
        }else{
            $username = ' ';
            $userInfo = ' ';
            $zname = ' ';
            $uid = ' ';
        }
        $url = $_SERVER['HTTP_REFERER'];
        //获取当前收件人信息进行回填
        $current_address = Address::find($id);
        //dump($current_address);
       return view('home.editAddress',['userInfo'=>$userInfo,'zname'=>$zname,'username'=>$username,'uid'=>$uid,'current_address'=>$current_address,'url'=>$url]);
    }

    //执行修改收件人信息操作
    public function update(Request $request)
    {
        $address = Address::find($request->id);
        $address->name = $request->input('name',' ');
        $address->phone = $request->input('phone',' ');
        $address->adds = $request->input('adds',' ');
        $address->xq = $request->input('xq',' ');
        //执行修改
        if($address->save()){
             //echo "<script>alert('修改成功');window.location.href='/home/address/index'</script>";exit;
             return redirect($request->url);
        }else{
            echo "<script>alert('失败成功');window.location.href='/home/address/edit/"+$request->id+"'</script>";exit;
        }
    }

    //删除收件人信息
    public function del(Request $request)
    {
        //接收要删除的id
        $id = $request->input('id',' ');
        if(Address::destroy($id)){
            return $id;
        }else{
            return 0;
        }

    }

    //改变默认地址
    public function changeStatus(Request $request)
    {
        //查询该用户下所有的地址,将所有默认状态改为0 
        DB::update("UPDATE address SET province = 0 ");
        //再将单独选默认的地址设置为1 
        $address = Address::find($request->mr_add);
        $address->province = 1;
        if($address->save()){
            return $address;
        }else{
            return 0;
        }
       
    }
}
