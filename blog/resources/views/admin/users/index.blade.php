@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 用户列表</span> 
   </div> 
   <form action="/admin/users" method="get">
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="DataTables_Table_1_length" class="dataTables_length">
      <label>显示 <select size="1" name="num" aria-controls="DataTables_Table_1">
      <option value="5"  @if(isset($limit['num']) && $limit['num'] == 5) selected @endif>&nbsp;5</option>
      <option value="10" @if(isset($limit['num']) && $limit['num'] == 10) selected @endif>10</option>
      <option value="15" @if(isset($limit['num']) && $limit['num'] == 15) selected @endif>15</option>
      <option value="15" @if(isset($limit['num']) && $limit['num'] == 20) selected @endif>20</option></select> 条数</label>
     </div>
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label style="font-weight:bold">关键字: <input type="text" aria-controls="DataTables_Table_1"  name="search" placeholder="用户名" value="@isset($limit['search']) {{$limit['search']}} @endisset"/></label> <input type="submit" value="查找" class="btn btn-info">
     </div>
</form>
     <html>
 <body>
  <table class="mws-table"> 
   <thead> 
    <tr> 
     <th>ID</th>
     <th>用户名</th>
     <th>手机号</th>
     <th>邮箱</th>
     <th>状态</th> 
     <th>密令</th> 
     <th>注册时间</th> 
     <th>操作</th> 
    </tr> 
   </thead> 
   <tbody>
    @foreach($list as $k => $v)
    <tr> 
     <td> {{ $v->id }} </td> 
     <td> {{ $v->username }} </td> 
     <td> {{ $v->phone }} </td> 
     <td> {{ $v->email }} </td> 
     <td> @if($v->status == 0) 未激活 @else 正常 @endif </td> 
     <td title="刮开即可查看密令" style="color: transparent;text-shadow: 0 0 10px rgba(0,0,0,0.8);"> <b>{{ $v->token }}</b></td> 
     <td> {{ date('Y-m-d h:i:s',$v->addtime)}}</td> 
     <td>
 
       <a href="/admin/users/{{$v->id}}" style="color:#000"><i class="icon-official" style="font-size:20px"></i></a>
       <a href="/admin/users/{{$v->id}}/edit" style="color:#000"><i class="icon-edit" style="font-size:25px"></i></a>

       <!-- <a href="" style="color:#000"><i class="icon-remove" style="font-size:23px;color:red"></i></a> -->
     </td> 
    </tr>
    @endforeach
   </tbody> 
  </table>

 </body>
</html>
     <div class="dataTables_info" id="DataTables_Table_1_info">【共 {{ $total}} 条数据】</div>
     <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate" style="margin:3px">
      {{ $list->appends($limit)->links() }}
     </div>
    </div> 
   </div> 
  </div>

@endsection