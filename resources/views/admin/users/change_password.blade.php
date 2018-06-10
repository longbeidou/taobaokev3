@extends('admin.layouts.form.index')

@section('title', $title)
@section('headcss')

@stop
@section('content')
<div class="row form-body form-horizontal m-t">
    <div class="col-md-8">

    </div>
</div>


<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
      <div class="ibox float-e-margins">
          @include('admin.layouts.form._errors')
          @include('admin.layouts.form._tips')
          <div class="ibox-title">
              <h5>修改密码</h5>
          </div>
          <div class="ibox-content" style="display: block;">
              <form class="form-horizontal" method="post" action="" target="_self">
                  <p>欢迎登录本站(⊙o⊙)</p>
                  <div class="form-group">
                      <label class="col-sm-3 control-label">原始密码：</label>
                      <div class="col-sm-9">
                          <input type="password" required class="form-control" name="password_ori" placeholder="请输入原始密码">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label">新密码：</label>
                      <div class="col-sm-9">
                          <input type="password" required class="form-control" name="password" placeholder="请输入新密码">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label">确认密码：</label>
                      <div class="col-sm-9">
                          <input type="password" required class="form-control" name="password_confirmation" placeholder="请再次输入新密码">
                      </div>
                  </div>
                  {{ csrf_field() }}
                  <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-8">
                          <button class="btn btn-sm btn-primary" type="submit">提 交</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@stop
@section('footJs')

@stop
