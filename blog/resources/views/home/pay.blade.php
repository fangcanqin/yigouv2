<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>结算页面</title> 
  <link href="/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/cartstyle.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/jsstyle.css" rel="stylesheet" type="text/css" /> 
  <script type="text/javascript" src="/js/address.js"></script> 
  <style>
  	.mr_ys{background:red;}
  	.deftip{cursor:pointer;}

}
  </style>
 </head> 
 <body> 
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
   <div class="logo">
    <img src="/uploads/images/logo.png" />
   </div> 
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
  <div class="concent"> 
   <!--地址 --> 
   <div class="paycont"> 
    <div class="address"> 
     <h3>确认收货地址 </h3> 
     <div class="control"> 
      <div class="tc-btn createAddr theme-login am-btn am-btn-danger">
       使用新地址
      </div> 
     </div> 
     <div class="clear"></div> 
     <ul> 
      <div class="per-border"></div> 
       @foreach($user_address as $user_address_k => $user_address_v)
      <li class="user-addresslist del{{$user_address_v->id}} "> 
       <div class="address-left"> 
        <div class="user DefaultAddr"> 
         <span class="buy-address-detail"> <span class="buy-user">{{$user_address_v->name}} </span> <span class="buy-phone">{{$user_address_v->phone}}</span> </span> 
        </div> 
        <div class="default-address DefaultAddr"> 
         <p class="new-mu_l2cw"> <span class="title">地址：</span> <span class="province changeadds">{{$user_address_v->adds}}</span> <span class="street changexq">{{$user_address_v->xq}}</span></p>  
        </div> 
        <ins class="deftip mr_address @if($user_address_v->province == 1) mr_ys @endif" title="{{$user_address_v->id}}">
         默认地址
        </ins> 
       </div> 
       <div class="address-right"> 
        <a href="person/address.html"> <span class="am-icon-angle-right am-icon-lg"></span></a> 
       </div> 
       <div class="clear"></div> 
       <div class="new-addr-btn"> 
        <a href="#" class="hidden">设为默认</a> 
        <span class="new-addr-bar hidden">|</span> 
        <a href="/home/address/edit/{{$user_address_v->id}}">编辑</a> 
        <span class="new-addr-bar">|</span> 
        <a href="javascript:void(0);" class="del_id">删除</a> 
        <input type="hidden" value="{{$user_address_v->id}}">
       </div> </li> 
       @endforeach

     </ul> 
     <div class="clear"></div> 
    </div> 
    <!--物流 --> 
    <div class="logistics"> 
     <h3>选择物流方式</h3> 
     <ul class="op_express_delivery_hot"> 
      <li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li> 
      <li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li> 
      <li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li> 
      <li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li> 
      <li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li> 
     </ul> 
    </div> 
    <div class="clear"></div> 
    <!--支付方式--> 
    <div class="logistics"> 
     <h3>选择支付方式</h3> 
     <ul class="pay-list"> 
      <li class="pay card"><img src="/uploads/images/wangyin.jpg" />银联<span></span></li> 
      <li class="pay qq"><img src="/uploads/images/weizhifu.jpg" />微信<span></span></li> 
      <li class="pay taobao"><img src="/uploads/images/zhifubao.jpg" />支付宝<span></span></li> 
     </ul> 
    </div> 
    <div class="clear"></div> 
    <!--订单 --> 
    <div class="concent"> 
     <div id="payTable"> 
      <h3>确认订单信息</h3> 
      <div class="cart-table-th"> 
       <div class="wp"> 
        <div class="th th-item"> 
         <div class="td-inner">
          商品信息
         </div> 
        </div> 
        <div class="th th-price"> 
         <div class="td-inner">
          单价
         </div> 
        </div> 
        <div class="th th-amount"> 
         <div class="td-inner">
          数量
         </div> 
        </div> 
        <div class="th th-sum"> 
         <div class="td-inner">
          金额
         </div> 
        </div> 
        <div class="th th-oplist"> 
         <div class="td-inner">
          配送方式
         </div> 
        </div> 
       </div> 
      </div> 
      <div class="clear"></div>  
      <div id="J_Bundle_s_1911116345_1_0" class="bundle  bundle-last"> 
       <div class="bundle-main"> 
        @foreach($cart as $cart_k => $cart_v)
        <ul class="item-content clearfix"> 
         <div class="pay-phone"> 
          <li class="td td-item"> 
           <div class="item-pic"> 
            <a href="#" class="J_MakePoint"> <img src="{{$cart_v->pic}}" class="itempic J_ItemImg" style="width:80px" /></a> 
           </div> 
           <div class="item-info"> 
            <div class="item-basic-info"> 
             <a href="#" target="_blank" title="{{$cart_v->gname}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$cart_v->gname}}</a> 
            </div> 
           </div> </li> 
          <li class="td td-info"> 
           <div class="item-props"> 
            <span class="sku-line">口味：{{$cart_v->group}}</span> 
           </div> </li> 
          <li class="td td-price"> 
           <div class="item-price price-promo-promo"> 
            <div class="price-content"> 
             <em class="J_Price price-now">{{$cart_v->price}}</em> 
            </div> 
           </div> </li> 
         </div> 
         <li class="td td-amount"> 
          <div class="amount-wrapper "> 
           <div class="item-amount "> 
            <span class="phone-title">购买数量</span> 
            <div class="sl"> 
            <input type="hidden" value="{{$cart_v->price}}"  class="tmp_price"/>
           <input class="min am-btn" name=""  type="button" value="-" onclick="changesum(0,this)" /> 
           <input class="text_box suanyouhui"  name="{{$cart_v->group}}" type="text" value="{{$cart_v->num}}" style="width:30px;" onfocus="editChange(this)"  /> 
           <input class="add am-btn" name="" type="button" value="+" onclick="changesum(1,this)"/> 
            </div> 
           </div> 
          </div> </li> 
         <li class="td td-sum"> 
          <div class="td-inner"> 
           <em tabindex="0" class="J_ItemSum number xiaoji">{{$cart_v->total}}</em> 
          </div> </li> 
         <li class="td td-oplist"> 
          <div class="td-inner"> 
           <span class="phone-title">配送方式</span> 
           <div class="pay-logis">
             包邮 
           </div> 
          </div> </li> 
        </ul> 
         @endforeach
        
      
 
        <div class="clear"></div> 
       </div>

      </div> 
      <div class="clear"></div> 
      <div class="pay-total"> 
       <!--留言--> 
       <div class="order-extra"> 
        <div class="order-user-info"> 
         <div id="holyshit257" class="memo"> 
          <label>买家留言：</label> 
          <input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close" /> 
          <div class="msg hidden J-msg"> 
           <p class="error">最多输入500个字符</p> 
          </div> 
         </div> 
        </div> 
       </div> 
       <!--优惠券 --> 
   <!--     <div class="buy-agio"> 
        <li class="td td-coupon"> <span class="coupon-title">优惠券</span> <select data-am-selected=""> <option value="a">  ￥8   【消费满95元可用】  </option> <option value="b" selected="">  ￥3   【无使用门槛】  </option> </select> </li> 
        <li class="td td-bonus"> <span class="bonus-title">红包</span> <select data-am-selected=""> <option value="a">  &yen;50.00元   还剩10.40元  </option> <option value="b" selected="">  &yen;50.00元   还剩50.00元  </option> </select> </li> 
       </div>  -->
       <div class="clear"></div> 
      </div> 
      <!--含运费小计 --> 
      <div class="buy-point-discharge "> 
       <!-- <p class="price g_price "> 合计（含运费） <span>&yen;</span><em class="pay-sum test">244.00</em> </p>  -->
        <strong class="price">合计（含运费):&yen;<em id="J_Total" class="heji J_Total" style="color:#FF4200">0.00</em></strong>
      </div> 
      <!--信息 --> 
      <div class="order-go clearfix"> 
       <div class="pay-confirm clearfix"> 
        <div class="box"> 
         <div tabindex="0" id="holyshit267" class="realPay">
          <em class="t">实付款：</em> 
          <span class="price g_price "> <span>&yen;</span> <em class="heji style-large-bold-red J_Total" id="J_ActualFee">0.00</em> </span> 
         </div> 
         <div id="holyshit268" class="pay-address"> 
          <p class="buy-footer-address">寄送至： <span class="buy-line-title buy-line-title-type to_add">{{$mr_info->adds}}({{$mr_info->xq}})</span>   </p> 
          <p class="buy-footer-address"> <span class="buy-line-title">收货人：</span> <span class="buy-address-detail"> <span class="buy-user to_user">{{$mr_info->name}} </span> <span class="buy-phone to_phone">{{$mr_info->phone}}</span> </span> </p> 
         </div> 
        </div> 
        <div id="holyshit269" class="submitOrder"> 
         <div class="go-btn-wrap"> 
          <a id="J_Go" href="success.html" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a> 
         </div> 
        </div> 
        <div class="clear"></div> 
       </div> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div> 
   </div> 
   <div class="footer"> 
    <div class="footer-hd"> 
     <p> <a href="#">恒望科技</a> <b>|</b> <a href="#">商城首页</a> <b>|</b> <a href="#">支付宝</a> <b>|</b> <a href="#">物流</a> </p> 
    </div> 
    <div class="footer-bd"> 
     <p> <a href="#">关于恒望</a> <a href="#">合作伙伴</a> <a href="#">联系我们</a> <a href="#">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有</em> </p> 
    </div> 
   </div> 
  </div> 
  <div class="theme-popover-mask"></div> 
  <div class="theme-popover"> 
   <!--标题 --> 
   <div class="am-cf am-padding"> 
    <div class="am-fl am-cf">
     <strong class="am-text-danger am-text-lg">新增地址</strong> / 
     <small>Add address</small>
    </div> 
   </div> 
   <hr /> 
   <div class="am-u-md-12"> 
    <form class="am-form am-form-horizontal" action="/home/pay/insert" method="post" id="form_address"> 
    {{csrf_field()}}
   
      <input type="hidden" name="uid" value="{{$uid}}">
     <div class="am-form-group"> 
      <label for="user-name" class="am-form-label">收货人</label> 
      <div class="am-form-content"> 
       <input type="text" id="user-name" name="name" placeholder="收货人" /> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-phone" class="am-form-label">手机号码</label> 
      <div class="am-form-content"> 
       <input id="user-phone"  placeholder="手机号必填" type="text" name="phone"/> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-phone" class="am-form-label">所在地</label> 
      <div class="am-form-content address"> 
          <select name="s1"  class="required large ceshi" style="width:120px;display:inline-block;margin-right:2px;" id="ones">
            <option value="" class="ss">--请选择--</option>
        		</select> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-intro" class="am-form-label">详细地址</label> 
      <div class="am-form-content"> 
       <textarea class="" rows="3" id="user-intro" name="adds" placeholder="输入详细地址"></textarea> 
       <small>100字以内写出你的详细地址...</small> 
      </div> 
     </div> 
     <div class="am-form-group theme-poptit"> 
      <div class="am-u-sm-9 am-u-sm-push-3"> 
       <div style="display:inline-block">
        <input type="submit" class="am-btn am-btn-danger" value="保存" style="display:inline-block">
       </div> 
       <div class="am-btn am-btn-danger close" style="display:inline-block">
        取消
       </div> 
      </div> 
     </div> 
    </form> 
   </div> 
  </div> 
  <div class="clear"></div>  
 </body>
 <script>

 	//设置默认地址
    $('.mr_address').click(function(){

    	obj = $(this);
    	//将当前的点击的添加类名
    	$('.mr_address').each(function(){
    		$(this).removeClass('mr_ys');
    	})
    	obj.addClass('mr_ys');

       mr_add  = $(this).attr('title');
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.get('/home/address/changestatus',{mr_add:mr_add},function(status){
          $('.to_add').html(status.adds+'('+status.xq+')');
          $('.to_user').html(status.name);
          $('.to_phone').html(status.phone);
       })
    });

    //删除地址
    $('.del_id').click(function(){
   		del_id = $(this).next().val();
   		//发送请求
   		$.get('/home/address/del',{id:del_id},function(data){
   			if(data != 0){
   				$('.del'+data).remove();
   			}else{
   				alert('网络波动,请稍后再试...');
   			}
   		})
   	});


   	//地址
    $(document).ready(function(){ 
   
            //第一级别获取
        $.get('/home/address/district',{'upid':0},function(result){
            //得到的数据数组内容 我们要遍历得到里面的一个对象
            for(var i=0;i<result.length;i++){
                //console.log(result[i].name);
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
        $.getJSON('/home/address/district',{'upid':id},function(result){
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

     $(document).ready(function(){
       // sum = 0;
       //  $('.suanyouhui').each(function(){
       //     sum += parseInt($(this).val());
       //  });
       //  //改变优惠金额
       //  $('#sheng').html(sum*2);
       //  //改变当前商品件数
       //  $('#J_SelectedItemsCount').html(sum);

        total_price = 0
        //总和
        $('.xiaoji').each(function(){
           total_price += parseFloat($(this).html());
        });
       
        $('.J_Total').html((total_price).toFixed(2));
      });

     //参数一 代表 增减 obj 触发事件时对应的元素对象
     function changesum(num,obj){
      //操作减
        if(num == 0){
          //获取该对象的的下一个元素对象
          //商品数量减少
           //商品数量
           good_num = $(obj).next().val()-1;
           //判断商品是否为 >= 0
           if(good_num <= 0){
             alert('商品不能小于零,亲可以直接删除商品哦!');
            $(obj).next().val('1');
            window.location.reload();
             return ;
           }
           //商品组合名
           group_name = $(obj).next().attr('name');
           // console.log(good_num);
           // console.log(group_name);
           //减少优惠价
           $('#sheng').html($('#sheng').html()-2);
           //计算小计
           //获取单价
           good_price = $(obj).parent().find('.tmp_price').val();
           //获取小计标签元素
           xiaoji = $(obj).parent().parent().parent().parent().next().find('.xiaoji');
           xiaoji.html((good_price*good_num).toFixed(2));
           //改变当前商品件数
           change_nums = $('#J_SelectedItemsCount').html();
           $('#J_SelectedItemsCount').html(parseInt(change_nums)-1);
           
        }else{
          //获取该对象的的上一个元素对象
          //商品数量增加
           good_num = parseInt($(obj).prev().val())+1;
           //商品组合名
           group_name = $(obj).prev().attr('name');
           // console.log(good_num);
           // console.log(group_name);
            $('#sheng').html(parseInt($('#sheng').html())+2);
            good_price = $(obj).parent().find('.tmp_price').val();
           //获取小计标签元素
           xiaoji = $(obj).parent().parent().parent().parent().next().find('.xiaoji');
           xiaoji.html((good_price*good_num).toFixed(2));
           //改变当前商品件数
           change_nums = $('#J_SelectedItemsCount').html();
           $('#J_SelectedItemsCount').html(parseInt(change_nums)+1);
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //发送请求动态改变购物车的信息
        $.post('/home/shopcart/changecart',{good_num:good_num,group_name:group_name},function(res){
           $('.heji').html(res.total);
           //console.log(res.total);
        })   
     }

     //直接修改
     //获取焦点时
     // function editChange(obj1){
     //    //失去焦点后
     //    $(obj1).blur(function(){
     //      //获取当前商品数量
     //      currnet_good_num  = $(obj1).val();
     //      if(currnet_good_num <= 0){
     //        alert('商品不能小于零,亲可以直接删除商品哦!');
     //        $(obj1).val('1');
     //        currnet_good_num = 1;
     //      }
     //      //当前商品组合名
     //      current_good_name = $(obj1).attr('name');
     //      //当前商品单价
     //      current_good_price = $(obj1).prev().prev().val();
     //      current_xiaoji = $(obj1).parent().parent().parent().parent().next().find('.xiaoji');
     //      current_xiaoji.html((currnet_good_num* current_good_price).toFixed(2));

     //      //获取当前商品
     //       $.ajaxSetup({
     //        headers: {
     //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //        }
     //      });
     //    //发送请求动态改变购物车的信息
     //    $.post('/home/shopcart/changecart',{good_num:currnet_good_num,group_name:current_good_name},function(ress){
     //       $('.hejia').html(ress.total);
     //       $('#J_SelectedItemsCount').html(ress.num);
     //       $('#sheng').html((ress.num)*2);
     //    })   

     //    });
     // }

 </script>
 <script src="/admin_template/js/libs/jquery-1.8.3.min.js"></script>
</html>