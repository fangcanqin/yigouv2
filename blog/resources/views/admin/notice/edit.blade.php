@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-magic"></i> 修改公告</span>
</div>
<div class="mws-panel-body no-padding">
<form class="mws-form wzd-default wizard-form wizard-form-horizontal" action="/admin/notice/{{$info->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" value="{{$url}}" name="url">
     
        <fieldset class="wizard-step mws-form-inline" data-wzd-id="wzd_1d65s4iv3evq17kg1dih_0" style="display: block;">
            <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i> Member Profile</legend>
            <div id="" class="mws-form-row">
                <label class="mws-form-label">标题: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <input type="text" name="title" class="required large" value="{{$info->title}}">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">作者: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <input type="text" name="author" class="required email large" value="{{$info->author}}">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">内容: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <textarea rows="" cols="" class="required large" name="content">{{$info->content}}</textarea>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">状态: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <ul class="mws-form-list">
                        <li><input type="radio" id="male" name="status" class="required" value="0" checked> <label for="male" {{$info->status == 0 ? 'checked' : ' '}}>暂不发布</label></li>
                        <li><input type="radio" id="female" name="status" value="1" {{$info->status == 1 ? 'checked' : ' '}}> <label for="female">即可发布</label></li>
                    </ul>
                    <label class="error plain" generated="true" for="gender" style="display:none"></label>
                </div>
            </div>
        </fieldset>
 
    <div class="mws-button-row"><input type="submit" value="修改" class="btn"></div></form>
</div>
</div>
@endsection