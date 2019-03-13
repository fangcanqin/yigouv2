@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-table"></i> 用户详情信息</span>
</div>
<div class="mws-panel-body no-padding">
    <table class="mws-table">
        <thead>
            <tr>
                <th>用户名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>手机号</th>
                <th>地址</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $info->username }}</td>
                <td>
                    @if($info->sex == 0)
                    女
                    @elseif($info->sex == 1)
                    男
                    @else
                    保密
                    @endif
                </td>
                <td>{{ $info->age }}</td>
                <td>{{ $info->tel }}</td>
                <td>{{ $info->addr }}{{ $info->xq }}</td>
                <td>
                    <a href="{{$url}}">返回</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
@endsection