<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>个人资料</title> 
  <link href="/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/personal.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/infstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script> 
  <script src="/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script> 
 </head> 
 <body> 
  <!--头部 开始 --> 
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
  <!--头部 结束 --> 
  <b class="line"></b> 
  <div class="center"> 
   <div class="col-main"> 
    <div class="main-wrap"> 
     <div class="user-info"> 
      <!--标题 --> 
      <div class="am-cf am-padding"> 
       <div class="am-fl am-cf">
        <strong class="am-text-danger am-text-lg">个人资料</strong> / 
        <small>Personal&nbsp;information</small>
       </div> 
      </div> 
      <hr /> 
      <!--头像 --> 
      <div class="user-infoPic"> 
       <div class="filePic"> 
       <form action="" method="post" enctype="multipart/form-data" id="form_face"> 
        <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" id="face" name="face"/>
        </form>
        <img class="am-circle am-img-thumbnail" src="{{$details->face or '/uploads/head/mr.jpg'}}" alt="" id="toxiang" />

       </div> 
       <p class="am-form-help">头像</p> 
       <div class="info-m"> 
        <div>
         <b>用户名：<i>{{$zname}}</i></b>
        </div> 
        <div class="u-level"> 
         <span class="rank r2"> 
          <s class="vip1"></s><a class="classes" href="#">铜牌会员</a> </span> 
        </div> 
        <div class="u-safety"> 
         <a href="safety.html"> 账户安全 <span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">100分</i></span> </a> 
        </div> 
       </div> 
      </div> 
      <!--个人信息 --> 
      <div class="info-main"> 
       <form class="am-form am-form-horizontal" action="/home/information/editinfo" method="post"> 
       {{csrf_field()}}
       <input type="hidden" value="{{$details->uid}}" name="uid" id="uid">
        <div class="am-form-group"> 
         <label for="user-name2" class="am-form-label">用户名</label> 

         <div class="am-form-content"> 
          <input type="text" id="user-name2" name="username" value="{{$zname}}" placeholder="用户名只允许修改一次" @empty(!$zname) readonly @endempty /> 
         </div> 
        </div> 
        <div class="am-form-group"> 
         <label for="user-name" class="am-form-label">姓名</label> 
         <div class="am-form-content"> 
          <input type="text" id="user-name2" placeholder="name" name="uname" value="{{$details->uname or ' '}}"/> 
         </div> 
        </div> 
        <div class="am-form-group"> 
         <label class="am-form-label">性别</label> 
         <div class="am-form-content sex"> 
          <label class="am-radio-inline"> <input type="radio" name="sex" value="1" data-am-ucheck="" @if($details->sex == 1) checked @endif /> 男 </label> 
          <label class="am-radio-inline"> <input type="radio" name="sex" value="0" data-am-ucheck="" @if($details->sex == 0) checked @endif /> 女 </label> 
          <label class="am-radio-inline"> <input type="radio" name="sex" value="2" data-am-ucheck="" @if($details->sex == 2) checked @endif/> 保密 </label> 
         </div> 
        </div> 
        <div class="am-form-group"> 
         <label for="user-birth" class="am-form-label">生日</label> 
         <div class="am-form-content birth"> 
          <div class="birth-select"> 
   			<input type="date" value="{{$details->age}}">
          </div> 

         </div> 
        </div> 
        <div class="am-form-group"> 
         <label for="user-phone" class="am-form-label">电话</label> 
         <div class="am-form-content"> 
          <input id="user-phone" placeholder="telephonenumber" name="tel" type="tel" value="{{$details->tel}}" /> 
         </div> 
        </div> 
        <div class="am-form-group"> 
         <label for="user-email" class="am-form-label">电子邮件</label> 
         <div class="am-form-content"> 
          <input id="user-email" placeholder="Email" type="email" name="email" value="{{$details->email}}" /> 
         </div> 
        </div> 
        <div class="am-form-group address"> 
         <label for="user-address" class="am-form-label">收货地址</label> 
         <div class="am-form-content address"> 
          <a href="address.html"> <p class="new-mu_l2cw"> <span class="province">湖北</span>省 <span class="city">武汉</span>市 <span class="dist">洪山</span>区 <span class="street">雄楚大道666号(中南财经政法大学)</span> <span class="am-icon-angle-right"></span> </p> </a> 
         </div> 
        </div> 
        <div class="am-form-group safety"> 
         <label for="user-safety" class="am-form-label">账号安全</label> 
         <div class="am-form-content safety"> 
          <a href="safety.html"> <span class="am-icon-angle-right"></span> </a> 
         </div> 
        </div> 
        <div class="info-btn"> 
         <div class="am-btn ">
       <input type="submit"  value="修改" style="color:#fff;background-color:#dd514c;border-color: #dd514c;width:60px;height:30px;text-align:center;font-weight:bold">
         </div> 
        </div> 
       </form> 
      </div> 
     </div> 
    </div> 
    <!--底部 开始--> @extends('home.footer')
    <script>
    $('#face').change(function(){
    	$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		//发送请求进行修改头像
		formData = new FormData($('#form_face')[0]);
		formData.append('face',$('#face')[0].files[0]);
		formData.append('uid',$('#uid').val());
		$.ajax({
			url: '/home/information/changeface',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(res){
				$('#toxiang').attr('src',res);
			}
		})
    })
    </script>