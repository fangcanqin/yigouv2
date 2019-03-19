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
    <span>修改友情链接</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admin/flink/{{ $flink->id }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }} 
      {{ method_field('PUT') }}

      <div class="mws-form-inline">
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 头像</label> 
       <div class="mws-form-item" style="width:455px"> 
        <input type="file" name="img" value="{{ $flink->img }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 链接地址</label> 
       <div class="mws-form-item"> 
        <input type="text" name="url" value="{{ $flink->url }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 链接状态</label> 
       <div class="mws-form-item"> 
        <input type="radio" name="status" checked="checked" value="1"/>激活 
        <input type="radio" name="status" value="0"/>未激活 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 申请时间</label> 
       <div class="mws-form-item"> 
        <input type="date" name="ctime" value="{{ $flink->ctime }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 停止时间</label> 
       <div class="mws-form-item"> 
        <input type="date" name="stime" value="{{ $flink->stime }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 申请人</label> 
       <div class="mws-form-item"> 
        <input type="text" name="uid" value="{{ $flink->uid }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 内容</label> 
       <div class="mws-form-item"> 
        <input type="text" name="content" value="{{ $flink->content }}" class="small" /> 
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