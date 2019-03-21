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
use Illuminate\Support\Facades\Storage;
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
        $list = Goods::where('name','like',"%{$search}%")->paginate($num);
        //获取数据条数
        $total = Goods::where('name','like',"%{$search}%")->count();

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

    public function setVersion(Request $request)
    {
        // $attribute = $request->input('data',' ');
        // $tid = $request->input('tid',' ');
        // foreach($attribute as $key => $value){
        //     $arr['name'] = $value;
        //     $arr['tid'] = $tid;
        //     $new_arr[] = $arr;
        // }
        // if(DB::table('attribute')->insert($new_arr)){
        //     return 1;
        // }else{
        //     return 0;
        // } 
        
        //获取
        //型类值
        $data = $request->input('data',' ');
        //商品分类id
        $tid = $request->input('tid',' ');
        //实例化型类属性表
        $attribute = new Attribute();
        $attribute->name = $data;
        $attribute->tid = $tid;
        if($attribute->save()){
            return 1;
        }else{
            return 0;
        }
       
    }

    public function setVersionType(Request $request)
    {
        $tid = $request->input('tid','');
        $gid =  $request->input('gid','');
        //$data = DB::table('attribute')->where('tid',$tid)->get();
        $res = $request->input('arr1','');
        $data = explode(',',$res);
        foreach($data as $key => $value){
            $arr[] = DB::table('attribute')->where('name',$value)->first();
        }
        return view('admin.goods.versiontype',['data'=>$arr,'tid'=>$tid,'gid'=>$gid]);
        
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
        //清空临时表数据
        DB::delete('delete from attributetype');
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

    //加载商品修改页面
    public function goodsEdit(Request $request)
    {
        $gid = $request->id;
        //查询该商品信息 并分配数据
        return view('admin.goods.goodsedit',['info'=>Goods::find($gid)]);
    }

    //商品修改逻辑处理
    public function goodsUpdate(Request $request)
    {
        //获取修改执行修改的的商品id 
        $gid = $request->input('gid');
        //通过id获取商品信息
        $goods  = Goods::find($gid);
        $goods->name = $request->input('name');
        $goods->descr = $request->input('descr');
        $goods->status = $request->input('status');
        if($goods->save()){
            return redirect('/admin/goods')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    //商品删除操作
    public function goodsDel(Request $request)
    {   //获取商品id
       $gid = $request->id;
       //判断该商品是否存在组合
       $data  = Goods::find($gid)->goods_group;
      
       //判断子数据是否为空
       if(count($data)){
            return back()->with('error','该商品存在子组合,不可删除!');
       }else{
         //执行删除操作
         if(Goods::destroy($gid)){
            return back()->with('success','删除成功');
         }else{
            return back()->with('error','服务器异常,请联系技术人员');
         }
       }
    }
    /**
     * 商品组合修改
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
       //通过id 获取当前商品的信息 并分配到模板
       return view('admin.goods.edit',['info'=>Sku_details::find($id)]);
    }


    public function show($id,Request $request)
    {
         //接收商品查询关键字
        $search = $request->input('search','');
        //分页条数
        $num = $request->input('num',5);
        //获取所有商品信息
        $list = Sku_details::where('code','like',"%{$search}%")->where('gid',$id)->paginate($num);
        //获取数据条数
        $total = Sku_details::where('code','like',"%{$search}%")->where('gid',$id)->count();
        //加载列表页面,并分配数据
        return view('admin.goods.show',['list'=>$list,'total'=>$total,'limit'=>$request->all()]);
    }
    
    //改变图片
    public function changePic(Request $request)
    {
        $group_id = $request->input('group_id');
        //获取原图路径 /uploads/
        $yuan_pic = substr($request->input('yuan_pic'),8);
        
        //判断是否有文件上传
        if ($request->hasFile('pic')){            
            //判断文件是否上传成功
           if ($request->file('pic')->isValid()) {
                //获取上传信息
                $r = $request->file('pic');
                //获取文件名后缀
                $suffix = $r->extension();
                //判断文件是否为图片类型
                if(!getTypeImg($suffix)){
                    return 2;
                }
                //拼接图片名
                $pic_name = 'goods_'.time().$group_id.'.'.$suffix;
                //移动文件
                $path = $r->storeAs('goods',$pic_name);
                $data['pic'] = '/uploads/'.$path;
                //修改用户商品图
                $res = DB::table('sku_details')->where('id','=',$group_id)->update($data);
                if($res){
                    //删除原来图片
                    if(Storage::delete($yuan_pic)){
                        return $path;
                    }
                    
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


    //修改商品组合信息
    public function groupData(Request $request)
    {
        //dump($request->all());
        //获取商品组合id 
        $id = $request->input('form_group_id');
        //获取商品id
        $gid = $request->input('form_gid');
        $sku_details = Sku_details::find($id);
        //重新赋值
        $sku_details->group = $request->input('group',' ');
        $sku_details->num = $request->input('num',' ');
        $sku_details->price = $request->input('price',' ');
        //执行修改
        if($sku_details->save()){
            return redirect('/admin/goods/'.$gid)->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    //删除商品组合信息
    public function groupDel(Request $request)
    {
       //获取对应 商品组合 id
       $id = $request->id;
       //获取该商品的图片路径
       $path = sku_details::find($id)->pic;
       //获取所属商品id
       $gid = sku_details::find($id)->gid;
        //处理路径
        $new_path = substr($path,8);
       //删除数据
       if(sku_details::destroy($id)){
            if(storage::delete($new_path)){
                return redirect('/admin/goods/'.$gid)->with('success','删除成功');
            }else{
                return back()->with('error','删除失败');
            }
       }else{
              return back()->with('error','删除失败');
       }
    }
}
