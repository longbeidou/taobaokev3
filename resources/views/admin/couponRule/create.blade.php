@extends('admin.layouts.form.index')

@section('title', $title)
@section('headcss')

@stop
@section('content')
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
      <div class="ibox float-e-margins">
          @include('admin.layouts.form._errors')
          @include('admin.layouts.form._tips')
          <div class="ibox-title">
              <h5>创建商品分类对应的优惠券api的参数</h5>
              <div class="ibox-tools">
                  <a href="{{ route('goodsCategorys.index') }}">
                      商品分类列表
                  </a>
              </div>
          </div>
          <div class="ibox-content" style="display: block;">
              <form class="form-horizontal" method="post" action="{{ route('admin.couponRule.store') }}" target="_self" enctype="multipart/form-data">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">adzone_id：</label>
                          <div class="col-sm-9">
                              <input type="number" name="adzone_id" min="1000" required="" class="form-control" placeholder="请输入adzone_id"> <span class="help-block m-b-none">mm_xxx_xxx_xxx的第三位</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">查询词：</label>
                          <div class="col-sm-9">
                              <input type="text" name="q" class="form-control" placeholder="请输入查询词">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">后台类目ID：</label>
                          <div class="col-sm-9">
                              <input type="text" name="cat" class="form-control" placeholder="请输入后台类目ID"> <span class="help-block m-b-none">后台类目ID，用,分割，最大10个，该ID可以通过taobao.itemcats.get接口获取到</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">是否优惠券商品?：</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="has_coupon">
                                <option value="true">优惠券商品</option>
                                <option value="false">全部商品</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="npx_level">牛皮癣程度：</label>
                          <div class="col-sm-9">
                              <label class="radio-inline" for="npx_level1">
                                  <input type="radio" value="1" id="npx_level1" name="npx_level" checked>不限</label>
                              <label class="radio-inline" for="npx_level2">
                                  <input type="radio" value="2" id="npx_level2" name="npx_level">无</label>
                              <label class="radio-inline" for="npx_level3">
                                  <input type="radio" value="2" id="npx_level3" name="npx_level">轻微</label>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">页大小：</label>
                          <div class="col-sm-9">
                              <input type="number" name="page_size" value="48" min="1" max="100" class="form-control" placeholder="请输入页大小"> <span class="help-block m-b-none">页大小：1~100</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">淘客佣金比率下限：</label>
                          <div class="col-sm-9">
                              <input type="number" name="start_tk_rate" min="1" class="form-control" placeholder="请输入淘客佣金比率下限"> <span class="help-block m-b-none">淘客佣金比率下限，如：1234表示12.34%</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">淘客佣金比率上限：</label>
                          <div class="col-sm-9">
                              <input type="number" name="end_tk_rate" min="1" class="form-control" placeholder="请输入淘客佣金比率上限"> <span class="help-block m-b-none">淘客佣金比率上限，如：1234表示12.34%</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">排序：</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="sort">
                                  <option value="">默认排序</option>
                                  <option value="total_sales_des">销量降序</option>
                                  <option value="total_sales_asc">销量升序</option>
                                  <option value="tk_rate_asc">淘客佣金比率升序</option>
                                  <option value="tk_rate_des">淘客佣金比率降序</option>
                                  <option value="tk_total_sales_asc">累计推广量升序</option>
                                  <option value="tk_total_sales_des">累计推广量降序</option>
                                  <option value="tk_total_commi_asc">总支出佣金升序</option>
                                  <option value="tk_total_commi_des">总支出佣金降序</option>
                                  <option value="price_asc">价格升序</option>
                                  <option value="price_des">价格降序</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">是否只选天猫商品：</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="is_tmall">
                                  <option value="false">全部商品</option>
                                  <option value="true">天猫商城商品</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">折扣价范围下限：</label>
                          <div class="col-sm-9">
                              <input type="number" name="start_price" min="5" class="form-control" placeholder="请输入折扣价范围下限"> <span class="help-block m-b-none">折扣价范围下限，单位：元</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">折扣价范围上限：</label>
                          <div class="col-sm-9">
                              <input type="number" name="end_price" min="10" class="form-control" placeholder="请输入折扣价范围上限"> <span class="help-block m-b-none">折扣价范围上限，单位：元</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">店铺dsr评分：</label>
                          <div class="col-sm-9">
                              <input type="text" name="start_dsr" class="form-control" placeholder="店铺dsr评分"> <span class="help-block m-b-none">筛选高于等于当前设置的店铺dsr评分的商品0-50000之间</span>

                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">是否海外商品：</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="is_overseas">
                                  <option value="false">全部商品</option>
                                  <option value="true">海外商品</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">所在地：</label>
                          <div class="col-sm-9">
                              <input type="text" name="itemloc" class="form-control" placeholder="请输入所在地">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">是否包邮：</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="need_free_shipment">
                                  <option value="false">不限</option>
                                  <option value="true">包邮</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">是否加入消费者保障？</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="need_prepay">
                                  <option value="false">不限</option>
                                  <option value="true">加入消费者保障</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">成交转化是否高于行业均值?</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="include_pay_rate_30">
                                  <option value="">不限</option>
                                  <option value="true">高于行业平均值</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">好评率是否高于行业均值?</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="include_good_rate">
                                  <option value="">不限</option>
                                  <option value="true">高于平均值</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">退款率是否低于行业均值？</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="include_rfd_rate">
                                  <option value="">不限</option>
                                  <option value="true">高于行业平均值</option>
                              </select>
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
