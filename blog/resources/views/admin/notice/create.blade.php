@extends('admin.layout.index')
@section('content')
@if (count($errors) > 0)
    <div class="mws-form-message warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mws-panel grid_8">
<div class="mws-panel-header">
    <span><i class="icon-magic"></i> 添加公告</span>
</div>
<div class="mws-panel-body no-padding">
<form class="mws-form wzd-default wizard-form wizard-form-horizontal" action="/admin/notice" method="post">
        {{csrf_field()}}
        <fieldset class="wizard-step mws-form-inline" data-wzd-id="wzd_1d65s4iv3evq17kg1dih_0" style="display: block;">
            <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i> Member Profile</legend>
            <div id="" class="mws-form-row">
                <label class="mws-form-label">标题: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <input type="text" name="title" class="required large" value="{{old('title')}}">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">作者: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <input type="text" name="author" class="required email large" value="{{old('author')}}">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">内容: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <textarea rows="" cols="" class="required large" name="content">{{old('content')}}</textarea>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">状态: <span class="required">*</span></label>
                <div class="mws-form-item">
                    <ul class="mws-form-list">
                        <li><input type="radio" id="male" name="status" class="required" value="0" checked> <label for="male">暂不发布</label></li>
                        <li><input type="radio" id="female" name="status" value="1"> <label for="female">即可发布</label></li>
                    </ul>
                    <label class="error plain" generated="true" for="gender" style="display:none"></label>
                </div>
            </div>
        </fieldset>
 
    <div class="mws-button-row"><input type="submit" value="添加" class="btn"></div></form>
</div>
</div>
@endsection