@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-table"></i> 轮播图列表</span>
</div>
<div class="mws-panel-toolbar">
    <div class="btn-toolbar">
        <div class="btn-group">
            <a href="#" class="btn"><i class="icol-cross" id="boxx"></i> 删除</a>
            <a href="#" class="btn"><i class="icol-printer"></i> Print</a>
            <a href="#" class="btn"><i class="icol-arrow-refresh"></i> Renew</a>
            <a href="#" class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
            <ul class="dropdown-menu pull-right">
                <li><a href="#"><i class="icol-disconnect"></i> Disconnect From Server</a></li>
                <li class="divider"></li>
                <li class="dropdown-submenu">
                    <a href="#">More Options</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Contact Administrator</a></li>
                        <li><a href="#">Destroy Table</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mws-panel-body no-padding">
    <table class="mws-table">
        <thead>
            <tr>
                <th class="checkbox-column">
                    <input type="checkbox" >
                </th>
                <th>ID</th>
                <th>URL</th>
                <th>状态</th>
                <th>轮播图</th>
                <th>排序</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slid as $k => $v)
            <tr>
                <td class="checkbox-column">
                    <input type="checkbox" value="{{$v->id}}" class="check" >
                </td>
                <td id="gid">{{$v->id}}</td>
                <td class="std">{{$v->surl}}</td>
                <td>{{$v->status}}</td>
                <td>{{$v->simg}}</td>
                <td class="std2">{{$v->token or $k}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>      
</div>
@endsection
@section('slid')
<script>
    $('.std').dblclick(function(){
        obj = $(this);
        content = obj.html();
        // 获取给当前td 添加 文本框
        obj.html('<input value="'+content+'" id="inp" ></input>');
        //获取到文本框的对象，让其触发焦点
        $('#inp').focus();

        //失去焦点
        $('#inp').blur(function(){
            //文本框对应的父级td
            td = $(this).parent();
            //将当前input里面的属性的值放置在td标签里面
            value = $(this).val();
            td.html(value);
            //获取到操作的id号
            id = td.parent().children('#gid').html();
            //console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //对url进行验证
            var strRegex ='(https?|ftp|file|http)://[-A-Za-z0-9+&@#/%?=~_|!:,.;]+[-A-Za-z0-9+&@#/%=~_|]';
            var re=new RegExp(strRegex);   

            if(value != ""){  
             if (!re.test(value)) {   
                alert("请输入正确的url地址");
                td.html(content); 
                return false;
              }else{
                //同ajax动态修改内容
                $.post('/admin/slid/change',{sid:id,data:value},function(res){
                        console.log(res);
                });
              }
            }else{
                alert("url不能为空");
                td.html(content);  
            } 

            
        });
    });

     $('.std2').dblclick(function(){
        obj = $(this);
        content = obj.html();
        // 获取给当前td 添加 文本框
        obj.html('<input type="number" value="'+content+'" id="inp" ></input>');
        //获取到文本框的对象，让其触发焦点
        $('#inp').focus();

        //失去焦点
        $('#inp').blur(function(){
            //文本框对应的父级td
            td = $(this).parent();
            //将当前input里面的属性的值放置在td标签里面
            value = $(this).val();
            td.html(value);
            //获取到操作的id号
            id = td.parent().children('#gid').html();
            //console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
   
            //同ajax动态修改内容
            $.post('/admin/slid/change',{sid:id,data:value},function(res){
                //$('.std2').html(res);
            });
                   
        });
    });



    $('#boxx').click(function(){
        var arr = new Array();
        $('.check:checked').each(function(){
             $(this).parent().parent().remove();
             arr.push($(this).val());
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.post('/admin/slid/batchDelete',{arr:arr},function(res){
                    console.log(res);
        });
    });
</script>
@endsection