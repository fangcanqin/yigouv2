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
    <span>广告修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admin/ad/{{ $ad->id }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
     <div class="mws-form-inline">
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告图片</label> 
       <div class="mws-form-item" style="width:455px"> 
        <input type="file" name="img" value="{{ $ad->img }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告地址</label> 
       <div class="mws-form-item"> 
        <input type="text" name="url" value="{{ $ad->url }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告状态</label> 
       <div class="mws-form-item"> 
        <input type="radio" name="status" checked="checked" value="1"/>激活 
        <input type="radio" name="status" value="0"/>未激活 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告开始时间</label> 
       <div class="mws-form-item"> 
        <input type="date" name="ctime" value="{{ $ad->ctime }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 广告停止时间</label> 
       <div class="mws-form-item"> 
        <input type="date" name="stime" value="{{ $ad->stime }}" class="small" /> 
       </div> 
      </div> 

     </div> 

     <div class="mws-button-row"> 
      <input type="submit" value="修改" class="btn btn-success" /> 
      <input type="reset" value="重置" class="btn" /> 
     </div> 

    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection