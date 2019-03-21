<!DOCTYPE html>
<html>
 <head lang="en"> 
  <meta charset="UTF-8" /> 
  <title>注册</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link rel="stylesheet" href="/AmazeUI-2.4.2/assets/css/amazeui.min.css" /> 
  <link href="/css/dlstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script> 
 </head> 
 <body> 
  <div class="login-boxtitle"> 
   <a href="home/demo.html"><img alt="" src="/uploads/images/logobigs.png" /></a> 
  </div> 
  <div class="res-banner"> 
   <div class="res-main"> 
    <div class="login-banner-bg">
     <span></span>
     <img src="/uploads/images/big.jpg" />
    </div> 
    <div class="login-box"> 
     <div class="am-tabs" id="doc-my-tabs"> 
      <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify"> 
       <li class="am-active"><a href="">邮箱注册</a></li> 
       <li><a href="">手机号注册</a></li> 
      </ul> 
      <div class="am-tabs-bd"> 
       <div class="am-tab-panel am-active"> 
       <!-- 邮箱注册开始 -->
        <form method="post" action="/home/register/insert" id="form_register" >
        {{csrf_field()}} 
         <div class="user-email"> 
          <label for="email"><i class="am-icon-envelope-o"></i></label> 
          <input type="email" name="email" id="email" placeholder="请输入邮箱账号" /> 
         </div> 
         <div class="user-pass"> 
          <label for="password"><i class="am-icon-lock"></i></label> 
          <input type="password" name="password" id="password" placeholder="设置密码" /> 
         </div> 
         <div class="user-pass"> 
          <label for="passwordRepeat"><i class="am-icon-lock"></i></label> 
          <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码" /> 
         </div> 
            <div class="am-cf"> 
         <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" id="register_email"/> 
        </div> 
        </form> 
         <!-- 邮箱注册结束 -->
        <div class="login-links"> 
         <label for="reader-me"> <input id="reader-me" type="checkbox" /> 同意易购商城《服务协议》 </label> 
        </div> 
       </div> 
       <div class="am-tab-panel"> 
       <!-- 手机注册 开始 -->
        <form method="post" action="/home/register/store" id="form_phone">
        {{csrf_field()}}
         <div class="user-phone"> 
          <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label> 
          <input type="tel" name="phone" id="phone" placeholder="请输入手机号" /> 
         </div> 
         <div class="verification"> 
          <label for="code"><i class="am-icon-code-fork"></i></label> 
          <input type="tel" name="phone_code" id="code" placeholder="请输入验证码" style="width:60%" /> 
          <button type="button"  id="sendMobileCode" style="display:inline-block;width:38%;height:38px;font-size:12px">获取验证码</button> 
         </div> 
         <div class="user-pass"> 
          <label for="password"><i class="am-icon-lock"></i></label> 
          <input type="password" name="password" id="phone_password" placeholder="设置密码" /> 
         </div> 
         <div class="user-pass"> 
          <label for="passwordRepeat"><i class="am-icon-lock"></i></label> 
          <input type="password" name="repassword" id="phone_repassword" placeholder="确认密码" /> 
         </div>
           <div class="am-cf"> 
         <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" /> 
        </div> 
        </form>
         <!-- 手机注册 结束 -->
        <div class="login-links"> 
         <label for="reader-me2"> <input id="reader-me2" type="checkbox" /> 同意易购商城《服务协议》 </label> 
        </div>  
        <hr /> 
       </div> 
       <script>
			$(function() {
			    $('#doc-my-tabs').tabs();
			  })
		</script> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="footer "> 
    <div class="footer-hd "> 
     <p> <a href="/home">易购科技</a> <b>|</b> <a href="/home">商城首页</a> <b>|</b> <a href="# ">支付宝</a> <b>|</b> <a href="# ">物流</a> </p> 
    </div> 
    <div class="footer-bd "> 
     <p> <a href="# ">关于易购</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>&copy; 2015-2025 yigou.com 版权所有</em> </p> 
    </div> 
   </div>  
  </div>
 </body>
 <script>
 	// 邮箱注册 开始
 	// 表单提交时
 	$("#form_register").submit(function(){
 		//获取邮箱内容
 		user_email = $('#email').val();
 		//获取用户输入的密码
 		user_pwd = $('#password').val();
 		//获取确认密码
 		user_repwd = $('#passwordRepeat').val();
 		//判断邮箱是否为空
 		if(user_email.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			$('#password').val('');
 			$('#passwordRepeat').val('');
			alert('邮箱不能为空');
			return false;
		}
 		
 		//判断密码是否为空
 		if(user_pwd.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
 			$('#passwordRepeat').val('');
			alert('密码不能为空');
			return false;
		}

 		//验证密码
 		preg_pwd = /^\w{6,10}$/;
 		if(!preg_pwd.test(user_pwd)){
 			$('#password').val('');
 			alert('密码格式为8-10位的任意字母数字下划线');
	    	return false;
 		}
 		
 		//判断密码是否为空
 		if(user_repwd.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			$('#passwordRepeat').val('');
			alert('确认密码不能为空');
			return false;
		}

		//验证密码是否一致
 		if(user_pwd !== user_repwd){
 			$('#password').val('');
 			$('#passwordRepeat').val('');
 			alert('密码不一致');
	    	return false;
 		}
 		//判断协议是否被勾选
 		if(!$('#reader-me').prop('checked')){
 			alert('请勾选易购同意服务协议');
 			return false;	
 		}
 		return true;
	});
 	// 邮箱注册 结束

 	//手机注册 开始
 	$('#form_phone').submit(function(){
 		//获取用户填写的手机号
 		user_phone = $('#phone').val();
 		//获取验证码
		user_code = $('#code').val();
		//获取用户填写的密码
		user_password = $('#phone_password').val();
		//获取用户填写的确认密码
		user_repassword = $('#phone_repassword').val();

 		//判断手机号是否为空
 		if(user_phone.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			$('#phone_password').val('');
			$('#phone_repassword').val('');
			alert('手机号不能为空');
			return false;
		}
		//判断手机号是否符合规则
		phone_preg = /^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/;
		if(!phone_preg.test(user_phone)){	
			$('#phone').val('');
			$('#phone_password').val('');
			$('#phone_repassword').val('');
			alert('无效手机号');
			return false;
		}
		
		//判断手机验证码是否为空
 		if(user_code.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			alert('验证码不能为空');
			return false;
		}
		
		//判断密码是否为空
 		if(user_password.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			$('#phone_repassword').val('');
			alert('密码不能为空');
			return false;
		}

		//定义密码规则
		preg_pwd = /^\w{6,10}$/;
 		if(!preg_pwd.test(user_password)){
 			$('#phone_password').val('');
			$('#phone_repassword').val('');
 			alert('密码格式为8-10位的任意字母数字下划线');
	    	return false;
 		}
		
		//判断确认密码是否为空
 		if(user_repassword.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			$('#phone_password').val('');
			$('#phone_repassword').val('');
			alert('确认密码不能为空');
			return false;
		}

		//判断密码是否一致
		if(user_password !== user_repassword){
 			$('#phone_password').val('');
			$('#phone_repassword').val('');
 			alert('密码不一致');
	    	return false;
 		}

 		//判断是否同意服务协议
 		//判断协议是否被勾选
 		if(!$('#reader-me2').prop('checked')){
 			alert('请勾选易购同意服务协议');
 			return false;	
 		}
 		return true;
 	});
 	//手机注册 结束
 	
 	//发送验证码 开始
 
 	$('#sendMobileCode').click(function(){
 		//获取用户填写的手机号
 		user_phone = $('#phone').val();
 		//判断手机号是否为空
 		if(user_phone.replace(/(^s*)|(s*$)/g, "").length ==0) 
		{ 
			$('#phone_password').val('');
			$('#phone_repassword').val('');
			alert('手机号不能为空');
			return false;
		}
		//判断手机号是否符合规则
		phone_preg = /^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/;
		if(!phone_preg.test(user_phone)){	
			$('#phone').val('');
			$('#phone_password').val('');
			$('#phone_repassword').val('');
			alert('无效手机号');
			return false;
		}
		//手机号正常时
		$.get('/home/register/sendMobileCode',{phone:user_phone},function(data){
			//判断是否发送成功
			if(data.error_code == 0){
				alert('发送成功');
			}else{
				alert('网络异常,请稍后再试');
			}
			console.log(data);
		},'json');
 		obj = $(this);
 		num = 60;
 		timmer = setInterval(function(){
 			obj.html('('+num+'S)重新发送');
 			num--;
 			obj.attr('disabled',true);
 			if(num <= 0){
 				obj.html('重新发送');
 				obj.attr('disabled',false);
 				clearInterval(timmer);
 			}
 		},1000);
 	});

 	//发送验证码 结束
 </script>
</html>
