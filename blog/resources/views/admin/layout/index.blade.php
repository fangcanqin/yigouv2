
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="stylesheet" href="/product/skin/default/layer.css" />
<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin_template/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin_template/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin_template/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin_template/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin_template/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin_template/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin_template/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin_template/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin_template/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin_template/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin_template/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin_template/css/themer.css" media="screen">
<link rel="stylesheet" href="/css/page_page.css">
<link rel="stylesheet" href="/css/tx.css">
<link href="/biaoqiao/css/tab.css" type="text/css" rel="stylesheet" />
<title>MWS Admin - Form Layouts</title>
    <style>
        th,td{text-align:center}
        a i:hover{ opacity:0.6}
        #txa{position:absolute;z-index:111;width:100px;height:100px;border-radius:50%;left:470px;top:80px;border:2px solid #888888;overflow:hidden}
    </style>
</head>

<body>

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/admin_template/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="{{session('face')}}" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{session('userinfo')}}
                    </div>
                    <ul>
                        <li><a href="/admin/admin_users/{{session('id')}}/edit">修改密码</a></li>
                        <li><a href="/admin/outlog">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 用户管理</a>
                        <ul>
                            <li><a href="/admin/users"><i class="icon-chevron-right"></i> 用户列表</a></li>
                            <li><a href="/admin/users/create"><i class="icon-chevron-right"></i> 用户添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 管理员管理</a>
                        <ul>
                            <li><a href="/admin/admin_users"><i class="icon-user"></i> 管理员列表</a></li>
                            <li><a href="/admin/admin_users/create"><i class="icon-add-contact"></i> 管理员添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/cates"><i class="icon-chevron-right"></i> 分类列表</a></li>
                            <li><a href="/admin/cates/create"><i class="icon-chevron-right"></i> 分类添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-picture"></i> 轮播图管理</a>
                        <ul>
                            <li><a href="/admin/slid"><i class="icon-chevron-right"></i> 轮播图列表</a></li>
                            <li><a href="/admin/slid/create"><i class="icon-chevron-right"></i> 轮播图添加</a>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-list-2"></i> 广告管理</a>
                        <ul>
                            <li><a href="/admin/ad"><i class="icon-chevron-right"></i> 广告列表</a></li>
                            <li><a href="/admin/ad/create"><i class="icon-chevron-right"></i> 添加广告</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-gift"></i> 商品管理</a>
                        <ul>
                            <li><a href="/admin/goods"><i class="icon-chevron-right"></i> 商品列表</a></li>
                            <li><a href="/admin/goods/create"><i class="icon-chevron-right"></i> 添加商品</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-calendar"></i> 公告管理</a>
                        <ul>
                            <li><a href="/admin/notice"><i class="icon-chevron-right"></i> 公告列表</a></li>
                            <li><a href="/admin/notice/create"><i class="icon-chevron-right"></i> 添加公告</a></li>
                        </ul>
                    </li>
                  <li class="active">
                        <a href="#"><i class="icon-shopping-cart"></i> 订单管理</a>
                        <ul>
                            <li><a href="/admin/orders"><i class="icon-chevron-right"></i> 订单列表</a></li>
                        </ul>
                    </li>
                      <li class="active">
                        <a href="#"><i class="icon-link"></i> 链接管理</a>
                        <ul>
                            <li><a href="/admin/flink"><i class="icon-chevron-right"></i>链接列表</a></li>
                          
                        </ul>
                    </li>
                 
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
                <!-- 显示跳转信息 开始 -->
                @if (session('success'))
                    <div class="mws-form-message success">
                        {{ session('success') }}
                    </div>
                @endif    
                
                @if (session('error'))
                    <div class="mws-form-message error">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- 显示跳转信息 结束 -->

                <!-- 内容 开始 -->
                @section('content')

                @show

                <!-- 内容 结束 -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>


 
    <!-- JavaScript Plugins -->
    <script src="/admin_template/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin_template/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin_template/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin_template/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin_template/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin_template/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin_template/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin_template/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admin_template/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/admin_template/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin_template/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin_template/js/core/themer.js"></script>
   <!-- 配置文件 -->
    <script type="text/javascript" src="/bd/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/bd/ueditor.all.js"></script>

    <script type="text/javascript" src="/biaoqiao/js/tab.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
      var ue = UE.getEditor('container', {
        toolbars: [
        ['fullscreen', 'source', 'undo', 'redo', 'bold']
    ],
        autoHeightEnabled: true,
        autoFloatEnabled: true
    });
      ue.ready(function () {

        // 删除 路径一行
        $(".edui-editor-bottomContainer").remove();
    });

       function trim(str){ //删除左右两端的空格
　　     return str.replace(/(^\s*)|(\s*$)/g, "");
　　  }

      // 添加规格
        $('#new_text').focus();
        $('#new_btn').click(function(){
            //alert($('#new_text').val());
            if(trim($('#new_text').val()).length == 0){
                alert('内容不能为空');
                return ;
            }
            // 获取文本框的内容
            content = $('#new_text').val();
            $('#new_box').append('<label style="font-weight:bold"><input type="checkbox" value="'+$('#new_text').val()+'">'+$('#new_text').val()+' </label>');
            $('#new_text').val('');
        });

          $('#queding').click(function(){
                //获取到所有打勾的值
                //console.log($('input:checked'));
               arr1 = []; 
             $('input:checked').each(function(){
                 arr1.push($(this).val());
             })
             //console.log(arr1);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            tid= $('#tid').val();
            $.post('/admin/goods/setversion',{data:arr1,tid:tid},function(res){
                if(res == 1){
                    gid =$('#gid').val();
                    window.location.href="/admin/goods/setversiontype?tid="+tid+'&gid='+gid;
                }else{
                    alert('操作失败,系统故障,请联系技术人员');
                }
            })

          });


          $('button[type=button]').click(function(){
                new_type = $(this).prev().val();
                id = $(this).prev().prev().attr('title')
                $('#test_box').append('<label><input type="checkbox" value="'+id+','+new_type+'" />'+new_type+'<label>');
                $(this).prev().val('');
          });


          $('#quedings').click(function(){
                //获取到所有打勾的值
                //console.log($('input:checked'));
               arr1 = []; 
             $('input:checked').each(function(){
                 arr1.push($(this).val());
             })
             //console.log(arr1);
             
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             tid= $('#tid').val();
             gid = $('.gid').val();
            $.post('/admin/goods/setattr',{data:arr1,tid:tid,gid:gid},function(res){
                //console.log(res);
                if(res){
                    //console.log(res);
                    window.location.href="/admin/goods/showSku?gid="+gid;
                }else{
                    alert('操作失败,系统故障,请联系技术人员');
                }
            })

          });

          //商品分组数据操作
          $('.ctrl_s').click(function(){
             obj = $(this).parent().parent();
             num =obj.find('.num').val();
             price = obj.find('.price').val()
             //判断库存是否有值
             if(num.replace(/(^s*)|(s*$)/g, "").length == 0){ 
                alert('库存不能没填值,库存为0,请输入0'); 
                return ;
             }
             if(price.replace(/(^s*)|(s*$)/g, "").length == 0){ 
                alert('单为空,小心挨揍'); 
                return ;
             }      
             group_good = new Array();
             //添加商品id
             group_good.push(obj.find('.gid').html());
             //添加商品分组名
             group_good.push(obj.find('.group').html());
             //添加商品编码
             group_good.push(obj.find('.code').html());
             //设置商品库存
             group_good.push(num);
             //设置商品单价
             group_good.push(price);
             //console.log(group_good);
             // var formData = new FormData(obj.find('.up_pic')[0]);
             // formData.append('face',obj.find($('.uploads')[0].files[0]));
             //console.log(obj.find($('.uploads')[0].files[0]));
             $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
             });

             $.post('/admin/goods/setdata',{'data':group_good},function(res){
                console.log(res)
               if(res == 0){
                    alert('请确保上传商品图');
                }else{
                    obj.css("backgroundColor", "#b0d8ff");
                }
             })
             //console.log($(this).parent().parent().find('.price').val());
          });

          //上传商品图
          $('.uploads').change(function(){
             //console.log($(this).parent('.up_pic'));
             var formData = new FormData($(this).parent('.up_pic')[0]);
             formData.append('face',$(this)[0].files[0]);
             $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
             });
              $.ajax({
                  url:'/admin/goods/setgroup',
                  type: 'POST',
                  data: formData,
                  //这两个设置项必填
                  contentType: false,
                  processData: false,
                  success:function(data){
                    //console.log(data);
                    if(data == 0){
                        alert('请确保上传商品图');
                    }else{
                        alert('商品图上传成功,请填写完内容按西下一步');
                    }

                  }
            })
          })
    </script>

    <!-- Demo Scripts (remove if not needed) -->

</body>
@section('slid')
@show

</html>
