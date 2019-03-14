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
    <span>管理员添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admin/admin_users" method="post" enctype="multipart/form-data">
      {{ csrf_field() }} 
      
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 管理员</label> 
       <div class="mws-form-item">
        <input type="text" name="name" value="{{ old('name') }}" class="small" /> 
         <label>&nbsp;&nbsp; 以首字母开头任意6-16位</label>
       </div> 

      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 密码</label> 
       <div class="mws-form-item"> 
        <input type="password" name="password" value="" class="small" /> 
        <label>&nbsp;&nbsp;任意6-10位</label>
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 确认密码</label> 
       <div class="mws-form-item"> 
        <input type="password" name="repassword" value="" class="small" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 头像</label> 
       <div class="mws-form-item" style="width:455px"> 
        <input type="file" name="face" value="" class="small" /> 
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