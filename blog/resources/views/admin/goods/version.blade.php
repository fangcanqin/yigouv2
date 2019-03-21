@extends('admin.layout.index');
@section('content')

<div class="demo" style="margin-top:40px;"> 
        <input type="hidden" value="{{$gid}}" id="gid">
  <!--   <div class="plus-tag tagbtn clearfix" id="myTags"></div> -->
    <span class="label" style=" font-size: 16px;">规格：</span><input type="text" id="new_text" value="" style="margin-left:50px"> <button type="button" class="btn btn-info" style="font-size:14px;" id="new_btn">创建</button> 
    <input type="hidden" value="{{$tid}}" id="tid">
    <div id="new_boxx" style="width:400px;height:100px;border:1px solid #ccc;margin-top:10px;padding:2px;">
        
        
    </div>
    <div class="plus-tag-add">
     
            <ul class="Form FancyForm" style="margin-top: 10px;">
                <li style="display:none">
                </li>
                   <input type="text" value="" style="display:none">
                </li>
                <li>
                    
                     <button type="button" class="btn btn-info" style="font-size:14px;" id="queding">下一步</button>
                    <a href="javascript:void(0);">展开推荐规格</a>
                </li>
            </ul>

    </div><!--plus-tag-add end-->
    
    <div id="mycard-plus" style="display:none;margin-top: -25px;">
        <div class="default-tag tagbtn">
            <div class="clearfix" id="new_box">
                @foreach($data as $k => $v)
                <label style="font-weight:bold"><input type="checkbox" value="{{$v->name}}" > {{$v->name}}</label>
                @endforeach      
            </div>
        <!--     <div class="clearfix" style="display:none;"><a value="-1" title="媒体" href="javascript:void(0);"><span>媒体</span><em></em></a></div>
            <div class="clearfix" style="display:none;"><a value="-1" title="网络营销" href="javascript:void(0);"><span>网络营销</span><em></em></a></div>
        </div>
        <div align="right"><a href="javascript:void(0);" id="change-tips" style="color:#3366cc;">换一换</a></div> -->
    </div><!--mycard-plus end-->
        
</div>
@endsection
