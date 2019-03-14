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
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>轮播图添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admin/slid" method="post" enctype="multipart/form-data">
      {{ csrf_field() }} 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> URL:</label> 
       <div class="mws-form-item">
        <input type="text" name="surl" value="{{ old('surl') }}" class="small" /> 
         <label>&nbsp;&nbsp; 例:http://www.baidu.com</label>
       </div> 

      </div>  
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 图片:</label> 
       <div class="mws-form-item" style="width:465px"> 
        <input type="file" name="simg" value="" class="small" /> 
       </div> 
      </div>
       <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;margin-right:50px"><span style="color:red;font-size:15px">*</span> 状态: </label>
        <label for="fa" ><input style="magin-left:30px" type="radio" name="status" value="1" class="small" id="fa"/> 
        <b>直接发布</b></label>
         &nbsp;&nbsp;&nbsp;<label for="nofa"><input type="radio" name="status" value="0" class="small" id="nofa" checked /> <b>暂不发布<b></label>
      </div> 
     </div> 
     <div class="mws-button-row"> 
      <input type="submit" value="添加" class="btn btn-success" /> 
      <input type="reset" value="重置" class="btn" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection