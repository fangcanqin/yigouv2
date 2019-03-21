<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入订单模型表
use App\Models\orders;
//导入订单添加验证类
use App\Http\Requests\OrdersStoreBlogPost;
//导入DB类
use DB;
class OrdersController extends Controller
{
    /**
     * 显示订单列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //默认显示每页条数
        $count = $request->input('count',5);
        $search = $request->input('search','');
        //分页开始 每页5条数据
        $orders = orders::where('order_num','like','%'.$search.'%')->paginate($count);
        
        return view('admin.orders.index',['orders'=>$orders]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
       
    }
    /**
     * 修改订单状态
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $orders = orders::find($id);
        // //判断订单状态
        if($orders->status == 0){
            //赋值一个状态
            $orders->status = '1';
            //压入数据库
            $res = $orders->save();
            //判断订单状态是否符合修改
            if($res){   
                DB::commit();
                return redirect('/admin/orders');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
                }
            //判断订单状态
        }else if($orders->status == 6){
            //赋值一个状态
            $orders->status = '7';
            //压入数据库
            $res = $orders->save();
            //判断订单状态是否符合修改
            if($res){   
                DB::commit();
                return redirect('/admin/orders');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
                }
        }else{
            return redirect('/admin/orders');
        }
    }
    /**
     * 修改订单操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = orders::find($id);
        //判断订单是否符合修改
        if($orders->status == '0'){
            return view('admin.orders.edit',['orders'=>$orders]);
        }else{
            return back()->with('error','商品已发货,不可修改');
        }         
    }
    /**
     * 处理修改订单地址
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrdersStoreBlogPost $request, $id)
    {
        $orders = orders::find($id);
        //修改收获人
        $orders->address->name = $request->input('name');
        //修改手机号码
        $orders->address->phone = $request->input('phone');
        //修改省份
        $orders->address->huo = $request->input('huo');
        //修改街道
        $orders->address->adds = $request->input('adds');
        //压入数据库
        $res = $orders->address->save();
        //判断是否修改成功
        if($res){   
            DB::commit();
            return redirect('/admin/orders')->with('success','修改成功');
        }else{
            DB::commit();
            return back()->with('error','修改失败');
                    }       
    }

    /**
     * 删除订单操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    { 
            $orders = orders::find($id);
            //判断订单是否符合删除要求
            if($orders->status == '4' || $orders->status == '7' || $orders->status == '0'){
                $orders->address->delete();
                //通过id进行删除
                $orders = orders::destroy($id);
                //判断是否删除成功
                if($orders){
                    DB::commit();
                    return redirect('/admin/orders')->with('success','删除成功');
                }else{
                    DB::commit();
                    return back()->with('error','修改失败');
                }                
            }else{
                return back()->with('error','订单未完成,不可删除');
        }
    }

    /**
     * 订单详情表
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datas(Request $request,$id)
    {
        $orders = orders::find($id);
        return view('admin.orders.datas',['orders'=>$orders]);
    }
}
