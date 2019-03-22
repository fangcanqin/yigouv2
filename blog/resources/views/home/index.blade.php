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
   <!--顶部导航条 --> 
   <div class="am-container header"> 
    <ul class="message-l"> 
     <div class="topMessage"> 
      <div class="menu-hd"> 
       <a href="/home/login/index" target="_top" class="h">亲，请登录</a> 
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
       <a href="个人中心.html" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
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
   <!--悬浮搜索框--> 
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
         <a href="person/index.html"> <img src="/uploads/images/getAvatar.do.jpg" /> </a> 
         <em> Hi,<span class="s-name">小易</span> <a href="#"><p>点击更多优惠活动</p></a> </em> 
        </div> 
        <div class="member-logout"> 
         <a class="am-btn-warning btn" href="/home/login/index">登录</a> 
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
      <a href="/home/introduction/index/{{$cake_v->id}}">
        <img src="{{$cake_v['detail']->pic}}" /></a>
    </div> 
    @endforeach

  </div>
  <div class="clear "></div>
</div>


<div id="f2">
  <!--坚果-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>坚果</h4>
      <h3>酥酥脆脆，回味无穷</h3>
      <div class="today-brands ">
        <a href="# ">腰果</a>
        <a href="# ">松子</a>
        <a href="# ">夏威夷果</a>
        <a href="# ">碧根果</a>
        <a href="# ">开心果</a>
        <a href="# ">核桃仁</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodThree ">
    <div class="am-u-sm-4 text-four list">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <img src="images/act1.png " />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div></div>
      </a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-4 text-four">
      <a href="# ">
        <img src="images/6.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-4 text-four sug">
      <a href="# ">
        <img src="images/7.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big ">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five ">
      <a href="# ">
        <img src="images/8.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five sug">
      <a href="# ">
        <img src="images/9.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f3">
  <!--甜点-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>甜品</h4>
      <h3>每一道甜品都有一个故事</h3>
      <div class="today-brands ">
        <a href="# ">桂花糕</a>
        <a href="# ">奶皮酥</a>
        <a href="# ">栗子糕</a>
        <a href="# ">马卡龙</a>
        <a href="# ">铜锣烧</a>
        <a href="# ">豌豆黄</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two sug">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/2.jpg" /></a>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/1.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three big">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three sug">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/3.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/4.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three last big ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f4">
  <!--坚果-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>坚果</h4>
      <h3>酥酥脆脆，回味无穷</h3>
      <div class="today-brands ">
        <a href="# ">腰果</a>
        <a href="# ">松子</a>
        <a href="# ">夏威夷果</a>
        <a href="# ">碧根果</a>
        <a href="# ">开心果</a>
        <a href="# ">核桃仁</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodThree ">
    <div class="am-u-sm-4 text-four list">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <img src="images/act1.png " />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div></div>
      </a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-4 text-four">
      <a href="# ">
        <img src="images/6.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-4 text-four sug">
      <a href="# ">
        <img src="images/7.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big ">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five ">
      <a href="# ">
        <img src="images/8.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five sug">
      <a href="# ">
        <img src="images/9.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f5">
  <!--甜点-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>甜品</h4>
      <h3>每一道甜品都有一个故事</h3>
      <div class="today-brands ">
        <a href="# ">桂花糕</a>
        <a href="# ">奶皮酥</a>
        <a href="# ">栗子糕</a>
        <a href="# ">马卡龙</a>
        <a href="# ">铜锣烧</a>
        <a href="# ">豌豆黄</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two sug">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/2.jpg" /></a>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/1.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three big">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three sug">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/3.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/4.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three last big ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f6">
  <!--坚果-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>坚果</h4>
      <h3>酥酥脆脆，回味无穷</h3>
      <div class="today-brands ">
        <a href="# ">腰果</a>
        <a href="# ">松子</a>
        <a href="# ">夏威夷果</a>
        <a href="# ">碧根果</a>
        <a href="# ">开心果</a>
        <a href="# ">核桃仁</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodThree ">
    <div class="am-u-sm-4 text-four list">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <img src="images/act1.png " />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div></div>
      </a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-4 text-four">
      <a href="# ">
        <img src="images/6.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-4 text-four sug">
      <a href="# ">
        <img src="images/7.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big ">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five ">
      <a href="# ">
        <img src="images/8.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five sug">
      <a href="# ">
        <img src="images/9.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f7">
  <!--甜点-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>甜品</h4>
      <h3>每一道甜品都有一个故事</h3>
      <div class="today-brands ">
        <a href="# ">桂花糕</a>
        <a href="# ">奶皮酥</a>
        <a href="# ">栗子糕</a>
        <a href="# ">马卡龙</a>
        <a href="# ">铜锣烧</a>
        <a href="# ">豌豆黄</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two sug">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/2.jpg" /></a>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/1.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three big">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three sug">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/3.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/4.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three last big ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f8">
  <!--坚果-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>坚果</h4>
      <h3>酥酥脆脆，回味无穷</h3>
      <div class="today-brands ">
        <a href="# ">腰果</a>
        <a href="# ">松子</a>
        <a href="# ">夏威夷果</a>
        <a href="# ">碧根果</a>
        <a href="# ">开心果</a>
        <a href="# ">核桃仁</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodThree ">
    <div class="am-u-sm-4 text-four list">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <img src="images/act1.png " />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div></div>
      </a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-4 text-four">
      <a href="# ">
        <img src="images/6.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-4 text-four sug">
      <a href="# ">
        <img src="images/7.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big ">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five ">
      <a href="# ">
        <img src="images/8.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five sug">
      <a href="# ">
        <img src="images/9.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f9">
  <!--甜点-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>甜品</h4>
      <h3>每一道甜品都有一个故事</h3>
      <div class="today-brands ">
        <a href="# ">桂花糕</a>
        <a href="# ">奶皮酥</a>
        <a href="# ">栗子糕</a>
        <a href="# ">马卡龙</a>
        <a href="# ">铜锣烧</a>
        <a href="# ">豌豆黄</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodFour">
    <div class="am-u-sm-5 am-u-md-4 text-one list ">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <div class="outer-con ">
          <div class="title ">开抢啦！</div>
          <div class="sub-title ">零食大礼包</div></div>
        <img src="images/act1.png " /></a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two sug">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/2.jpg" /></a>
    </div>
    <div class="am-u-sm-7 am-u-md-4 text-two">
      <div class="outer-con ">
        <div class="title ">雪之恋和风大福</div>
        <div class="sub-title ">¥13.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/1.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three big">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three sug">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/3.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/4.jpg" /></a>
    </div>
    <div class="am-u-sm-3 am-u-md-2 text-three last big ">
      <div class="outer-con ">
        <div class="title ">小优布丁</div>
        <div class="sub-title ">¥4.8</div>
        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
      </div>
      <a href="# ">
        <img src="images/5.jpg" /></a>
    </div>
  </div>
  <div class="clear "></div>
</div>
<div id="f10">
  <!--坚果-->
  <div class="am-container ">
    <div class="shopTitle ">
      <h4>坚果</h4>
      <h3>酥酥脆脆，回味无穷</h3>
      <div class="today-brands ">
        <a href="# ">腰果</a>
        <a href="# ">松子</a>
        <a href="# ">夏威夷果</a>
        <a href="# ">碧根果</a>
        <a href="# ">开心果</a>
        <a href="# ">核桃仁</a></div>
      <span class="more ">
        <a href="# ">更多美味
          <i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
      </span>
    </div>
  </div>
  <div class="am-g am-g-fixed floodThree ">
    <div class="am-u-sm-4 text-four list">
      <div class="word">
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
        <a class="outer" href="#">
          <span class="inner">
            <b class="text">核桃</b></span>
        </a>
      </div>
      <a href="# ">
        <img src="images/act1.png " />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div></div>
      </a>
      <div class="triangle-topright"></div>
    </div>
    <div class="am-u-sm-4 text-four">
      <a href="# ">
        <img src="images/6.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-4 text-four sug">
      <a href="# ">
        <img src="images/7.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big ">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five ">
      <a href="# ">
        <img src="images/8.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five sug">
      <a href="# ">
        <img src="images/9.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
    <div class="am-u-sm-6 am-u-md-3 text-five big">
      <a href="# ">
        <img src="images/10.jpg" />
        <div class="outer-con ">
          <div class="title ">雪之恋和风大福</div>
          <div class="sub-title ">¥13.8</div>
          <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
        </div>
      </a>
    </div>
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