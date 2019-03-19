<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入公告模型类
use App\Models\Notice;
//导入公告验证类
use App\Http\Requests\NoticeStoreBlogPost;
class NoticeController extends Controller
{
    /**
     * 公告列表
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
        $list = Notice::where('title','like',"%{$search}%")->paginate($num);
        //获取数据条数
        $total = Notice::where('title','like',"%{$search}%")->count();
       //加载列表页面,并分配数据
        return view('admin.notice.index',['list'=>$list,'total'=>$total,'search'=>$search,'show'=>$num]);
    }

    /**
     * 公告添加界面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * 处理公告添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeStoreBlogPost $request)
    {
        //实例化公告模型类
        $notice = new Notice();
        //设置标题
        $notice->title = $request->input('title',' ');
        //设置作者
        $notice->author = $request->input('author',' ');
        //设置内容
        $notice->content = $request->input('content',' ');
        //设置状态
        $notice->status = $request->input('status',0);
        //设置当前登录的管理员信息
        $notice->admin = session('userinfo');
        //执行添加操作
        $res = $notice->save();
        if($res){
            return redirect('/admin/notice')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
     * //加载修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        //获取要修改的内容信息
        $info = Notice::find($id);
        //获取当前url
        $url = $_SERVER['HTTP_REFERER'];
        return view('admin.notice.edit',['info'=>$info,'url'=>$url]);
    }

    /**
     * 处理修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取要修改原内容
        $notice = Notice::find($id);
            //设置标题
        $notice->title = $request->input('title',' ');
        //设置作者
        $notice->author = $request->input('author',' ');
        //设置内容
        $notice->content = $request->input('content',' ');
        //设置状态
        $notice->status = $request->input('status',0);
        //执行更新操作
        $res = $notice->save();
        if($res){
            return redirect($request->input('url'))->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除公告
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Notice::destroy($id);
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
