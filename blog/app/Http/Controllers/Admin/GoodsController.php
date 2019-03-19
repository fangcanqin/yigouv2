<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入分类类
use App\Http\Controllers\Admin\CatesController;
//导入商品模型类
use App\Models\Goods;
use App\Models\Cates;
//导入属性模型类
use App\models\District;
//导入属性规格值模型类
use App\models\Attribute;
//导入库存属性模型类
use App\models\Sku;
//导入库存模型类
use App\models\Sku_details;
class GoodsController extends Controller
{
    
    /**
     * 显示商品列表.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收商品查询关键字
        $search = $request->input('search','');
        //分页条数
        $num = $request->input('num',5);
        //获取所有商品信息
        $list = Sku_details::where('code','like',"%{$search}%")->paginate($num);
        //获取数据条数
        $total = Sku_details::where('code','like',"%{$search}%")->count();
        //加载列表页面,并分配数据
        return view('admin.goods.index',['list'=>$list,'total'=>$total,'limit'=>$request->all()]);
    }

    /**
     * 显示添加商品页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create',['cates'=>CatesController::getCates()]);
    }

    /**
     * 处理商品添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //开启事务
        DB::beginTransaction();
        //实例化商品类
        $goods = new Goods();
        //设置商品名
        $goods->name = $request->input('name',' ');
        //设置商品分类
        $goods->cid = $request->input('cate_id',' ');
        //设置商品状态
        $goods->status = $request->input('status',0);
        //设置商品描述
        $goods->descr = strip_tags($request->input('descr','商品暂无描述'));
        //执行添加操作
        $res1 = $goods->save();
        //判断商品是否参数是否正常设置
        if($res1){
            //事务确认
            DB::commit();
            return redirect("/admin/goods/version/{$request->input('cate_id')}/{$goods->id}")->with('success','请为商品添加型号');
        }else{
            //事务回滚
            return back()->with('error','商品添加失败');
        }
    }

    //加载添加型号页面
    public function version($tid,$gid)
    {
        $cates = Cates::find($tid);
        $data = $cates->catesAttribute;
        return view('admin.goods.version',['data'=>$data,'tid'=>$tid,'gid'=>$gid]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function setVersion(Request $request)
    {
        $attribute = $request->input('data',' ');
        $tid = $request->input('tid',' ');
        foreach($attribute as $key => $value){
            $arr['name'] = $value;
            $arr['tid'] = $tid;
            $new_arr[] = $arr;
        }
        if(DB::table('attribute')->insert($new_arr)){
            return 1;
        }else{
            return 0;
        } 
       
    }

    public function setVersionType(Request $request)
    {
        $tid = $request->input('tid','');
        $gid =  $request->input('gid','');
        $data = DB::table('attribute')->where('tid',$tid)->get();
        //dump($data);
        return view('admin.goods.versiontype',['data'=>$data,'tid'=>$tid,'gid'=>$gid]);
        
    }

    public function setAttr(Request $request)
    {
        $data = $request->input('data',' ');
        //商品id
        $gid = $request->input('gid','');
        $str = implode(',',$data);
        $arr_t = explode(',',$str);
     
        foreach($arr_t as $key => $value){
            if($key % 2 == 0 ){
                $arr['attr_id'] = $value;
                $k[] = $value;
            }else{
                $arr['value'] = $value;
               
            }
            if($key % 2 == 0){
                 continue;
             }else{
                $new_arr[] = $arr;
            }     
            
        }
        //判断商品属性是否添加成功
        if(DB::table('attributetype')->insert($new_arr)){
            $attr_id = array_unique($k);
            //重组数据 
            foreach($attr_id as $kk => $vv){
              $success[] = Attribute::find($vv)->Attributes;
            }
            foreach($success as $kkk => $vvv){
                foreach($vvv as $ks => $vs){
                     $res2['attr_id'] = $vs['attr_id'];
                     $res2['value_id'][] = $vs['id'];
                   
                }
                $res2['value_id'] = implode(',',$res2['value_id']);
                $array[] =  $res2;
                $res2 = [];
            }
            //将商品id 以及 属性规格 以及属性规格的值存储到库存属性表
            foreach($array as $sku_k => $sku_v){
                $array[$sku_k]['gid'] = $gid;
            }
            //判断库存属性表是否添加成功
            if(DB::table('sku')->insert($array)){
                return $gid;
            }else{
                return 0;
            }

        }else{
            return 0;
        }
    
    }

    /**
     * 展示商品属性全部组合信息
     * @return [type] [description]
     */
    public function showSku(Request $request)
    {
        //获取商品id
        $gid = $request->input('gid',' ');
        //获取到该商品下的所有信息
        $info = Sku::where('gid',$gid)->select('attr_id','value_id')->get();
        $data=array();
        foreach($info as $k =>$v){
            //dump($v->value_id);
            //查询数据库根据value_id 获取name
            $info2 = DB::select('select * from attributetype where id in('.$v->value_id.')');
            //dump($info2);
            $data1 = array();
            foreach ($info2 as $kk =>$vv){
                $data1[] = $vv->value;   
            }
            $data[]=$data1;           
        }
       
        //笛卡尔积 进行组合
        $temp = CartesianProduct($data);
        return view('admin.goods.group',['temp'=>$temp,'gid'=>$gid]);
    }

    public function setGroup(Request $request)
    {   
        // //开启事务
        
        //判断是否有文件上传
        if ($request->hasFile('face')){

            //判断文件是否上传成功
           if ($request->file('face')->isValid()) {
                //获取上传信息
                $r = $request->file('face');
                //获取文件名后缀
                $suffix = $r->extension();
                //拼接图片名
                $pic_name = 'goods_'.time().'.'.$suffix;
                //移动文件
                $path = $r->storeAs('goods',$pic_name);
                 
                $pic_path = '/uploads/'.$path;
                session(['goods_pic'=>$pic_path]);
                return $pic_path;
            }else{
               
                return 0;
            }
        }else{

            return 0;
        }     
    }

    public function setData(Request $request)
    {
        if(session('goods_pic')){
            //开启事务
            DB::beginTransaction();
            $sku_details = new Sku_details();
            $data = $request->input('data','');
            $sku_details->gid = $data[0];
            $sku_details->group = $data[1];
            $sku_details->code = $data[2];
            $sku_details->num = $data[3];
            $sku_details->price = $data[4];
            $sku_details->pic = session('goods_pic');
            $res1 = $sku_details->save();
            if($res1){
                DB::commit();
                $request->session()->forget('goods_pic');
                return 1;
            }else{
                DB::rollBack();
                return 0;
            }
        }else{
            return '';
        }
        
        
    }
    
}
