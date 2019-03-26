@extends('admin.layout.index')
@section('content')

<div class="demo" style="margin-top:40px;" > 
  <!--   <div class="plus-tag tagbtn clearfix" id="myTags"></div> -->
    <input type="hidden" value="{{$tid}}" id="tid">
    <input type="hidden" value="{{$gid}}" class="gid">
    @foreach($data as $k => $v)
    <div style="border:1px solid #ccc;margin-top:5px;overflow:hidden;">
    <span class="label" style=" font-size: 13px;display:inline-block;height:26px;text-align:center;line-height:26px;" title="{{$v->id}}">{{$v->name}}：</span>
    <div style="float:right">
    <input type="text" id="new_text" value="" style="margin-left:50px"> 
    <button type="button" class="btn btn-info" style="font-size:14px;" id="news_btn{{$k}}">
    创建</button></div></div>
    @endforeach

</div>
 <div class="plus-tag-add" id="test_box">
     
            <ul class="Form FancyForm" style="margin-top: 10px;">
                <li style="display:none">
                </li>
                   <input type="text" value="" style="display:none">
                </li>
                <li>                  
                     <b  class="btn btn-info" style="font-size:14px;" id="quedings">下一步</b>
                </li>
            </ul>

    </div><!--plus-tag-add end 
@endsection
