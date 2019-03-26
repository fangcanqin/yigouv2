<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>首页</title> 
  <link href="/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/hmstyle.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/skin.css" rel="stylesheet" type="text/css" /> 
  <script src="/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script> 
 </head> 
 <body>



  <div class="hmtop" > 

   <div class="am-container header"> 
    <ul class="message-l"> 
     <div class="topMessage"> 
      <div class="menu-hd">
       @if($username != ' ')
        <font>账号:</font><a href="javascript:;" target="_top" class="h" style="color:blue">{{$username}}</a>
        <a href="/home/outlogin" target="_top" class="h" style="color:red">注销</a> 
       @else
        <a href="/home/login/index" target="_top" class="h">亲，请登录</a> 
       @endif
       <a href="/home/register/index" target="_top">免费注册</a> 
      </div> 
     </div> 
    </ul> 
    <ul class="message-r"> 
     <div class="topMessage home"> 
      <div class="menu-hd">
       <a href="index.html" target="_top" class="h">商城首页</a>
      </div> 
     </div> 
     <div class="topMessage my-shangcheng"> 
      <div class="menu-hd MyShangcheng">
       <a href="/home/personal/index" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
      </div> 
     </div> 
     <div class="topMessage mini-cart"> 
      <div class="menu-hd">
       <a id="mc-menu-hd" href="shopcart.html" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a>
      </div> 
     </div> 
     <div class="topMessage favorite"> 
      <div class="menu-hd">
       <a href="collection.html" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a>
      </div> 
     </div>
    </ul> 
   </div> 
   
   <div class="nav white"> 
    <div class="logo">
     <img src="/uploads/images/logo.png" />
    </div> 
    <div class="logoBig"> 
     <li style="margin-top:10px;margin-left:20px;cursor:pointer;"><a href="/home"><img src="/uploads/images/logobigs.png"  style="width:140px"/></a></li> 
    </div> 
    <div class="search-bar pr"> 
     <a name="index_none_header_sysc" href="#"></a> 
     <form style="border-top-right-radius:30px;border-bottom-right-radius:30px;background:#FF5700"> 
      <input id="searchInput" style="padding-left:20px;font-size:15px" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off" /> 
      <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" style="border-top-right-radius:30px;border-bottom-right-radius:30px;outline:none;font-weight:bold"/> 
     </form> 
    </div> 
   </div> 
   <div class="clear"></div> 
  </div> 
  <div class="banner">

   <!--轮播 --> 
   <div class="am-slider am-slider-default scoll" data-am-flexslider="" id="demo-slider-0"> 
    <ul class="am-slides"> 
      @foreach($slid as $k =>$v)
     <li class="banner{{$v->token}}"><a href="{{$v->surl}}"><img src="{{$v->simg}}" /></a></li> 
      @endforeach
    </ul> 
   </div> 
   <div class="clear"></div> 
  </div> 
  <div class="shopNav"> 
   <div class="slideall"> 
    <div class="long-title">
     <span class="all-goods">全部分类</span>
    </div> 
    <div class="nav-cont"> 
     <ul> 
      <li class="index"><a href="/home">首页</a></li> 
      <li class="qc"><a href="#activity">活动</a></li> 
      <li class="qc"><a href="#shopmain">店家推荐</a></li>
     </ul> 
     <div class="nav-extra"> 
      <i class="am-icon-user-secret am-icon-md nav-user"></i>
      <b></b>我的福利 
      <i class="am-icon-angle-right" style="padding-left: 10px;"></i> 
     </div> 
    </div> 
    <!-- 头部结束 --> 
    <!--侧边导航 --> 
    <div id="nav" class="navfull"> 
     <div class="area clearfix"> 
      <div class="category-content" id="guide_2"> 
       <div class="category">

       <!-- 分类开始 -->
        <ul class="category-list" id="js_climit_li"> 
         @foreach($cates as $key => $value)
         
         @if($value->id != 78)
   
        
         <li class="appliance js_toggle relative last"> 
          <div class="category-info"> 
           <h3 class="category-name b-category-name"><i><img src="/uploads/nav/{{$key+1}}.png" /></i><a class="ml-22" title="{{$value->name}}">{{$value->name}}</a></h3> 
           <em>&gt;</em>
          </div> 
          <div class="menu-item menu-in top"> 
           <div class="area-in"> 
            <div class="area-bg"> 
             <div class="menu-srot"> 
              <div class="sort-side"> 
              @foreach($value['show'] as $k1 => $v1 )
               <dl class="dl-sort"> 
                <dt>
                 <span title="{{$v1->name}}">{{$v1->name}}</span>
                </dt> 
                @foreach($v1['show'] as $k2 => $v2)
                <dd>
                 <a title="{{$v2->name}}" href="#"><span>{{$v2->name}}</span></a>
                </dd> 
                @endforeach
               </dl> 
               
               @endforeach
              </div> 
              <div class="brand-side"> 
               <dl class="dl-sort">
                <dt>
                 <span>实力商家</span>
                </dt> 
                <dd>
                 <a title="琳琅鞋业" target="_blank" href="#" rel="nofollow"><span>琳琅鞋业</span></a>
                </dd> 
                <dd>
                 <a title="宏利鞋业" target="_blank" href="#" rel="nofollow"><span>宏利鞋业</span></a>
                </dd> 
                <dd>
                 <a title="比爱靓点鞋业" target="_blank" href="#" rel="nofollow"><span>比爱靓点鞋业</span></a>
                </dd> 
                <dd>
                 <a title="浪人怪怪" target="_blank" href="#" rel="nofollow"><span>浪人怪怪</span></a>
                </dd> 
               </dl>
               
              </div> 
             </div> 
            </div> 
           </div> 
          </div> </li>
          @endif 
          @endforeach
        </ul> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!--轮播--> 
    <script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script> 
    <!--小导航 --> 
    <div class="am-g am-g-fixed smallnav"> 
     <div class="am-u-sm-3"> 
      <a href="sort.html"><img src="/uploads/images/navsmall.jpg" /> 
       <div class="title">
        商品分类
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="/uploads/images/huismall.jpg" /> 
       <div class="title">
        大聚惠
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="/uploads/images/mansmall.jpg" /> 
       <div class="title">
        个人中心
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="/uploads/images/moneysmall.jpg" /> 
       <div class="title">
        投资理财
       </div> </a> 
     </div> 
    </div> 
    <!--走马灯 --> 
    <div class="marqueen"> 
     <span class="marqueen-title">商城头条</span> 
     <div class="demo"> 
      <ul> 
      @foreach($notice as $k => $v)
       <li class="title-first" ><a target="_blank" href="#" style="font-size:10px"> <img src="/uploads/images/TJ2.jpg" /> {{$v->title}}</a></li>
       @endforeach
       <div class="mod-vip"> 
        <div class="m-baseinfo"> 
         <a href="person/index.html">
         @if($userInfo != ' ')
        <img src="{{$userInfo->face}}" /> 
        @else 
        <img src="/uploads/head/mr.jpg" /> 
        @endif
   </a> 
         <em> Hi,<span class="s-name" style="font-size:10px">{{$username == ' '?'小易':$username}}</span> <a href="#"><p>点击更多优惠活动</p></a> </em> 
        </div> 
        <div class="member-logout">
         @if($username != ' ')
         <a class="am-btn-warning btn" href="/home/outlogin">注销</a> 
         @else 
         <a class="am-btn-warning btn" href="/home/login/index">登录</a> 
         @endif
         
         <a class="am-btn-warning btn" href="/home/register/index">注册</a> 
        </div> 
        <div class="member-login"> 
         <a href="#"><strong>0</strong>待收货</a> 
         <a href="#"><strong>0</strong>待发货</a> 
         <a href="#"><strong>0</strong>待付款</a> 
         <a href="#"><strong>0</strong>待评价</a> 
        </div> 
        <div class="clear"></div> 
       </div> 
       <li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li> 
       <li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li> 
       <li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li> 
      </ul> 
      <div class="advTip">
       <img src="/uploads/images/advTip.jpg" />
      </div> 
     </div> 
    </div> 
    <div class="clear"></div> 
   </div> 
   <script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script> 
  </div> 
  <div class="shopMainbg"> 
   <div class="shopMain" id="shopmain"> 
    <!--今日推荐 --> 
    <div class="am-g am-g-fixed recommendation"> 
     <div class="clock am-u-sm-3" ""> 
      <img src="/uploads/images/2016.png " /> 
      <p>今日<br />推荐</p> 
     </div> 
     <div class="am-u-sm-4 am-u-lg-3 "> 
      <div class="info "> 
       <h3>真的有鱼</h3> 
       <h4>开年福利篇</h4> 
      </div> 
      <div class="recommendationMain one"> 
       <a href="introduction.html"><img src="/uploads/images/tj.png " /></a> 
      </div> 
     </div> 
     <div class="am-u-sm-4 am-u-lg-3 "> 
      <div class="info "> 
       <h3>囤货过冬</h3> 
       <h4>让爱早回家</h4> 
      </div> 
      <div class="recommendationMain two"> 
       <img src="/uploads/images/tj1.png " /> 
      </div> 
     </div> 
     <div class="am-u-sm-4 am-u-lg-3 "> 
      <div class="info "> 
       <h3>浪漫情人节</h3> 
       <h4>甜甜蜜蜜</h4> 
      </div> 
      <div class="recommendationMain three"> 
       <img src="/uploads/images/tj2.png " /> 
      </div> 
     </div> 
    </div> 
    <div class="clear "></div> 
    <!--热门活动 --> 
    <div class="am-container activity "> 
     <div class="shopTitle " id="activity"> 
      <h4>活动</h4> 
      <h3>美味让你意犹未尽 给你的味蕾一点刺激吧 </h3> 
      <span class="more "> <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a> </span> 
     </div> 

     <div class="am-g am-g-fixed "> 

     <!-- 活动开始 -->
     @foreach($huodong as $k => $v)
      <div class="am-u-sm-3 "> 
       <div class="icon-sale one "></div> 
       <h4>{{$v->name}}</h4> 
       <div class="activityMain "> 
        <a href=""><img src="/uploads/huodong/{{$k+1}}.jpg " /> </a>
       </div> 
      <!--  <div class="info "> 
        <h3>健康美味 活动不停</h3> 
       </div>  -->
      </div>
      @endforeach 
     <!--  <div class="am-u-sm-3 "> 
       <div class="icon-sale two "></div> 
       <h4>特惠</h4> 
       <div class="activityMain "> 
        <img src="/uploads/images/activity2.jpg " /> 
       </div> 
       <div class="info "> 
        <h3>春节送礼优选</h3> 
       </div> 
      </div> 
      <div class="am-u-sm-3 "> 
       <div class="icon-sale three "></div> 
       <h4>团购</h4> 
       <div class="activityMain "> 
        <img src="/uploads/images/activity3.jpg " /> 
       </div> 
       <div class="info "> 
        <h3>春节送礼优选</h3> 
       </div> 
      </div> 
      <div class="am-u-sm-3 last "> 
       <div class="icon-sale "></div> 
       <h4>超值</h4> 
       <div class="activityMain "> 
        <img src="/uploads/images/activity.jpg " /> 
       </div> 
       <div class="info "> 
        <h3>春节送礼优选</h3> 
       </div> 
      </div>  -->

     </div> 

    </div> 
    <div class="clear "></div>

  <div id="f1">
  <!-- 点心/蛋糕 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>点心/蛋糕</h4>
      <h3>每一款点心/蛋糕都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two as $cake_two_k => $cake_two_v)
        <a href="# ">{{$cake_two_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two as $cake_two_k2 => $cake_two_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake as $cake_k => $cake_v)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v->id}}" >
        <img src="{{$cake_v['detail']->pic}}" /></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>


<div id="f2">
  <!-- 饼干/膨化 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>饼干/膨化</h4>
      <h3>每一款饼干/膨化都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two2 as $cake_two2_k => $cake_two2_v)
        <a href="# ">{{$cake_two2_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two2 as $cake_two2_k2 => $cake_two2_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two2_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake2 as $cake_k2 => $cake_v2)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v2->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v2['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v2->id}}">
        <img src="{{$cake_v2['detail']->pic}}" /></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>

<div id="f3">
  <!-- 熟食/肉类 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>熟食/肉类</h4>
      <h3>每一款熟食/肉类都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two3 as $cake_two3_k => $cake_two3_v)
        <a href="# ">{{$cake_two3_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two3 as $cake_two3_k2 => $cake_two3_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two3_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake3 as $cake_k3 => $cake_v3)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v3->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v3['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v3->id}}">
        <img src="{{$cake_v3['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>


<div id="f4">
  <!-- 糖果/蜜饯 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>糖果/蜜饯</h4>
      <h3>每一款糖果/蜜饯都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two4 as $cake_two4_k => $cake_two4_v)
        <a href="# ">{{$cake_two4_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two4 as $cake_two4_k2 => $cake_two4_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two4_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake4 as $cake_k4 => $cake_v4)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v4->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v4['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v4->id}}">
        <img src="{{$cake_v4['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>

<div id="f5">
  <!-- 素食/卤味 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>素食/卤味</h4>
      <h3>每一款熟食/肉类都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two5 as $cake_two5_k => $cake_two5_v)
        <a href="# ">{{$cake_two5_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two5 as $cake_two5_k2 => $cake_two5_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two5_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake5 as $cake_k5 => $cake_v5)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v5->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v5['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v5->id}}">
        <img src="{{$cake_v5['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>

<div id="f6">
  <!-- 巧克力 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>巧克力</h4>
      <h3>每一款巧克力都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two6 as $cake_two6_k => $cake_two6_v)
        <a href="# ">{{$cake_two6_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two6 as $cake_two6_k2 => $cake_two6_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two6_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake6 as $cake_k6 => $cake_v6)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v6->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v6['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v6->id}}">
        <img src="{{$cake_v6['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>


<div id="f7">
  <!-- 坚果/炒货 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>坚果/炒货</h4>
      <h3>每一款坚果/炒货都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two7 as $cake_two7_k => $cake_two7_v)
        <a href="# ">{{$cake_two7_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two7 as $cake_two7_k2 => $cake_two7_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two7_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake7 as $cake_k7 => $cake_v7)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v7->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v7['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v7->id}}">
        <img src="{{$cake_v7['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>


<div id="f8">
  <!-- 品牌/礼包 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>品牌/礼包</h4>
      <h3>每一款品牌/礼包都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two8 as $cake_two8_k => $cake_two8_v)
        <a href="# ">{{$cake_two8_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two8 as $cake_two8_k2 => $cake_two8_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two8_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake8 as $cake_k8 => $cake_v8)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v8->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v8['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v8->id}}">
        <img src="{{$cake_v8['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>

<div id="f9">
  <!-- 海味/河鲜 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>海味/河鲜</h4>
      <h3>每一款海味/河鲜都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two9 as $cake_two9_k => $cake_two9_v)
        <a href="# ">{{$cake_two9_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two9 as $cake_two9_k2 => $cake_two9_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two9_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake9 as $cake_k9 => $cake_v9)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v9->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v9['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v9->id}}">
        <img src="{{$cake_v9['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>
<div id="f10">
  <!-- 花茶/果茶 -->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>花茶/果茶</h4>
      <h3>每一款花茶/果茶都有一个故事</h3>
      <div class="today-brands ">
      @foreach($cake_two10 as $cake_two10_k => $cake_two10_v)
        <a href="# ">{{$cake_two10_v->name}}</a>
      @endforeach
        </div>
      <span class="more ">
        <a href="#">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        @foreach($cake_two10 as $cake_two10_k2 => $cake_two10_v2)
        <a class="outer" href="#" >
          <span class="inner">
            <b class="text" style="font-size:12px;color:#ccc;font-weight:bold">{{$cake_two10_v2->name}}</b></span>
        </a>
        @endforeach
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="/uploads/images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>

    @foreach($cake10 as $cake_k10 => $cake_v10)
   
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">{{$cake_v10->name}}</div>
        <div class="sub-title" style="color:red;font-size:16px;font-weight:bold">¥ {{$cake_v10['detail']->price}}</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="/home/introduction/index/{{$cake_v10->id}}">
        <img src="{{$cake_v10['detail']->pic}}"  style="height:180px"/></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>

    <div class="footer "> 
     <div class="footer-hd "> 
      <p> <a href="/home">恒望科技</a> <b>|</b> <a href="/home">商城首页</a> <b>|</b> <a href="# ">支付宝</a> <b>|</b> <a href="# ">物流</a> </p> 
     </div> 
     <div class="footer-bd "> 
      <p> <a href="# ">关于恒望</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有</em> </p> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--引导 --> 
  <div class="navCir"> 
   <li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li> 
   <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li> 
   <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li> 
   <li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li> 
  </div> 
  <!--菜单 --> 
   @extends('home.public_sidebar.sidebar')
  <script>
			window.jQuery || document.write('<script src="/basic/js/jquery.min.js "><\/script>');
		</script> 
  <script type="text/javascript " src="/basic/js/quick_links.js "></script>  
 </body>
 <script>
  $('#searchInput').focus();
 </script>
 <script>


 </script>
</html>