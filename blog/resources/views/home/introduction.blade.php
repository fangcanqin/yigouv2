<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>商品页面</title> 
  <link href="/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link type="text/css" href="/css/optstyle.css" rel="stylesheet" /> 
  <link type="text/css" href="/css/style.css" rel="stylesheet" /> 
  <script type="text/javascript" src="/basic/js/jquery-1.7.min.js"></script> 
  <script type="text/javascript" src="/basic/js/quick_links.js"></script> 
  <script type="text/javascript" src="/AmazeUI-2.4.2/assets/js/amazeui.js"></script> 
  <script type="text/javascript" src="/js/jquery.imagezoom.min.js"></script> 
  <script type="text/javascript" src="/js/jquery.flexslider.js"></script> 
  <script type="text/javascript" src="/js/list.js"></script> 
 </head> 
 <body> 
  <!--顶部导航条 --> 
  <div class="am-container header"> 
   <ul class="message-l"> 
    <div class="topMessage"> 
     <div class="menu-hd"> 
      <a href="login.html" target="_top" class="h">亲，请登录</a> 
      <a href="register.html" target="_top">免费注册</a> 
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
    <li><img src="/uploads/images/logobig.png" /></li> 
   </div> 
   <div class="search-bar pr"> 
    <a name="index_none_header_sysc" href="#"></a> 
    <form> 
     <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off" /> 
     <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" /> 
    </form> 
   </div> 
  </div> 
  <div class="clear"></div> 
  <b class="line"></b> 
  <div class="listMain"> 
   <!--分类--> 
   <div class="nav-table"> 
    <div class="long-title">
     <span class="all-goods">全部分类</span>
    </div> 
    <div class="nav-cont"> 
     <ul> 
      <li class="index"><a href="index.html">首页</a></li> 
      <li class="qc"><a href="#">闪购</a></li> 
      <li class="qc"><a href="#">限时抢</a></li> 
      <li class="qc"><a href="#">团购</a></li> 
      <li class="qc last"><a href="#">大包装</a></li> 
     </ul> 
     <div class="nav-extra"> 
      <i class="am-icon-user-secret am-icon-md nav-user"></i>
      <b></b>我的福利 
      <i class="am-icon-angle-right" style="padding-left: 10px;"></i> 
     </div> 
    </div> 
   </div> 
   <!-- 头部开始 --> 
   <ol class="am-breadcrumb am-breadcrumb-slash"> 
    <li><a href="index.html">首页</a></li> 
    <li><a href="search.html">分类</a></li> 
    <li class="am-active">内容</li> 
   </ol> 
   <script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script> 
   <div class="scoll"> 
    <section class="slider"> 
     <div class="flexslider"> 
      <ul class="slides"> 
       <li> <img src="/uploads/images/01.jpg" title="pic" /> </li> 
       <li> <img src="/uploads/images/02.jpg" /> </li> 
       <li> <img src="/uploads/images/03.jpg" /> </li> 
      </ul> 
     </div> 
    </section> 
   </div> 
   <!--放大镜--> 
   <div class="item-inform"> 
    <div class="clearfixLeft" id="clearcontent"> 
     <div class="box"> 
      <script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script> 
      <div class="tb-booth tb-pic tb-s310"> 
      <!-- 放大镜 -->
      @foreach($good_group as $good_group_k2 => $good_group_v2)
      @if($good_group_k2 == 0)
       <a href="/uploads/images/01.jpg"><img src="{{$good_group_v2->pic}}" alt="细节展示放大镜特效" rel="/uploads/images/01.jpg" class="jqzoom" /></a>
       @endif
       @endforeach
      </div> 
      <ul class="tb-thumb" id="thumblist"> 
       @foreach($good_group as $good_group_k3 => $good_group_v3)
       <li class="tb-selected"> 
        <div class="tb-pic tb-s40"> 
         <a href="#"><img src="{{$good_group_v3->pic}}" mid="{{$good_group_v3->pic}}" big="{{$good_group_v3->pic}}" /></a> 
        </div> 
        </li>
         @endforeach
      </ul> 
     </div> 
     <div class="clear"></div> 
    </div> 
    <div class="clearfixRight"> 
     <!--规格属性--> 
     <!--名称--> 
     <div class="tb-detail-hd">
      <h1 id="good_name">{{$good->name}}</h1> 
     </div> 
     <div class="tb-detail-list"> 
      <!--价格--> 
      <div class="tb-detail-price" style="height:140px"> 
       <li class="price iteminfo_price"> 
        <dt>
         促销价
        </dt> 
        <dd>
         <em>&yen;</em>
         <b class="sys_item_price" id="good_price">加载中...</b> 
        </dd> </li>
         
       <li class="price iteminfo_mktprice"> 
        <dt>
         合计
        </dt> 
        <dd>
         <em>&yen;</em>
         <b class="sys_item_price" id="good_heji">加载中...</b> 
        </dd> </li>  
       <li class="price iteminfo_mktprice"> 
        <dt>
         原价
        </dt> 
        <dd>
         <em>&yen;</em>
         <b class="sys_item_mktprice" id="yuanjia">加载中...</b>
        </dd> </li> 
       <div class="clear"></div> 
      </div> 
      <!--地址--> 
     <!--  <dl class="iteminfo_parameter freight"> 
       <dt>
        配送至
       </dt> 
       <div class="iteminfo_freprice"> 
        <div class="am-form-content address"> 
         <select data-am-selected=""> <option value="a">浙江省</option> <option value="b">湖北省</option> </select> 
         <select data-am-selected=""> <option value="a">温州市</option> <option value="b">武汉市</option> </select> 
         <select data-am-selected=""> <option value="a">瑞安区</option> <option value="b">洪山区</option> </select> 
        </div> 
        <div class="pay-logis">
          快递
         <b class="sys_item_freprice">10</b>元 
        </div> 
       </div> 
      </dl>  -->
      <div class="clear"></div> 
      <!--销量--> 
      <ul class="tm-ind-panel"> 
       <li class="tm-ind-item tm-ind-sellCount canClick"> 
        <div class="tm-indcon">
         <span class="tm-label">月销量</span>
         <span class="tm-count">1015</span>
        </div> </li> 
       <li class="tm-ind-item tm-ind-sumCount canClick"> 
        <div class="tm-indcon">
         <span class="tm-label">累计销量</span>
         <span class="tm-count">6015</span>
        </div> </li> 
       <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3"> 
        <div class="tm-indcon">
         <span class="tm-label">累计评价</span>
         <span class="tm-count">640</span>
        </div> </li> 
      </ul> 
      <div class="clear"></div> 
      <!--各种规格--> 
      <dl class="iteminfo_parameter sys_item_specpara"> 
       <dt class="theme-login">
        <div class="cart-title">
         可选规格
         <span class="am-icon-angle-right"></span>
        </div>
       </dt> 
       <dd> 
        <!--操作页面--> 
        <div class="theme-popover-mask"></div> 
        <div class="theme-popover"> 
         <div class="theme-span"></div> 
         <div class="theme-poptit"> 
          <a href="javascript:;" title="关闭" class="close">&times;</a> 
         </div> 
         <div class="theme-popbod dform"> 
          <form class="theme-signin" name="loginform" action="" method="post"> 
           <div class="theme-signin-left"> 
            <div class="theme-options"> 
             <div class="cart-title">
              口味
             </div> 
             <ul> 
             @foreach($good_group as $good_group_k => $good_group_v)
              <li class="sku-line kouwei" id="kouwei{{$good_group_k}}"  >{{$good_group_v->group}}</li> 
              @endforeach
             </ul> 
            </div> 
          <!--   <div class="theme-options"> 
             <div class="cart-title">
              包装
             </div> 
             <ul> 
              <li class="sku-line selected">手袋单人份<i></i></li> 
              <li class="sku-line">礼盒双人份<i></i></li> 
              <li class="sku-line">全家福礼包<i></i></li> 
             </ul> 
            </div>  -->
            <div class="theme-options"> 
             <div class="cart-title number">
              数量
             </div> 
             <dd> 
              <input id="min" class="am-btn am-btn-default" onclick="heji(-1)" name="" type="button" value="-" /> 
              <input id="text_box" name="" type="text" value="1" style="width:30px;" /> 
              <input id="add" class="am-btn am-btn-default" onclick="heji(+1)" name="" type="button" value="+" /> 
              <span id="Stock" class="tb-hidden">库存<span class="stock" id="kucun">加载中...</span>件</span> 
             </dd> 
            </div> 
            <div class="clear"></div> 
            <div class="btn-op"> 
             <div class="btn am-btn am-btn-warning">
              确认
             </div> 
             <div class="btn close am-btn am-btn-warning">
              取消
             </div> 
            </div> 
           </div> 
           <div class="theme-signin-right"> 
            <div class="img-info"> 
             <img src="/uploads/images/songzi.jpg" /> 
            </div> 
            <div class="text-info"> 
             <span class="J_Price price-now">&yen;39.00</span> 
             <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span> 
            </div> 
           </div> 
          </form> 
         </div> 
        </div> 
       </dd> 
      </dl> 
      <div class="clear"></div> 
      <!--活动	--> 
      <div class="shopPromotion gold"> 
       <div class="hot"> 
        <dt class="tb-metatit">
       		商品描述
        </dt> 
        <div class="gold-list"> 
         <p>{{$good->descr}}<span>折扣价<i class="am-icon-sort-down"></i></span></p> 
        </div> 
       </div> 
       <div class="clear"></div> 
       <div class="coupon"> 
        <dt class="tb-metatit">
         优惠券
        </dt> 
        <div class="gold-list"> 
         <ul> 
          <li>125减5</li> 
          <li>198减10</li> 
          <li>298减20</li> 
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="pay"> 
      <div class="pay-opt"> 
       <a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a> 
       <a><span class="am-icon-heart am-icon-fw">收藏</span></a> 
      </div> 
      <li> 
       <div class="clearfix tb-btn tb-btn-buy theme-login"> 
        <a id="LikBuy" title="点此按钮到下一步确认购买信息" href="#">立即购买</a> 
       </div> </li> 
      <li> 
       <div class="clearfix tb-btn tb-btn-basket theme-login"> 
        <a id="LikBasket" title="加入购物车" href="javascript:;"><i></i>加入购物车</a> 
       </div> </li> 
     </div> 
    </div> 
    <div class="clear"></div> 
   </div> 
   <!--优惠套装--> 
   <div class="match"> 
    <div class="match-title">
     优惠套装
    </div> 
    <div class="match-comment"> 
     <ul class="like_list"> 
      <li> 
       <div class="s_picBox"> 
        <a class="s_pic" href="#"><img src="/uploads/images/cp.jpg" /></a> 
       </div> <a class="txt" target="_blank" href="#">萨拉米 1+1小鸡腿</a> 
       <div class="info-box"> 
        <span class="info-box-price">&yen; 29.90</span> 
        <span class="info-original-price">￥ 199.00</span> 
       </div> </li> 
      <li class="plus_icon"><i>+</i></li> 
      <li> 
       <div class="s_picBox"> 
        <a class="s_pic" href="#"><img src="/uploads/images/cp2.jpg" /></a> 
       </div> <a class="txt" target="_blank" href="#">ZEK 原味海苔</a> 
       <div class="info-box"> 
        <span class="info-box-price">&yen; 8.90</span> 
        <span class="info-original-price">￥ 299.00</span> 
       </div> </li> 
      <li class="plus_icon"><i>=</i></li> 
      <li class="total_price"> <p class="combo_price"><span class="c-title">套餐价:</span><span>￥35.00</span> </p> <p class="save_all">共省:<span>￥463.00</span></p> <a href="#" class="buy_now">立即购买</a> </li> 
      <li class="plus_icon"><i class="am-icon-angle-right"></i></li> 
     </ul> 
    </div> 
   </div> 
   <div class="clear"></div> 
   <!-- introduce--> 
   <div class="introduce"> 
    <div class="browse"> 
     <div class="mc"> 
      <ul> 
       <div class="mt"> 
        <h2>看了又看</h2> 
       </div> 
       @foreach($look as $look_k => $look_v)
       @if($look_v->id != $id)
       <li class="first"> 
        <div class="p-img"> 
         <a href="#"> <img class="" src="{{$look_v['detail']->pic}}" /> </a> 
        </div> 
        <div class="p-name">
         <a href="#"> 【{{$look_v->name}}】 {{$look_v->descr}}</a> 
        </div> 
        <div class="p-price">
         <strong>￥35.90</strong>
        </div> 
        </li>
        @endif
        @endforeach
      </ul> 
     </div> 
    </div> 
    <div class="introduceMain"> 
     <div class="am-tabs" data-am-tabs=""> 
      <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs"> 
       <li class="am-active"> <a href="#"> <span class="index-needs-dt-txt">宝贝详情</span></a> </li> 
       <li> <a href="#"> <span class="index-needs-dt-txt">全部评价</span></a> </li> 
       <li> <a href="#"> <span class="index-needs-dt-txt">猜你喜欢</span></a> </li> 
      </ul> 
      <div class="am-tabs-bd"> 
       <div class="am-tab-panel am-fade am-in am-active"> 
        <div class="J_Brand"> 
         <div class="attr-list-hd tm-clear"> 
          <h4>产品参数：</h4>
         </div> 
         <div class="clear"></div> 
         <ul id="J_AttrUL"> 
          <li title="">产品类型:&nbsp;{{$good_details->type}}</li> 
          <li title="">产地:&nbsp;{{$good_details->region}}</li> 
          <li title="">配料表:&nbsp;{{$good_details->batching}}</li> 
          <li title="">产品规格:&nbsp;{{$good_details->size}}</li> 
          <li title="">保质期:&nbsp;{{$good_details->period}}</li> 
          <li title="">产品标准号:&nbsp;{{$good_details->number}}</li> 
          <li title="">储存方法：&nbsp;{{$good_details->method}}</li> 
         </ul> 
         <div class="clear"></div> 
        </div> 
        <div class="details"> 
         <div class="attr-list-hd after-market-hd"> 
          <h4>商品细节</h4> 
         </div> 
         <div class="twlistNews"> 
          @foreach($good_group as $good_group_k4 => $good_group_v4)
          <img src="{{$good_group_v4->pic}}" /> 
 		  @endforeach
         </div> 
        </div> 
        <div class="clear"></div> 
       </div> 
       <div class="am-tab-panel am-fade"> 
        <div class="actor-new"> 
         <div class="rate"> 
          <strong>100<span>%</span></strong>
          <br /> 
          <span>好评度</span> 
         </div> 
         <dl> 
          <dt>
           买家印象
          </dt> 
          <dd class="p-bfc"> 
           <q class="comm-tags"><span>味道不错</span><em>(2177)</em></q> 
           <q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q> 
           <q class="comm-tags"><span>口感好</span><em>(1823)</em></q> 
           <q class="comm-tags"><span>商品不错</span><em>(1689)</em></q> 
           <q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q> 
           <q class="comm-tags"><span>个个开口</span><em>(1392)</em></q> 
           <q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q> 
           <q class="comm-tags"><span>特价买的</span><em>(865)</em></q> 
           <q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
          </dd> 
         </dl> 
        </div> 
        <div class="clear"></div> 
        <div class="tb-r-filter-bar"> 
         <ul class=" tb-taglist am-avg-sm-4"> 
          <li class="tb-taglist-li tb-taglist-li-current"> 
           <div class="comment-info"> 
            <span>全部评价</span> 
            <span class="tb-tbcr-num">(32)</span> 
           </div> </li> 
          <li class="tb-taglist-li tb-taglist-li-1"> 
           <div class="comment-info"> 
            <span>好评</span> 
            <span class="tb-tbcr-num">(32)</span> 
           </div> </li> 
          <li class="tb-taglist-li tb-taglist-li-0"> 
           <div class="comment-info"> 
            <span>中评</span> 
            <span class="tb-tbcr-num">(32)</span> 
           </div> </li> 
          <li class="tb-taglist-li tb-taglist-li--1"> 
           <div class="comment-info"> 
            <span>差评</span> 
            <span class="tb-tbcr-num">(32)</span> 
           </div> </li> 
         </ul> 
        </div> 
        <div class="clear"></div> 
        <ul class="am-comments-list am-comments-list-flip"> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月02日 17:46</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！ 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：S 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">l***4 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年10月28日 11:33</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255095758792"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               没有色差，很暖和……美美的 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月02日 17:46</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！ 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：S 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">h***n (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月25日 12:48</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="258040417670"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               式样不错，初冬穿 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：L 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月02日 17:46</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！ 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：S 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">l***4 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年10月28日 11:33</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255095758792"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               没有色差，很暖和……美美的 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月02日 17:46</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！ 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：S 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">h***n (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月25日 12:48</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="258040417670"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               式样不错，初冬穿 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：L 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月02日 17:46</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！ 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：S 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">l***4 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年10月28日 11:33</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255095758792"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               没有色差，很暖和……美美的 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月02日 17:46</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！ 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：S 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="/uploads/images/hwbn40x40.jpg" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">h***n (匿名)</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">2015年11月25日 12:48</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="258040417670"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               式样不错，初冬穿 
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：柠檬黄&nbsp;&nbsp;尺码：L 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
        </ul> 
        <div class="clear"></div> 
        <!--分页 --> 
        <ul class="am-pagination am-pagination-right"> 
         <li class="am-disabled"><a href="#">&laquo;</a></li> 
         <li class="am-active"><a href="#">1</a></li> 
         <li><a href="#">2</a></li> 
         <li><a href="#">3</a></li> 
         <li><a href="#">4</a></li> 
         <li><a href="#">5</a></li> 
         <li><a href="#">&raquo;</a></li> 
        </ul> 
        <div class="clear"></div> 
        <div class="tb-reviewsft"> 
         <div class="tb-rate-alert type-attention">
          购买前请查看该商品的 
          <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。
         </div> 
        </div> 
       </div> 
       <div class="am-tab-panel am-fade"> 
        <div class="like"> 
         <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes"> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
          <li> 
           <div class="i-pic limit"> 
            <img src="/uploads/images/imgsearch1.jpg" /> 
            <p>【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>298.00</strong> </p> 
           </div> </li> 
         </ul> 
        </div> 
        <div class="clear"></div> 
        <!--分页 --> 
        <ul class="am-pagination am-pagination-right"> 
         <li class="am-disabled"><a href="#">&laquo;</a></li> 
         <li class="am-active"><a href="#">1</a></li> 
         <li><a href="#">2</a></li> 
         <li><a href="#">3</a></li> 
         <li><a href="#">4</a></li> 
         <li><a href="#">5</a></li> 
         <li><a href="#">&raquo;</a></li> 
        </ul> 
        <div class="clear"></div> 
       </div> 
      </div> 
     </div> 
     <div class="clear"></div> 
     <!-- 尾部开始 --> 
     <div class="footer"> 
      <div class="footer-hd"> 
       <p> <a href="/home">易购科技</a> <b>|</b> <a href="/home">商城首页</a> <b>|</b> <a href="#">支付宝</a> <b>|</b> <a href="#">物流</a> </p> 
      </div> 
      <div class="footer-bd"> 
       <p> <a href="/home">关于恒望</a> <a href="#">合作伙伴</a> <a href="#">联系我们</a> <a href="#">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有</em> </p> 
      </div> 
     </div> 
    </div>
    <input type="hidden" value="{{$id}}" id="good_id">
   </div> 
  </div> 
  <!--菜单 --> 
 @extends('home.public_sidebar.sidebar')
 </body>
 <script>
 $(document).ready(function () { 
 	$('#kouwei0').click();
 });
  // 统计价格
  $('.kouwei').click(function(){
  	  //获取当前点击的商品内容
  	  content = $(this).html();
  	  $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
  	  $.get('/home/introduction/getprice',{data:content},function(res){
  	  		//修改价格
  	  		$('#good_price').html(res.price);
  	  		//修改库存
  	  		$('#kucun').html(res.num);
  	  		//修改原价
  	  		$('#yuanjia').html((parseFloat(res.price)+2).toFixed(2));
  	  		//设置总计
  	  		$('#good_heji').html(($('#good_price').html()*$('#text_box').val()).toFixed(2));
  	  });
  });


  //动态合计价格
  function heji(number){
  	if(number == -1){

  		$('#good_heji').html((parseInt(($('#text_box').val())-1)*$('#good_price').html()).toFixed(2));
  	}else{
  		$('#good_heji').html(((parseInt($('#text_box').val())+1)*$('#good_price').html()).toFixed(2));
  	}
  }

  //点击加入购物车  
  //请求 将用户选择的商品组名、商品id 商品数量 单价 合计 发送到服务端
  $('#LikBasket').click(function(){
      //初始化空数组用户 
      cart_arr = [];
      //压入商品id
      cart_arr.push($('#good_id').val());
      //压入购买数量
      cart_arr.push($('#text_box').val());
      //压入单价
      cart_arr.push($('#good_price').html());
      //压入商品组名
      cart_arr.push($('.selected').html());
      cart_arr.push($('#good_heji').html());
      cart_arr.push($('#good_name').html());
      // console.log(cart_arr);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      // //发送请求
      $.post('/home/shopcart/addcart',{data:cart_arr},function(res){    
          if(res == 0){
            alert('网络波动,请稍后再试');
          }else if(res == 1){
             alert('添加成功');
          }else if(res == 2){
            if(confirm('商品已存在购物车,可前往查看')){
              window.location.href = "/home/shopcart/index";
            }    
          }else{
            console.log(res);
          }
      });
  });
 </script>
</html>