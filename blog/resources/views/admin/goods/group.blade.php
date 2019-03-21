@extends('admin.layout.index')
@section('content')
<div class="container" style="margin-top:50px;">
    <!-- <span style="font-weight:bold;font-size:20px;margin-bottom:20px;display:block">请分别添加商品详情信息:</span> -->
    <table class="mws-table">
    <thead>
        <tr>
            <th>序号</th>
            <th>商品ID</th>
            <th>商品编码</th>
            <th>组合名</th>
            <th>商品图</th>
            <th>库存</th>
            <th>单价</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($temp as $k => $v)
        <tr>
            <td>{{$k}}</td>
            <td  class="gid" style="display:none">{{$gid}}</td>
            @if($k == 0)
            <td rowspan="{{count($temp)}}">{{$gid}}</td>
            @endif
            <td class="code">{{$gid.mt_rand(1000,9999).str_random(3).$k}}</td>
            <td class="group" style="width:120px">{{$v}}</td>
            <td style="width:130px;">
                <form action=""  enctype="multipart/form-data" class="up_pic">
                    <input type="file" name="pic{{$k}}[]" multiple class="uploads">
                </form>
            </td>
            <td ><input type="number" name="num{{$k}}" class="num" value="0"></td>
            <td><input type="number" name="price{{$k}}" class="price" value="0"></td>
            <td style="width:70px;"><a href="#" class="ctrl_s">保存</a></td>
        </tr>
        @endforeach
    </tbody>

</table>
<div style="margin-top:10px"><a href="/admin/goods" class="btn btn-info" style="width:100%">确认</a></div>
</div>
@endsection