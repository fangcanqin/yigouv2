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
    <span>广告添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admin/ad" method="post" enctype="multipart/form-data">
      {{ csrf_field() }} 
     <div class="mws-form-inline">


      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告图片</label> 
       <div class="mws-form-item" style="width:455px"> 
        <input type="file" name="img" value="" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告地址</label> 
       <div class="mws-form-item"> 
        <input type="text" name="url" value="" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告状态</label> 
       <div class="mws-form-item"> 
        <input type="radio" name="status" checked="checked" value="1"/>激活 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告开始时间</label> 
       <div class="mws-form-item"> 
        <input type="date" name="ctime" value="" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告停止时间</label> 
       <div class="mws-form-item"> 
        <input type="date" name="stime" value="" class="small" /> 
       </div> 
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