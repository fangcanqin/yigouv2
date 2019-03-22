@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_4" style="margin:50px 0px 0px 250px;">
<div class="mws-panel-header">
    <span>商品添加</span>
</div>
<div class="mws-panel-body no-padding">
    <form class="mws-form" action="/admin/goods"  method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="mws-form-inline">
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">商品名  :</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="name" value="{{old('name')}}">
                </div>
            </div>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">所属分类 :</label>
                <div class="mws-form-item">
                    <select class="large" name="cate_id">
                        @foreach($cates as $k => $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">产品类型  :</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="type" value="{{old('type')}}">
                </div>
            </div>
              <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">配料表  :</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="batching" value="{{old('batching')}}">
                </div>
            </div>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">产品规格  :</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="size" value="{{old('size')}}">
                </div>
            </div>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">保质期  :</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="period" value="{{old('period')}}">
                </div>
            </div>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">产品标准号  :</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="number" value="{{old('number') }}">
                </div>
            </div>
             <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">储存方法  :</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="method" value="{{old('method') }}">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">状态 :</label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li><label><input type="radio" name="status" value="1"> 上架</label></li>
                        <li><label><input type="radio" name="status" value="0" checked> 下架</label></li>
                    </ul>
                </div>
            </div>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center;font-weight:bold;font-size:15px">描述</label>
                <div class="mws-form-item">
                     <!-- 加载编辑器的容器 -->
                    <script id="container" name="descr" type="text/plain">
                        {{old('descr')}}
                    </script>
                </div>
            </div>

        </div>
        <div class="mws-button-row">
            <input type="submit" value="下一步" class="btn btn-danger" id="goods_next">
            <input type="reset" value="Reset" class="btn ">
        </div>
    </form>
</div>      
</div>
@endsection
@section('product')
    <script>
       
    </script>
@endsection