<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Http\Requests\OrdersStoreBlogPost;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
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
        
        return view('/admin/orders/index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $orders = orders::find($id);
        if($orders->status == 0){
            $orders->status = '1';
            $res = $orders->save();
            if($res){   
                DB::commit();
                return redirect('/admin/orders');
            }else{
                DB::commit();
                return back()->with('error','修改失败');
                }
        }else if($orders->status == 6){
            $orders->status = '7';
            $res = $orders->save();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = orders::find($id);
        if($orders->status == '0'){
            return view('admin.orders.edit',['orders'=>$orders]);
        }else{
            return back()->with('error','商品已发货,不可修改');
        } 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrdersStoreBlogPost $request, $id)
    {
        $orders = orders::find($id);
        
            //修改收获地址
            $orders->address_id = $request->input('address_id');
            $res = $orders->save();
            if($res){   
                    DB::commit();
                    return redirect('/admin/orders');
                }else{
                    DB::commit();
                    return back()->with('error','修改失败');
                    }
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdersStoreBlogPost $request, $id)
    {
        
            $orders = orders::find($id);
            if($orders->status == '4' || $orders->status == '7'){
                
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
                return back()->with('error','商品未完成,不可删除');
        }
    }
    
}
