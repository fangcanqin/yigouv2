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
    <span>订单详情</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admin/orders">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
     <div class="mws-form-inline">     
     <div class="mws-form-row"> 
      <input type="submit" value="返回" class="btn btn-success" />  
     </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 订单号</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="order_num" value="{{ $orders->order_num }}" class="small" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 用户id</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="uid" value="{{ $orders->uid }}" class="small" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 收件人</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="name" value="{{ $orders->address->name }}" class="small" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 收件人id</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="user_id" value="{{ $orders->address->user_id }}" class="small" /> 
       </div> 
      </div>    
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 电话号码</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="phone" value="{{ $orders->address->phone }}" class="small" /> 
       </div> 
      </div>     
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 省份地址</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="huo" value="{{ $orders->address->huo }}" class="small" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 街道地址</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="adds" value="{{ $orders->address->adds }}" class="small" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;color:#000;"><span style="color:red;font-size:15px">*</span> 总金额</label> 
       <div class="mws-form-item"> 
        <input type="text" disabled name="total" value="{{ $orders->total }}" class="small" /> 
       </div> 
      </div>
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection