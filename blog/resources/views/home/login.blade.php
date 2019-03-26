<!DOCTYPE html>
<html>
 <head lang="en"> 
  <meta charset="UTF-8" /> 
  <title>登录</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link rel="stylesheet" href="/AmazeUI-2.4.2/assets/css/amazeui.css" /> 
  <link href="/css/dlstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/bs/js/jquery-3.3.1.min.js"></script>
 </head> 
 <body> 
  <div class="login-boxtitle"> 
   <a href="home.html"><img alt="logo" src="/uploads/images/logobigs.png" /></a> 
  </div> 
  <div class="login-banner"> 
   <div class="login-main"> 
    <div class="login-banner-bg">
     <span></span>
     <img src="/uploads/images/big.jpg" />
    </div> 
    <div class="login-box"> 
     <h3 class="title">登录商城</h3> 
     <div class="clear"></div> 
     <div class="login-form"> 
      <form action="/home/login/loginCheck" method="post" id="form_login">
        {{csrf_field()}} 
       <div class="user-name"> 
        <label for="user"><i class="am-icon-user"></i></label> 
        <input type="text" name="username" placeholder="邮箱/手机/用户名" id="username" value=""/> 
       </div> 
       <div class="user-pass"> 
        <label for="password"><i class="am-icon-lock"></i></label> 
        <input type="password" name="password" placeholder="请输入密码" id="password" /> 
       </div> 
       <div class="am-cf"> 
        <input type="submit" value="登 录" class="am-btn am-btn-primary am-btn-sm" /> 
       </div> 
      </form> 
     </div> 
     <div class="login-links"> 
      <label for="remember-me"><input id="remember-me" type="checkbox" />记住密码</label> 
      <a href="#" class="am-fr">忘记密码</a> 
      <a href="/home/register/index" class="zcnext am-fr am-btn-default">注册</a> 
      <br /> 
     </div> 
     <div class="partner"> 
      <h3>合作账号</h3> 
      <div class="am-btn-group"> 
       <li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li> 
       <li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li> 
       <li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="footer "> 
   <div class="footer-hd "> 
    <p> <a href="/home">易购商城</a> <b>|</b> 
     <!-- <a href="# ">商城首页</a> --> 
     <!-- <b>|</b> --> <a href="https://www.alipay.com/">支付宝</a> <b>|</b> <a href="http://www.kuaidi100.com/">物流</a> </p> 
   </div> 
   <div class="footer-bd "> 
    <p> <a href="# ">关于易购</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>&copy; 2015-2025 yigong.com 版权所有</em> </p> 
   </div> 
  </div>  
 </body>
 <script>
 	$('#form_login').submit(function(){
 		//获取登录账号
 		username = $('#username').val();
 		//获取用户输入的密码
 		user_pwd = $('#password').val();
 		//判断登录用户名是否为空
 		if(username.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			$('#password').val('');
			alert('账号不能为空');
			return false;
		}
		//判断密码是否为空
 		if(user_pwd.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
 			
			alert('密码不能为空');
			return false;
		}
		return true;
 	})


 	//获取url中的参数

    $(function(){
    	if(window.location.href.indexOf("?username") != -1 ){
    		paream = window.location.href.split('?')[1];
	    	username = paream.split('=')[1];
	    	//console.log(username);
	    	$('#username').val(username);
    	}
    	
    })

 </script>
</html>