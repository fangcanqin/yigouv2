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
    <span>订单修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admin/orders/{{ $orders->id }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
     <div class="mws-form-inline">

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 收货人</label> 
       <div class="mws-form-item"> 
        <input type="text" name="name" value="{{ $orders->address->name }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 手机号码</label> 
       <div class="mws-form-item"> 
        <input type="text" name="phone" value="{{ $orders->address->phone }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 省份</label> 
       <div class="mws-form-item"> 
        <input type="text" name="huo" value="{{ $orders->address->huo }}" class="small" /> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 地址</label> 
       <div class="mws-form-item"> 
        <input type="text" name="adds" value="{{ $orders->address->adds }}" class="small" /> 
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