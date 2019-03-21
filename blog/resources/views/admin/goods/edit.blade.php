@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-ok"></i> 修改商品组信息</span>
</div>
<div class="mws-panel-body no-padding">
      <form action=""  class="mws-form" enctype="multipart/form-data" method="post" id="changepic">
        <div class="mws-form-inline" >
            <div class="mws-form-row" >
                <label class="mws-form-label" style="font-weight:bold;text-align:center;font-size:18px;color:#000;">商品图:</label>
                <input type="hidden" name="group_id" value="{{$info->id}}" id="group_id">
                <div class="mws-form-item">
                    <input type="file" name="pic" class="required email large" id="group_pic"  />
            </div>  
        </div> 
    </div>
    </form>
<form id="mws-validate" class="mws-form" action="/admin/goods/groupdata" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <input type="hidden" name="form_gid" value="{{$info->gid}}">
        <input type="hidden" name="form_group_id" value="{{$info->id}}">
        <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
        <div class="mws-form-inline">
        <div id="test_show_goods"><span class="thumbnail"><img src="{{$info->pic}}" style="height:200px;" alt="" id="gou_pic"></span> </div>
        <span style="background:#ccc;widht:100px;height:20px;display:inline-block;font-size:14px;float:right;font-weight:bold;cursor:pointer;" id="shou_goods" >收起</span>
            <div class="mws-form-row">
                <label class="mws-form-label" style="font-weight:bold;text-align:center;font-size:18px;color:#000">商品编码:</label>
                <div class="mws-form-item">
                    <input type="text" name="code" value="{{$info->code}}" readonly class="required large">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label" style="font-weight:bold;text-align:center;font-size:18px;color:#000">商品组名:</label>
                <div class="mws-form-item">
                    <input type="text" name="group"  value="{{$info->group}}" class="required large">
                </div>
            </div>

            <div class="mws-form-row">
                <label class="mws-form-label" style="font-weight:bold;text-align:center;font-size:18px;color:#000">库存: </label>
                <div class="mws-form-item">
                    <input type="number" name="num" value="{{$info->num}}" class="required url large">
                </div>
            </div>
             <div class="mws-form-row">
                <label class="mws-form-label" style="font-weight:bold;text-align:center;font-size:18px;color:#000">单价: </label>
                <div class="mws-form-item" >
                    <input type="number" name="price" value="{{$info->price}}" class="required url large">
                </div>
            </div>
           
        </div>
        <div class="mws-button-row">
            <input type="submit" class="btn btn-danger" value="修改">
        </div>
    </form>

</div>      
</div>
@endsection