@extends('admin.layout.index')
@section('content')
@if (count($errors) > 0)
    <div class="mws-form-message warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mws-panel grid_4" style="margin:20px 0px 0px 300px;">

<div class="mws-panel-header">

    <span style="width:200px;display:inline-block;">{!! $pid == " " ? '添加商品分类' : '您正在为<font color="red'.'"> ['.$name.'] </font>添加子分类'!!}</span>

    <span style="display:inline-block;width:20px;float:right"><a href="/admin/cates" style="text-decoration:none;" class="icon-share-2" ></a></span>
</div>
<div class="mws-panel-body no-padding">
    <form class="mws-form" action="/admin/cates" method="post">
        {{csrf_field()}}
        <fieldset class="mws-form-inline">
            <legend style="color:red"> <marquee>分类信息不可逆请谨慎操作：默认[--请选择--]为顶级分类</marquee></legend>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center">分类名:</label>
                <div class="mws-form-item">
                    <input type="text" class="large" name="name" value="">
                </div>
            </div>
        </fieldset>
        <fieldset class="mws-form-inline">
            <legend><font color="red" size="5px">* </font> 请符合客观事实进行分类设置 </legend>
            <div class="mws-form-row bordered">
                <label class="mws-form-label" style="text-align:center">所属分类:</label>
                <div class="mws-form-item">
                    <select class="large" name="pid">
                        <option value="0"  @if($pid != ' ') disabled @endif>-- 请选择 --</option>
                        @foreach($data as $k => $v)
                        <option value="{{$v->id}}" @if($pid != ' '){{$pid == $v->id ? 'selected' :' disabled' }} @endif>{{$v->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </fieldset>
        <div class="mws-button-row">
            <input type="submit" value="添加" class="btn btn-danger" style="display:block;margin-left:70px;width:80px">
        </div>
    </form>
</div>      
</div>
@endsection