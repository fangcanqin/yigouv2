<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>购物车页面</title> 
  <link href="/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/cartstyle.css" rel="stylesheet" type="text/css" /> 
  <link href="/css/optstyle.css" rel="stylesheet" type="text/css" /> 
  <script type="text/javascript" src="/js/jquery.js"></script> 
 </head> 
 <body> 
  <!--顶部导航条 --> 
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
    <img src="/uploads/images/logobigs.png" style="width:140px">
   </div> 
   <div class="search-bar pr"> 
    <a name="index_none_header_sysc" href="#"></a> 
    <form style="border-top-right-radius:30px;border-bottom-right-radius:30px;background:#FF5700"> 
     <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off" style="padding-left:20px;font-size:15px" /> 
     <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" style="border-top-right-radius:30px;border-bottom-right-radius:30px;outline:none;font-weight:bold" /> 
    </form> 
   </div> 
  </div> 
  <div class="nav-table" style="margin-bottom:30px"> 
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
   </div>
  <div class="clear"></div> 
  <!--购物车 --> 
  <div class="concent"> 
   <div id="cartTable"> 
    <div class="cart-table-th"> 
     <div class="wp"> 
      <div class="th th-chk"> 
       <div id="J_SelectAll1" class="select-all J_SelectAll"> 
       </div> 
      </div> 
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
      <div class="th th-op"> 
       <div class="td-inner">
        操作
       </div> 
      </div> 
     </div> 
    </div> 
    <div class="clear"></div>  
    <div class="bundle  bundle-last "> 
     <div class="bundle-hd"> 
      <div class="bd-promos"> 
       <div class="bd-has-promo">
        已享优惠:
        <span class="bd-has-promo-content" id="sheng" >{{$good_total[0]*2}}</span><span>￥</span>&nbsp;&nbsp;
       </div> 
       <div class="act-promo"> 
        <a href="/home" target="_blank">更多优惠尽在易购<span class="gt">&gt;&gt;</span></a> 
       </div> 
       <span class="list-change theme-login">编辑</span> 
      </div> 
     </div> 
     <div class="clear"></div> 

     <div class="bundle-main"> 
    
      @foreach($cart as $cart_k => $cart_v)
      
      <ul class="item-content clearfix fu_ul"> 
       <li class="td td-chk xd_li"> 
        <div class="cart-checkbox "> 
         <input class="check p_caozuo" id="J_CheckBox_170037950254" name="items[]" value="{{$cart_v->id}}" type="checkbox"  @if($cart_v->status == 1) checked @endif)/> 
         <label for="J_CheckBox_170037950254"></label> 
        </div> 
        </li> 
       <li class="td td-item"> 
        <div class="item-pic"> 
         <a href="#" target="_blank" data-title="{{$cart_v->name}}" class="J_MakePoint" data-point="tbcart.8.12"> <img style="width:80px" src="{{$cart_v->pic}}" class="itempic J_ItemImg" /></a> 
        </div> 
        <div class="item-info"> 
         <div class="item-basic-info"> 
          <a href="#" target="_blank" title="{{$cart_v->name}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$cart_v->name}}</a> 
         </div> 
        </div> </li> 
       <li class="td td-info"> 
        <div class="item-props item-props-can"> 
         <span class="sku-line">口味：{{$cart_v->group}}</span> 
         <input type="hidden" value="{{$cart_v->group}}"  class="edit_group"/>
         <span tabindex="0" class="btn-edit-sku theme-login edit_good">修改</span> 
         <i class="theme-login am-icon-sort-desc"></i> 
        </div> </li> 
       <li class="td td-price"> 
        <div class="item-price price-promo-promo"> 
         <div class="price-content"> 
          <div class="price-line"> 
           <em class="price-original">{{$cart_v->price+2}}</em> 
          </div> 
          <div class="price-line"> 
           <em class="J_Price price-now" tabindex="0">{{$cart_v->price}}</em>
          </div> 
         </div> 
        </div> </li> 
       <li class="td td-amount"> 
        <div class="amount-wrapper "> 
         <div class="item-amount "> 
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
         <em tabindex="0" class="J_ItemSum number xiaoji">{{$cart_v->price*$cart_v->num}}</em> 
        </div> </li> 
       <li class="td td-op"> 
        <div class="td-inner"> 
         <a title="移入收藏夹" class="btn-fav" href="#"> 移入收藏夹</a> 
         <a href="javascript:;" data-point-url="#" class="delete"> 删除</a> 
        </div> 
        </li> 
      </ul>     
      @endforeach
     </div> 
    </div>  
    <div class="clear"></div>  

   </div> 
   <div class="clear"></div> 
   <div class="float-bar-wrapper"> 
    <div id="J_SelectAll2" class="select-all J_SelectAll"> 
     <div class="cart-checkbox"> 
      <input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox" /> 
      <label for="J_SelectAllCbx2"></label> 
     </div> 
     <span>全选</span> 
    </div> 
    <div class="operations"> 
     <a href="javascript:;" hidefocus="true" class="deleteAll">删除</a> 
     <a href="javascript:;" hidefocus="true" class="J_BatchFav">移入收藏夹</a> 
    </div> 
    <div class="float-bar-right"> 
     <div class="amount-sum"> 
      <span class="txt">已选商品</span> 
      <em id="J_SelectedItemsCount">{{$good_total[0]}}</em>
      <span class="txt">件</span> 
      <div class="arrow-box"> 
       <span class="selected-items-arrow"></span> 
       <span class="arrow"></span> 
      </div> 
     </div> 
     <div class="price-sum"> 
      <span class="txt">合计:</span> 
      <strong class="price">&yen;<em id="J_Total" class="hejia">{{$good_total[1]}}</em></strong> 
     </div> 
     <div class="btn-area"> 
      <a href="/home/pay/index" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算"> <span>结&nbsp;算</span></a> 
     </div> 
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
  <!--操作页面--> 
  <div class="theme-popover-mask"></div> 
  <div class="theme-popover"> 
   <div class="theme-span"></div> 
   <div class="theme-poptit h-title"> 
    <a href="javascript:;" title="关闭" class="close">&times;</a> 
   </div> 
   <div class="theme-popbod dform"> 
    <form class="theme-signin" name="loginform" action="/home/shopcart/newgroup" method="post">
    {{csrf_field()}} 
     <div class="theme-signin-left"> 
     <input type="hidden" name="new_kowei" class="new_kowei" value=" " />
     <input type="hidden" name="new_num" class="new_num" value=" " />
     <input type="hidden" name="new_pic" class="new_pic" value=" " />
     <input type="hidden" name="new_qian" class="new_qian" value=" " />
      <li class="theme-options"> 
       <div class="cart-title">
        口味：
       </div> 
       <ul class="fenglei"> 
        <!-- <li class="sku-line selected"><i></i></li>  -->
        <!-- <li class="sku-line">10#蜜橘色+17#樱花粉<i></i></li>  -->
       </ul> </li> 
      <div class="theme-options"> 
       <div class="cart-title number">
        数量
       </div> 
       <dd> 
        <input class="min am-btn am-btn-default" name="" type="button" value="-" /> 
        <input class="text_box edit_num" name="" type="text"  value="1" style="width:30px;" /> 
        <input class="add am-btn am-btn-default" name="" type="button" value="+" /> 
        <span class="tb-hidden"><span class="stock"></span>件</span> 
       </dd> 
      </div>

      <div class="clear"></div> 
      <div class="btn-op"> 
       <div >
       <input type="submit" value="确定" class="btn am-btn am-btn-warning" />
       </div> 
       <div class="btn close am-btn am-btn-warning quxiao">
        取消
       </div> 
      </div> 
     </div> 
     <div class="theme-signin-right"> 
      <div class="img-info"> 
       <img src="/uploads/images/kouhong.jpg_80x80.jpg" class="edit_pic" /> 
      </div> 
      <div class="text-info"> 
       <span class="J_Price price-now ">&yen;<font class="edit_price"></font></span>
       <span id="Stock" class="tb-hidden">库存:<span class="stock edit_kucun"</span>件</span> 
      </div> 
     </div> 
    </form> 
   </div> 
  </div> 
  <!--引导 --> 
  <div class="navCir"> 
   <li><a href="home.html"><i class="am-icon-home "></i>首页</a></li> 
   <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li> 
   <li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li> 
   <li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li> 
  </div>  
 </body>
 <script>
     //页面刷新自动计算当前优惠
     $(document).ready(function(){
       // sum = 0;
       //  $('.suanyouhui').each(function(){
       //     sum += parseInt($(this).val());
       //  });
        //改变优惠金额
        //$('#sheng').html(sum*2);
        //$('#sheng').html(0.00);
        //改变当前商品件数
        //$('#J_SelectedItemsCount').html(sum);
        //total_price = 0
        //总和

        
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
          
           //计算小计
           //获取单价
           good_price = $(obj).parent().find('.tmp_price').val();
           //获取小计标签元素
           xiaoji = $(obj).parent().parent().parent().parent().next().find('.xiaoji');
           xiaoji.html((good_price*good_num).toFixed(2));   
           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //发送请求动态改变购物车的信息
        $.post('/home/shopcart/changecart',{good_num:good_num,group_name:group_name},function(res){
           //$('.hejia').html(res.total);
           //console.log(res);
        });
         //是否选中当前商品
         if($(obj).parents('.fu_ul').find('.p_caozuo').prop("checked")){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get('/home/shopcart/getgoodtotal',{},function(dan){
                $('#J_SelectedItemsCount').html(dan[0]-1);
                $('#J_Total').html(dan[1]);
                console.log(dan)
            })
             //减少优惠价
           $('#sheng').html(parseInt($('#sheng').html())-2);
         }         
        }else{
          //获取该对象的的上一个元素对象
          //商品数量增加
           good_num = parseInt($(obj).prev().val())+1;
           //商品组合名
           group_name = $(obj).prev().attr('name');
            
            good_price = $(obj).parent().find('.tmp_price').val();
           //获取小计标签元素
           xiaoji = $(obj).parent().parent().parent().parent().next().find('.xiaoji');
           xiaoji.html((good_price*good_num).toFixed(2));
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //发送请求动态改变购物车的信息
            $.post('/home/shopcart/changecart',{good_num:good_num,group_name:group_name},function(res){
               //$('.hejia').html(res.total);
               //console.log(res);
            });
             //是否选中当前商品
             if($(obj).parents('.fu_ul').find('.p_caozuo').prop("checked")){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get('/home/shopcart/getgoodtotal',{},function(dan){
                    $('#J_SelectedItemsCount').html(parseInt(dan[0])+1);
                    $('#J_Total').html(dan[1]);
                    console.log(dan)
                })
                 $('#sheng').html(parseInt($('#sheng').html())+2);
             }                        
        
        }
        
     }

     //直接修改
     //获取焦点时
     function editChange(obj1){
        //失去焦点后
        $(obj1).blur(function(){
          //获取当前商品数量
          currnet_good_num  = $(obj1).val();
          if(currnet_good_num <= 0){
            alert('商品不能小于零,亲可以直接删除商品哦!');
            $(obj1).val('1');
            currnet_good_num = 1;
          }
          //当前商品组合名
          current_good_name = $(obj1).attr('name');
          //当前商品单价
          current_good_price = $(obj1).prev().prev().val();
          current_xiaoji = $(obj1).parent().parent().parent().parent().next().find('.xiaoji');
          current_xiaoji.html((currnet_good_num* current_good_price).toFixed(2));

          //获取当前商品
           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        //发送请求动态改变购物车的信息
        $.post('/home/shopcart/changecart',{good_num:currnet_good_num,group_name:current_good_name},function(ress){
           $('.hejia').html(ress.total);
           $('#J_SelectedItemsCount').html(ress.num);
           $('#sheng').html((ress.num)*2);
        })   

             //是否选中当前商品
             if($(obj).parents('.fu_ul').find('.p_caozuo').prop("checked")){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get('/home/shopcart/getgoodtotal',{},function(dan){
                    $('#J_SelectedItemsCount').html(parseInt(dan[0])+1);
                    $('#J_Total').html(dan[1]);
                    console.log(dan)
                })
                 $('#sheng').html(parseInt($('#sheng').html())+2);
             }

        });
     }


     //重新修改商品信息
     $('.edit_good').click(function(){
        //获取当前的商品组名
        edit_group = $(this).prev().val();
        //发送请求
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post('/home/shopcart/editgroup',{group:edit_group},function(result){
          for(i = 0;i<result.length;i++){
            if(result[i].group == edit_group){
              $('.fenglei').append('<li class="sku-line selected addname" style=" cursor:pointer">'+result[i].group+'</li>');
              //修改数量
              $('.edit_num').val(result[i].number);
              //修改库存
              $('.edit_kucun').html(result[i].num);
              //修改单价
              $('.edit_price').html(result[i].price);
              //修改商品图
              $('.edit_pic').attr('src',result[i].pic);
            }else{
               $('.fenglei').append('<li class="sku-line addname" style=" cursor:pointer">'+result[i].group+'</li>');
            }
          }
          
        });

     })

     //初始化
     $('.quxiao').click(function(){
      $('.fenglei').empty();
     });
     //点击加选中颜色类名
    $(".fenglei").on('mouseenter', function(){
        $(".addname").click(function() {
           $(this).addClass('selected').siblings().removeClass('selected');
           //发送请求获取当前选中的商品的详情资料
            click_group = $(this).html();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post('/home/shopcart/clickgroup',{group:click_group},function(group_info){
              console.log(group_info)
              //修改库存
              $('.edit_kucun').html(group_info.num);
              //修改单价
              $('.edit_price').html(group_info.price);
              //修改商品图
              $('.edit_pic').attr('src',group_info.pic);
              //初始化隐藏内容
              $('.new_kowei').val(group_info.group);
              $('.new_num').val($('.edit_num').val());
              $('.new_pic').val(group_info.pic);
              $('.new_qian').val(group_info.price);
            })

         });
    });
    //批量操作
    $("#J_SelectAllCbx2").on("click", function(){
      if($(this).is(":checked")){
         //全选
         
         //将所有选中的商品打勾
         $('.p_caozuo').each(function(){
            $(this).attr("checked", 'checked');
            //arr_del.push($(this).val());
          });
         //nsole.log(arr_del);  /home/shopcart/getgoodtotal
         zt1 = 1;
      }else {
         //取消全选
          $('.p_caozuo:checked').each(function(){
            $(this).attr("checked",false);
          });
         zt1 = 0;
      }

      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
 
      $.get('/home/shopcart/goodtotal',{zt1:zt1},function(js_hj1){
          $('#J_SelectedItemsCount').html(js_hj1[0]);
            $('#J_Total').html(js_hj1[1]);
            $('#sheng').html($('#J_SelectedItemsCount').html()*2);
         //console.log(js_hj1);
      })

  });

    //批量删除
    $('.deleteAll').click(function(){
      //判断是否没有打勾
      if($('.p_caozuo:checked').length == 0){
        alert('请先选择要删除商品');
        return;
      }
       arr_del = [];
        //将所有选中的商品打勾
       $('.p_caozuo:checked').each(function(){
          //$(this).attr("checked", 'checked');
          arr_del.push($(this).val());
        });
        //发送请求进行删除操作
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       //console.log(arr_del);
       $.post('/home/shopcart/deleteall',{arr_del,arr_del},function(all_bool){
          if(all_bool){
              $('.p_caozuo:checked').each(function(){
             $(this).parents('.fu_ul').remove();
            });
              window.location.reload();
          }else{
            alert('网络波动...');
          }
       })
    })

    //单个删除
    $('.delete').click(function(){
      obj_del = $('.delete');
     //判断当前删除是否打勾
      del_checked =  $(this).parents('.fu_ul').find('.p_caozuo');
      if(del_checked.prop("checked")){
        //选中了
        //发送请求进行删除操作
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        //获取要删除的商品id
        del_id = del_checked.val();
        $.get('/home/shopcart/delete',{id:del_id},function(del_bool){
          obj_del.parents('.fu_ul').remove();
          window.location.reload();
        })
      }else{
        //没选中
        alert('请选择指定的删除的商品');
      }
    });


    //结算
    $(function(){
        $('.p_caozuo').change(function(){
          //判断是否为选中
          if($(this).prop("checked")){
            zt = 1;
          }else{
            zt = 0;
          }
          current_good_id = $(this).val();
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });
          $.get('/home/shopcart/selectgood',{zt:zt,id:current_good_id},function(js_hj){
            $('#J_SelectedItemsCount').html(js_hj[0]);
            $('#J_Total').html(js_hj[1]);
            $('#sheng').html($('#J_SelectedItemsCount').html()*2);
            //console.log(js_hj);
          }) 
             
           
        });
    })


    //判断有没有打勾的商品
    $('#J_Go').click(function(){
      if($('.p_caozuo:checked').length == 0){
        alert('请先选择要购买的商品');
        return false;
      }
      return true;
    })
 </script>

</html>