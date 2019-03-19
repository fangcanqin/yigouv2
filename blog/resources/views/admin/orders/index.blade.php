@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 订单列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="" method="get">
       <div id="DataTables_Table_1_length" class="dataTables_length">
        <label>显示 
        <select size="1" name="count">
          <option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
          <option value="10" @if(isset($request['count']) && $request['count'] == 5) selected @endif>10</option>
          <option value="15" @if(isset($request['count']) && $request['count'] == 5) selected @endif>15</option>
          <option value="20" @if(isset($request['count']) && $request['count'] == 5) selected @endif>20</option>
          </select> 条数</label>
       </div>
       <div class="dataTables_filter" id="DataTables_Table_1_filter">
          <label style="font-weight:bold">关键字: <input type="text" name="search" value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1" /></label> 
          <input type="submit" value="查找" class="btn btn-info">
       </div>
     </form>
     <html>
       <head></head>
       <body>
        <table class="mws-table"> 
         <thead> 
          <tr> 
           <th>ID</th>
           <th>订单号</th> 
           <th>商品id</th> 
           <th>商品状态</th> 
           <th>用户id</th> 
           <th>地址id</th> 
           <th>总金额</th> 
            <th>操作</th>
          </tr> 
         </thead> 
         <tbody>
         @foreach($orders as $key=>$val)
          <tr> 
           <td>{{ $val->id }}</td> 
           <td>{{ $val->order_num }}</td> 
           <td>{{ $val->gid }}</td> 
           <td>
              <button><a href="/admin/orders/{{ $val->id }}"><?php switch($val->status){
                case 0:
                  echo '未付款';
                break;
                case 1:
                  echo '已发货';
                break;
                case 2:
                  echo '待收货';
                break;
                case 3:
                  echo '待评论';
                break;
                case 4:
                  echo '以评论';
                break;
                case 5:
                  echo '买家退货';
                break;
                case 6:
                  echo '确认退款';
                break;
                case 7:
                  echo '已退款';
                break;
              }?></a></button>
           </td> 
           <td>{{ $val->uid }}</td> 
           <td>{{ $val->address_id }}</td> 
           <td>{{ $val->total }}</td> 
           <td>
              <form action="/admin/orders/{{ $val->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="submit" value="删除" class="btn btn-danger" >
                <a href="/admin/orders/{{ $val->id }}/edit" class="btn btn-info">修改</a>
              </form>             
           </td>
          </tr>
          @endforeach 
         </tbody> 
        </table>
       </body>
      </html>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      获取数据为 {{ $orders->total() }} 条
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
      {{ $orders->appends([])->links() }}
     </div>
    </div> 
   </div> 
  </div>
  <script>
      var ajax = new XMLHTTPRequest();
      alert(ajax);
  </script>
@endsection