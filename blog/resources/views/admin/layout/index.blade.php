
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
                	<img src="/admin_template/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, 管理员
                    </div>
                    <ul>
                    	<li><a href="#">头像上传</a></li>
                        <li><a href="#">修改密码</a></li>
                        <li><a href="index.html">退出</a></li>
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
                        <a href="#"><i class="icon-print"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/cates"><i class="icon-chevron-right"></i> 分类列表</a></li>
                            <li><a href="/admin/cates/create"><i class="icon-chevron-right"></i> 分类添加</a></li>
                        </ul>
                    </li>











                    <li class="active">
                        <a href="#"><i class="icon-print"></i> 轮播图管理</a>
                        <ul>
                            <li><a href="/admin/slid"><i class="icon-chevron-right"></i> 轮播图列表</a></li>
                            <li><a href="/admin/slid/create"><i class="icon-chevron-right"></i> 轮播图添加</a></li>
                        </ul>
                    </li>
                </ul>
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
   

    <!-- Demo Scripts (remove if not needed) -->

</body>
@section('slid')
@show
</html>
