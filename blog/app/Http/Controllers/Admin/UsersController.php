<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
//导入DB类
use DB;
use App\Http\Controllers\Controller;
//导入用户验证类
use App\Http\Requests\UsersStoreBlogPost;
//导入用户模型类
use App\Models\Users;
//导入用户详情模型类
use App\Models\User_details;
//导入城市表模型
use App\Models\District;
//
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    //public $tpath;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //接收用户查询关键字
        $search = $request->input('search','');
        //分页条数
        $num = $request->input('num',5);
        //获取所有用户信息
        $list = Users::where('username','like',"%{$search}%")->paginate($num);
        //获取数据条数
        $total = Users::where('username','like',"%{$search}%")->count();
        //加载列表页面,并分配数据
        return view('admin.users.index',['list'=>$list,'total'=>$total,'limit'=>$request->all()]);
    }

    /**
     * 加载用户添加界面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * 用户添加处理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreBlogPost $request)
    {
        //开启事务
        DB::beginTransaction();
        //实例化用户名模型类
        $user = new Users();
        //添加用户基本信息
        $user->username = $request->input('username','');
        $user->password = Hash::make($request->input('password',''));
        //设置用户状态 0为待激活
        $user->status = 0;
        //设置用户密令
        $user->token = $request->input('token','');
        //设置用户添加时间
        $user->addtime = time();
        //执行添加用户
        $result1 = $user->save();
        //获取添加的用户id
        $uid = $user->id;
        //实例化用户详情类
        $info = new User_details();
        //设置关联字段
        $info->uid = $uid;
        //设置默认用户头像
        $info->face = '/uploads/head/mr.jpg';
        //执行添加
        $result2 = $info->save();
        //判断是否添加成功
        if($result1 && $result2){
            //确认事务
            DB::commit();
            return redirect('/admin/users')->with('success','添加成功');
        }else{
            //事务回滚
            DB::rollBack();
            return redirect('/admin/users/create')->with('error','添加失败');    
        }   
    }

    /**
     * 查看用户详情信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        //获取用户名
        $username = Users::find($id)->username;
        //获取用户详情信息
        $info = User_details::where('uid',$id)->first();
        //转换时间戳
        //dump($info);
        $uriqi = strtotime($info->age);  
        $info['age'] = getAge($uriqi);
        $info['username'] = $username;
        return view('admin.users.user_details',['info'=>$info,'url'=>$url]);
    }

    /**
     * 显示用户基本信息修改界面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = $_SERVER['HTTP_REFERER'];
        //获取用户基本信息
        $info = Users::find($id);
        //获取用户名
        $username = $info->username;
        //获取用户详细信息
        $data = User_details::where('uid',$id)->first();  
        // $data ->addr = explode(',',$data ->addr);
        $data['username'] = $username;

        return view('admin.users.edit',['data'=>$data,'id'=>$id,'url'=>$url]);
    }

    /**
     * 更新用户信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
        //获取用户地址
        $arr = $request->except('_token','_method','username','tel','email','xq','sex','age','url','uid');
        $str = '';
        foreach($arr as $k => $v){
            $str .= District::find($v)->name;
        }
        //开启事务
        DB::beginTransaction();
        //获取原内容信息
        $info = User_details::where('uid',$id)->first();
        //设置手机号
        $info->tel = $request->input('tel','');
        //设置邮箱号
        $info->email = $request->input('email','');
        //设置地址
        $info->addr = $str;
        //设置详情地址
        $info->xq = $request->input('xq','');
        //设置性别
        $info->sex = $request->input('sex',2);
        //设置年龄
        $info->age = $request->input('age');
        $res = $info->save();
        //判断是否添加成功
        if($res){
            //确认事务
            DB::commit();
            return redirect($request->input('url'))->with('success','修改成功');
        }else{
            //事务回滚
            DB::rollBack();
            return back()->with('error','修改失败');    
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
        //
    }

    public function district(Request $request)
    {
       $upid = $request->input('upid');
       $list = District::where('upid','=',$upid)->get();
       return  $list; 
    }

    public function uploadfile(Request $request)
    {
        // $lpath  = 'head/users_19902.jpeg';
        // if($this->tpath != null){
        //     Storage::delete($this->tpath);
        // }
        //判断是否有文件上传
        if ($request->hasFile('face')){
            //判断文件是否上传成功
           if ($request->file('face')->isValid()) {
                //获取上传信息
                $r = $request->file('face');
                //获取文件名后缀
                $suffix = $r->extension();
                //拼接图片名
                $pic_name = 'users_'.time().$request->input('uid').'.'.$suffix;
                //移动文件
                $path = $r->storeAs('head',$pic_name);
                $data['face'] = '/uploads/'.$path;
                //$this->tpath = $path;
                //修改用户头像信息
                $res = DB::table('user_details')->where('uid','=',$request->input('uid'))->update($data);
                if($res){
                    return $path;
                }else{
                     return 0;
                }
            }else{
                return 0;
            }
        }else{
            return 0;
        }
       
       
    }

}
