<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入管理员添加验证类
use App\Http\Requests\admin_usersStoreBlogPost;

use App\Http\Requests\Admin_users_editStoreBlogPost;
//导入管理员模型表
use App\Models\admin_users;
use Illuminate\Support\Facades\Hash;
//导入DB类
use DB;
//导入时间类
use Carbon\Carbon;

class admin_usersController extends Controller
{
    


    /**
     * 显示管理员列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //默认显示每页显示5条数据
        $count = $request->input('count',5);
        $search = $request->input('search','');
          
        //分页开始，每页5条数据
        $admin_users = admin_users::where('name','like','%'.$search.'%')->paginate($count);
        //获取数据库里管理员相关信息
        return view('admin.admin_users.index',['admin_users'=>$admin_users,'request'=>$request->all()]);
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
        //实例化管理员模型表类
            $admins = new admin_users;
            //添加名称
            $admins->name = $request->input('name','');
            //密码加密
            $admins->password = Hash::make($request->input('password'));
            //设置添加时间
            $admins->addtime = Carbon::now();

        //判断头像是否上传
        if($request->hasFile('face')){
            $res = $request->file('face');
            //获取文件名后缀
            $suffix = $res->extension();

            //拼接完整名字
            $name = time().'.'.$suffix;
            $pic = $res->storeAs('admin',$name);
            
            //添加头像
            $admins->face = '/uploads/'.$pic;

            $res = $admins->save();   
            //判断是否添加成功
            if($res){   
                DB::commit();
                return redirect('/admin/admin_users')->with('success','添加成功');
            }else{
                DB::commit();
                return redirect('/admin/admin_users/create')->with('error','添加失败');
            }

            //图片后缀名
            $arr = ['jpg','png','gif','jpeg'];
            if(!in_array($suffix,$arr)){
                return back()->with('error','请上传正确的图片格式文件');
            }

        }else{

            return redirect('/admin/admin_users/create')->with('error','请添加头像');
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
        
    }

    /**
     * 修改管理员资料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin_users = admin_users::find($id);
        return view('admin.admin_users.edit',['admin_users'=>$admin_users]);
    }

    /**
     * 获取管理员提交过来的修改资料
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(admin_users_editStoreBlogPost $request, $id)
    {
        
        //判断是否上传头像
        if($request->hasFile('face')){
            $res = $request->file('face');
            // //获取文件名后缀
            $suffix = $res->extension();

            $arr = ['jpg','png','gif','jpeg'];
            if(!in_array($suffix,$arr)){
                 return back()->with('error','请上传正确的图片格式文件');
            }

            // //拼接完整名字
             $name = time().'.'.$suffix;

             $pic = $res->storeAs('admin',$name);

            //链接数据库
            $admin_users = admin_users::find($id);
            
            //修改头像
             $admin_users->face = '/uploads/'.$pic; 

             //修改密码
            $admin_users->password = Hash::make($request->input('password',''));

            $res = $admin_users->save();

            //判断是否修改成功
            if($res){   
                DB::commit();
                return redirect('/admin/admin_users')->with('success','修改成功');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
            }

        }else{
            //链接数据库
            $admin_users = admin_users::find($id);
            
            //修改密码
            $admin_users->password = Hash::make($request->input('password',''));


            $res = $admin_users->save();

            //判断是否修改成功
            if($res){   
                DB::commit();
                return redirect('/admin/admin_users')->with('success','修改成功');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
            }
        }

    }

    /**
     * 删除管理员操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //通过id进行删除
        $admin = admin_users::destroy($id);
        //判断是否删除成功
        if($admin){   
                DB::commit();
                return redirect('/admin/admin_users')->with('success','删除成功');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
            }
    }

   
}

