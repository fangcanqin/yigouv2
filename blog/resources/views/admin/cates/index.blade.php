@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-table"></i> 分类列表信息</span>
</div>
<div class="mws-panel-body no-padding">
    <table class="mws-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>分类名</th>
                <th>PATH</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $k => $v)
            <tr >
                <td> 
                    {{ $v->id }}</td>
                <td style="text-align:left;width:200px;@if ($v->pid ==0) font-size:14px;font-weight:bold; @endif">
                    <span style="margin-left:60px;">{{ $v->name }} 
                    </span>
                </td>
                <td>{{ $v->path }}</td>
                <td>{{ $v->status == 1? '上架' : '下架'}}</td>
                <td style="width:200px">
                    <a href="/admin/cates/create?pid={{$v->id}}" class="btn btn-info">添加子分类 </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection