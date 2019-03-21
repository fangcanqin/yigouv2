@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-pencil"></i> Text Inputs</span>
</div>
<div class="mws-panel-body no-padding">
    <form class="mws-form" action="/admin/goods/goodsupdate" method="post">
    {{csrf_field()}}
<input type="hidden" name="gid" value="{{$info->id}}">
        <div class="mws-form-inline">
            <div class="mws-form-row">
                <label class="mws-form-label" style="font-weight:bold;text-align:center">商品名:</label>
                <div class="mws-form-item">
                    <input type="text" name="name" value="{{$info->name}}" class="large">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label" style="font-weight:bold;text-align:center">描述:</label>
                <div class="mws-form-item">
                    <input type="text" name="descr" value="{{$info->descr}}" class="large">
                </div>
            </div>
             <div class="mws-form-row">
                <label class="mws-form-label" style="font-weight:bold;text-align:center">状态:</label>
                <div class="mws-form-item">
                    <label><input type="radio"  value="0" name="status" @if($info->status == 0) checked @endif>下架</label>
                    <label><input type="radio"  value="1" name="status" @if($info->status == 1) checked @endif>上架</label>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="修改" class="btn btn-danger">
                <input type="reset" value="Reset" class="btn ">
            </div>
        </div>
    </form>
</div>      
</div>
@endsection