@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-table"></i> 公告列表</span>
</div>
<div class="mws-panel-body no-padding">
    <form action="/admin/notice">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_0_length" class="dataTables_length"><label>显示 
    <select size="1" name="show" aria-controls="DataTables_Table_0">
    <option value="5" selected="selected" @if($show == 5) selected @endif>5</option>
    <option value="10" @if($show == 10) selected @endif >10</option>
    <option value="15"  @if($show == 15) selected @endif >15</option>
    <option value="20"  @if($show == 20) selected @endif >20</option></select> 条</label></div><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>搜索: <input type="text" aria-controls="DataTables_Table_0" name="search" value="{{$search}}"></label><input type="submit" value="搜索" class="btn btn-info"></div></form>
    <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
            <tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">标题</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">内容</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 191px;">创建时间</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">更新时间</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">发布者</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th></tr>
        </thead>
        
    <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($list as $k => $v)
        <tr class="odd">
        <td class="  ">{{$v->id}}</td>
        <td class="  sorting_1">{{$v->title}}</td>
        <td class=" ">{{$v->content}}</td>
        <td class=" ">{{$v->created_at}}</td>
        <td class=" ">{{$v->updated_at}}</td>
        <td class=" ">{{$v->admin}}</td>
        <td class=" " style="width:200px">
            <form action="/admin/notice/{{$v->id}}" method="post" style="display:inline-block">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" value="删除" class="btn btn-waring" style="display:inline-block" >
            </form>
            <a href="/admin/notice/{{$v->id}}/edit" class="btn btn-info">修改</a>
        </td>
        </tr>
        @endforeach
    </tbody></table>
    <div class="dataTables_info" id="DataTables_Table_0_info">[共{{$total}}条数据]</div><div class="dataTables_paginate paging_two_button" id="DataTables_Table_0_paginate">{{$list->appends(['show'=>$show,'search'=>$search])->links()}}</div>
</div>
</div>
@endsection