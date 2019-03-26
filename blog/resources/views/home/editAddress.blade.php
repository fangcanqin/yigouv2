<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0" /> 
  <title>地址管理</title> 
  <link href="/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/personal.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/addstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script> 
  <script src="/AmazeUI-2.4.2/assets/js/amazeui.js"></script> 
  

 </head> 
 <body> 
  <!--头 --> 
  <header> 
   <article> 
    <div class="mt-logo"> 
     <!--顶部导航条 --> 
     <div class="am-container header"> 
      <ul class="message-l"> 
       <div class="topMessage"> 
        <div class="menu-hd">
          @if($username != ' ') 
         <font>账号:</font> 
         <a href="javascript:;" target="_top" class="h" style="color:blue">{{$username}}</a> 
         <a href="/home/outlogin" target="_top" class="h" style="color:red">注销</a> @else 
         <a href="/home/login/index" target="_top" class="h">亲，请登录</a> @endif 
         <a href="#" target="_top">免费注册</a> 
        </div> 
       </div> 
      </ul> 
      <ul class="message-r"> 
       <div class="topMessage home"> 
        <div class="menu-hd"> 
         <a href="#" target="_top" class="h">商城首页</a> 
        </div> 
       </div> 
       <div class="topMessage my-shangcheng"> 
        <div class="menu-hd MyShangcheng"> 
         <a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a> 
        </div> 
       </div> 
       <div class="topMessage mini-cart"> 
        <div class="menu-hd"> 
         <a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a> 
        </div> 
       </div> 
       <div class="topMessage favorite"> 
        <div class="menu-hd"> 
         <a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a> 
        </div> 
       </div> 
      </ul> 
     </div> 
     <!--悬浮搜索框--> 
     <div class="nav white"> 
      <div class="logoBig"> 
       <li><img src="/uploads/images/logobigs.png" style="width:140px" /></li> 
      </div> 
      <div class="search-bar pr"> 
       <a name="index_none_header_sysc" href="#"></a> 
       <form style="border-top-right-radius:30px;border-bottom-right-radius:30px;background:#FF5700"> 
        <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off" style="padding-left:20px;font-size:15px" /> 
        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" style="border-top-right-radius:30px;border-bottom-right-radius:30px;outline:none;font-weight:bold" /> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div> 
   </article> 
  </header> 
  <div class="nav-table"> 
   <div class="long-title"> 
    <span class="all-goods">全部分类</span> 
   </div> 
   <div class="nav-cont"> 
    <ul> 
     <li class="index"><a href="/home">首页</a></li> 
    </ul> 
    <div class="nav-extra" style="color:#000"> 
     <i class="am-icon-user-secret am-icon-md nav-user"></i> 
     <b></b>我的福利 
     <i class="am-icon-angle-right" style="padding-left: 10px;"></i> 
    </div> 
   </div> 
  </div> 
  <!-- 头部 结束 --> 
  <b class="line"></b> 
  <div class="center"> 
   <div class="col-main"> 
    <div class="main-wrap"> 
     <div class="user-address"> 
      <!--标题 --> 
   <!--    <div class="am-cf am-padding"> 
       <div class="am-fl am-cf">
        <strong class="am-text-danger am-text-lg">地址管理</strong> / 
        <small>Address&nbsp;list</small>
       </div> 
      </div>  -->
      <!-- <hr />  -->
     <!--  <div class="clear"></div>  -->
      <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a> 
      <!--例子--> 
      <div class="am-modal am-modal-no-btn" id="doc-modal-1"> 
       <div class="add-dress"> 
        <!--标题 --> 
        <div class="am-cf am-padding"> 
         <div class="am-fl am-cf">
          <strong class="am-text-danger am-text-lg">修改收件人信息</strong> / 
          <small>Add&nbsp;address</small>
         </div> 
        </div> 
        <hr /> 
        <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;"> 
         <form class="am-form am-form-horizontal" action="/home/address/update" method="post" id="form_address"> 
         {{csrf_field()}}
         <input type="hidden" name="url" value="{{$url}}">
         <input type="hidden" name="id" value="{{$current_address->id}}">
          <div class="am-form-group"> 
           <label for="user-name" class="am-form-label">收货人</label> 
           <div class="am-form-content"> 
            <input type="text" id="user-name" value="{{$current_address->name}}" name="name"  placeholder="收货人" /> 
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-phone" class="am-form-label">手机号码</label> 
           <div class="am-form-content"> 
            <input id="user-phone" placeholder="手机号必填" type="text" value="{{$current_address->phone}}" name="phone" /> 
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-address" class="am-form-label">所在地</label> 
           <div class="am-form-content address"> 
            
        		<input type="text" name="adds" value="{{$current_address->adds}} ">
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-intro" class="am-form-label">详细地址</label> 
           <div class="am-form-content"> 
            <textarea class="" rows="3" id="user-intro" name="xq" placeholder="输入详细地址">{{$current_address->xq}}</textarea> 
            <small>100字以内写出你的详细地址...</small> 
           </div> 
          </div> 
          <div class="am-form-group"> 
           <div class="am-u-sm-9 am-u-sm-push-3"> 
            <!-- <a class="am-btn am-btn-danger">保存</a>  -->
            <input type="submit" class="am-btn am-btn-danger" value="保存">
           </div> 
          </div> 
         </form> 
        </div> 
       </div> 
      </div> 
     </div> 
     <script type="text/javascript">
		$(document).ready(function() {							
			$(".new-option-r").click(function() {
				$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
			});
			
			var $ww = $(window).width();
			if($ww>640) {
				$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
			}
			
		})
	</script> 
     <div class="clear"></div> 
    </div> 
     <script>
    $('#form_address').submit(function(){
    //获取收件人名称
    username = $('#user-name').val();
    //获取收件人手机号
    phone = $('#user-phone').val();
    //判断登录用户名是否为空
    if(username.replace(/(^s*)|(s*$)/g, "").length ==0) 
    { 
      alert('收货人不能为空');
      return false;
    }
    //判断密码是否为空
    //判断手机号是否为空
    if(phone.replace(/(^s*)|(s*$)/g, "").length ==0) 
    { 
      alert('手机号不能为空');
      return false;
    }
    //判断手机号是否符合规则
    phone_preg = /^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/;
    if(!phone_preg.test(phone)){  
      alert('无效手机号');
      $('#user-phone').val('');
      return false;
    }
    return true;
  })

    </script>
    <script src="/admin_template/js/libs/jquery-1.8.3.min.js"></script>
 @extends('home.footer')
