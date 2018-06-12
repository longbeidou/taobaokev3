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
              <h5>商品分类对应的优惠券api的参数</h5>
              <div class="ibox-tools">
                  <a href="{{ route('goodsCategorys.index') }}">
                      商品分类列表
                  </a>
              </div>
          </div>
          <div class="ibox-content" style="display: block;">
            <div class="row form-body form-horizontal m-t">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">商品分类ID：</label>
                            <div class="col-sm-9">
                                <p>{{ $couponRule->goods_category_id }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">后台类目ID：</label>
                            <div class="col-sm-9">
                                <p>{{ $couponRule->cat }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">页大小：</label>
                            <div class="col-sm-9">
                                <p>{{ $couponRule->page_size }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">查询词：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->q }}</p>
                            </div>
                        </div>
                    </div>

                  </div>
                </div>
          </div>
      </div>
  </div>
</div>
@stop
@section('footJs')

@stop
