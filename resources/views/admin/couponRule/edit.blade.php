@extends('admin.layouts.form.index')

@section('title', $title)
@section('headcss')

@stop
@section('content')
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
      <div class="ibox float-e-margins">
          @include('admin.layouts.form._errors')
          @include('admin.layouts.form._tips')
          <div class="ibox-title">
              <h5>修改商品分类对应的优惠券api的参数</h5>
              <div class="ibox-tools">
                  <a href="{{ route('goodsCategorys.index') }}">
                      商品分类列表
                  </a>
              </div>
          </div>
          <div class="ibox-content" style="display: block;">
              <form class="form-horizontal" method="post" action="{{ route('admin.couponRule.update', $couponRule->id) }}" target="_self" enctype="multipart/form-data">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">类目id：</label>
                          <div class="col-sm-9">
                              <input type="text" name="cat" value="{{ $couponRule->cat }}" class="form-control" placeholder="请输入后台类目ID">
                              <span class="help-block m-b-none">后台类目ID，用,分割，最大10个，</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">页大小：</label>
                          <div class="col-sm-9">
                              <input type="number" name="page_size" required class="form-control" value="{{ $couponRule->page_size }}" min="1" max="100" step="1" placeholder="页大小">
                              <span class="help-block m-b-none">页大小的范围：1~100</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">查询词：</label>
                          <div class="col-sm-9">
                              <input type="text" name="q" required value="{{ $couponRule->q }}" class="form-control" placeholder="请输入查询词">
                          </div>
                      </div>
                  </div>
                  <input type="hidden" name="goods_category_id" value="{{ $goodsCategoryId }}">
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
