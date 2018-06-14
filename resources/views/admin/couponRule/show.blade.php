@extends('admin.layouts.form.index')

@section('title', $title)
@section('headcss')

@stop
@section('content')
<div class="row">
  <div class="col-sm-8 col-sm-offset-2">
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

                        <div class="form-group">
                            <label class="col-sm-3 control-label">adzone_id：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->adzone_id }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">查询词：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->q }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">后台类目ID：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->cat }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否优惠券商品</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->has_coupon }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">牛皮癣程度：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->npx_level }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">页大小：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->page_size }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">淘客佣金比率下限：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->start_tk_rate }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">淘客佣金比率上限：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->end_tk_rate }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">排序：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->sort }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否只选天猫商品：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->is_tmall }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">折扣价范围下限：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->start_price }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">折扣价范围上限：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->end_price }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">店铺dsr评分：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->start_dsr }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否海外商品：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->is_overseas }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">所在地：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->itemloc }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否包邮：</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->need_free_shipment }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否加入消费者保障？</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->need_prepay }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">成交转化是否高于行业均值</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->include_pay_rate_30 }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">好评率是否高于行业均值</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->include_good_rate }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">退款率是否低于行业均值？</label>
                            <div class="col-sm-9">
                              <p>{{ $couponRule->include_rfd_rate }}</p>
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
