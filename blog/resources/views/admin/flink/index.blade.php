@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 管理员列表</span> 
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
          <label style="font-weight:bold">关键字: <input type="text" name="search" value="" aria-controls="DataTables_Table_1" /></label> 
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
           <th>图片</th> 
           <th>链接地址</th> 
           <th>链接状态</th> 
           <th>申请时间</th> 
           <th>停止时间</th> 
           <th>申请人</th> 
           <th>内容</th> 
           <th>操作</th> 
          </tr> 
         </thead> 
         <tbody> 
          @foreach($flink as $key=>$val)
          <tr>
           <td>{{ $val->id }}</td> 
           <td style="width:200px;"><img src="{{ $val->img }}" style="width:60px;height:70px;"></td> 
           <td>{{ $val->url }}</td> 
           <td>@if($val->status == 0) 未激活 @else 激活 @endif</td> 
           <td>{{ $val->ctime }}</td> 
           <td>{{ $val->stime }}</td> 
           <td>{{ $val->uid }}</td> 
           <td>{{ $val->content }}</td> 
           <td>
              <form action="/admin/flink/{{ $val->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" value="删除" class="btn btn-danger" >
                <a href="/admin/flink/{{ $val->id }}/edit" class="btn btn-info">修改</a>
              </form>             
           </td>
          </tr>
          @endforeach
         </tbody> 
        </table>
       </body>
      </html>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      【共 {{ $flink->total() }} 条数据】
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
      {{ $flink->appends([])->links() }}
     </div>
    </div> 
   </div> 
  </div>
@endsection