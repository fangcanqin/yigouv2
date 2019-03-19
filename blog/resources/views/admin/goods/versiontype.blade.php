@extends('admin.layout.index');
@section('content')

<div class="demo" style="margin-top:40px;" id="test_box"> 
  <!--   <div class="plus-tag tagbtn clearfix" id="myTags"></div> -->
    <input type="hidden" value="{{$tid}}" id="tid">
    <input type="hidden" value="{{$gid}}" class="gid">
    @foreach($data as $k => $v)
    <span class="label" style=" font-size: 16px;" title="{{$v->id}}">{{$v->name}}：</span>
    <input type="text" id="new_text" value="" style="margin-left:50px"> 
    <button type="button" class="btn btn-info" style="font-size:14px;" id="news_btn{{$k}}">创建</button><br/>
    @endforeach

</div>
 <div class="plus-tag-add">
     
            <ul class="Form FancyForm" style="margin-top: 10px;">
                <li style="display:none">
                </li>
                   <input type="text" value="" style="display:none">
                </li>
                <li>                  
                     <button type="button" class="btn btn-info" style="font-size:14px;" id="quedings">下一步</button>
                </li>
            </ul>

    </div><!--plus-tag-add end 
@endsection
