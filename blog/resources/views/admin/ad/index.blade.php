@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 广告列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/admin/admin_users" method="get">
       <div id="DataTables_Table_1_length" class="dataTables_length">
        <label>显示 
        <select size="1" name="count">
          <option value="5">5</option>
          <option value="10" >10</option>
          <option value="15" >15</option>
          <option value="20" >20</option>
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
           <th>广告图片</th> 
           <th>广告地址</th> 
           <th>广告状态</th> 
           <th>广告开始时间</th> 
           <th>光改结束时间</th> 
           <th>操作</th> 
          </tr> 
         </thead> 
         <tbody> 
          @foreach($ad as $key=>$val)
          <tr>
           <td>{{ $val->id }}</td> 
           <td style="width:200px;"><img src="{{ $val->img }}" style="width:50px;"></td> 
           <td>{{ $val->url }}</td> 
           <td>@if($val->status == 0) 未激活 @else 正常 @endif</td> 
           <td>{{ $val->ctime }}</td> 
           <td>{{ $val->stime }}</td> 
           <td>
              <form action="/admin/ad/{{ $val->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" value="删除" class="btn btn-danger" >
                <a href="/admin/ad/{{ $val->id }}/edit" class="btn btn-info">修改</a>
              </form>             
           </td>
          </tr>
          @endforeach
         </tbody> 
        </table>
       </body>
      </html>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      获取数据为  条
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
     </div>
    </div> 
   </div> 
  </div>
@endsection