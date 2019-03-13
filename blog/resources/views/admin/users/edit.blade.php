@extends('admin.layout.index')
@section('content')
 <script src="/bs/js/jquery-3.3.1.min.js"></script>    
  <div class="mws-panel grid_8" style="width:700px;margin:50px 200px;"> 
   <div class="mws-panel-header">
    <div id="txa">
      <img src="{{$data->face}}" alt=" " id="tx" style="width:100%">
    </div>
    
    <span style="font-size:12px;color:#fff"><i class="icon-business-card" style="font-size:20px"></i> >>> 修改用户信息 </span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/admin/users/{{$id}}" method="post" id="mws-validate" class="mws-form"  novalidate="novalidate" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <input type="hidden" name="url" value="{{$url}}">
    <input type="hidden" name="uid" value="{{$data->uid}}" id="upid">
    <label>
     <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="icon-official" style="font-size:20px"></i> 用户名:</label> 
       <div class="mws-form-item" style="width:200px;"> 
        <input type="text" name="username" value="{{$data->username}}" readonly class="required large" /> 
       </div> 
      </div>
       <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="icon-phone" style="font-size:20px"></i> 手机号:</label> 
       <div class="mws-form-item" style="width:200px;"> 
        <input type="text" name="tel" value="{{$data->tel}}"  class="required large" /> 
       </div> 
      </div>

      <div class="fileinput-holder" style="position: relative;z-index:9999;width:150px;height:20px;left:420px;top:-30px;display:none;"><span class="fileinput-btn btn" type="button" style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;"> 更换头像 <input type="file" name="face" class="required" id = "photo" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;"></span></div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="icon-envelope" style="font-size:25px"></i> &nbsp;&nbsp;&nbsp;邮箱:</label> 
       <div class="mws-form-item" style="width:200px;"> 
        <input type="text" name="email" value="{{$data->email}}" class="required large" /> 
       </div> 
      </div>
      <div class="mws-form-row">
       <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="icon-accessibility-2" style="font-size:25px"></i> &nbsp;&nbsp;&nbsp;性别:</label> 
        <div class="mws-form-item">
            <ul class="mws-form-list" style="overflow:hidden;padding-top:8px;">
                <li style="width:50;float:left;margin-right:10px">
                    <input id="gender_female" type="radio" name="sex" value="0" @if($data->sex == 0) checked @endif> 
                    <label for="gender_female">女</label>
                </li>
                 <li style="width:50;height:10px;float:left;margin-right:10px">
                    <input id="gender_male" type="radio" name="sex" value="1" class="required" @if($data->sex == 1) checked @endif> 
                    <label for="gender_male">男</label>
                </li>
                <li style="width:50;float:left;margin-right:10px">
                    <input id="gender_baomi" type="radio" value="2" name="sex" @if($data->sex == 2) checked @endif> 
                    <label for="gender_baomi">保密</label>
                </li>
            </ul>
            <label for="gender" class="error plain" generated="true" style="display:none"></label>
        </div>
    </div>
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="icon-table" style="font-size:25px"></i> &nbsp;&nbsp;&nbsp;年龄:</label> 
       <div class="mws-form-item" style="width:200px;"> 
        <input type="date" value="{{$data->age}}" style="width:200px;text-align:center;font-size:15px;font-weight:bold" name="age"/>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="icon-home-2" style="font-size:25px"></i> &nbsp;&nbsp;&nbsp;原址:</label> 
       <div class="mws-form-item" style="width:200px;"> 
        <p type="text" name="reqField" class="required large" style="line-height:35px;width:400px"/>{{$data->addr}}{{$data->xq}}<p>
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="icon-home-3" style="font-size:25px"></i> &nbsp;&nbsp;&nbsp;新址:</label> 
       <div class="mws-form-item" style="width:500px;"> 

         <select name="s1" class="required large" style="width:120px;display:inline-block;margin-right:2px;" id="ones">
            <option value="" class="ss">--请选择--</option>
        </select> 
       </div>    
      </div>
      <div class="mws-form-row"> 
      <label class="mws-form-label" style="text-align:right;font-weight:bold"><i class="" style="font-size:25px"></i> &nbsp;&nbsp;&nbsp;详细地址:</label>
      <div class="mws-form-item">
      <textarea rows="10" cols="30" name="xq">{{$data->xq}}</textarea>
     </div>
     </div>
     <div class="mws-button-row"> 
      <input type="submit" class="btn btn-danger" /> 
     </div> 
    </form> 
   </div> 
  </div>
<script>
function show(){
    $('#ones').attr('display','block');
}
$(document).ready(function(){ 
            //第一级别获取
        $.get('/admin/users/district',{'upid':0},function(result){
            //得到的数据数组内容 我们要遍历得到里面的一个对象
            for(var i=0;i<result.length;i++){
                console.log(result[i].name);
                //将我们得到的地址名称写入到option
                var info=$('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                //将得到的option标签放入到select列表中
                $('select').eq(0).append(info);
            }
            //禁止请选择被选中
            $('.ss').attr('disabled',true);
        },'json');
    //其他级别的内容
    //live 事件委派 他可以帮助我们将动态生成的内容只要选择器相同就可以有相应事件
    $('select').live('change',function(){
        obj = $(this);
        //通过id来查找下一个
        id=$(this).val();
        //清除所有其他的select
        obj.nextAll('select').remove();
        //alert(id);
        $.getJSON('/admin/users/district',{'upid':id},function(result){
            //console.log(result);
            if (result !='') {
            //获取下select对象 得到长度
            var num = $('select').length+1;
            var select = $('<select name="s'+num+'" class="required large" style="width:120px;;margin-right:2px"></select>');
            var op = $('<option class="mm">--请选择--</option>');
            select.append(op);
            for(var i=0;i<result.length;i++){
                //console.log(result[i].name);
                var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                //将得到的option 标签添加到select标签里面
                select.append(info);
            }
            //将select标签添加到当前的标签的后面
            obj.after(select);
            }
            
            $('.mm').attr('disabled','true');
        })

    })
});

//ajax图片上传
 
 $('#tx').click(function(){
     $('#photo').click();
     $('#photo').change(function(){
         var formData = new FormData($('#mws-validate'));
         //console.log($('#photo')[0].files[0]);
         formData.append('face',$('#photo')[0].files[0]);
         formData.append('uid',$('#upid').val());
         //坑点: 无论怎么传数据,console.log(formData)都会显示为空,但其实值是存在的,f12查看Net tab可以看到数据被上传了
         //console.log(formData);
         $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
         });
         $.ajax({
          url:'/photo/up',
          type: 'POST',
          data: formData,
          // async:false,
          // cache:false,
          //这两个设置项必填
          contentType: false,
          processData: false,
          success:function(data){
            console.log(data);
             if(data != 0){
                 $('#tx').attr('src','/uploads/'+data);
             }
          }
     })



    });
 });    
</script>
@endsection