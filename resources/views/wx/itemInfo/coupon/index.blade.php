@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')

<header class="mui-bar mui-bar-transparent lbd-goods-header">
  <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
  <h1 class="mui-title">商品优惠券详情</h1>
</header>

@if(!empty($couponInfo))
    @include('wx.itemInfo.coupon._footer')
@else
    @include('wx.itemInfo.coupon._footer_no')
@endif

<div class="mui-content">
  @inject('itemShow', 'App\Presenters\ItemInfoPresenter')
  <!--商品介绍 开始-->
  <div class="mui-row lbd-goods-pic">
    @include('wx.itemInfo.coupon._banner')
    <div class="mui-col-xs-12 lbd-goods-desc">
      <div class="lbd-top">
        <h1>{{ $itemInfo->title }}</h1>
      </div>
      <div class="lbd-bottom">
        <div class="lbd-left mui-pull-left">
          券后价
          @if(empty($couponInfo))
          <span class="lbd-price-now">￥??.??</span>
          @else
          <span class="lbd-price-now">￥{{ $itemInfo->zk_final_price - $couponInfo->coupon_amount }}</span>
          @endif
          <span class="lbd-price-ori">￥{{ $itemInfo->zk_final_price }}</span>
        </div>
        <div class="lbd-right mui-pull-right">{{ $itemInfo->volume }}人已购</div>
      </div>
    </div>
  </div><!--商品介绍 结束-->
  @if(empty($couponInfo))
      @include('wx.itemInfo.coupon._coupon_info_no')
  @else
      @include('wx.itemInfo.coupon._coupon_info')
  @endif
  <!--店铺信息 开始-->
  <div class="mui-row lbd-goods-shop">
    <div class="mui-col-xs-12 lbd-name">{{ $itemInfo->nick }}</div>
    <div class="mui-col-xs-12 lbd-dsr">
      <ul>
        <!-- <li class="lbd-goods-title">店铺评分</li> -->
        <li>类型：{{ $itemShow->makeUserTypeToText($itemInfo->user_type) }}</li>
        <li>商品所在地：{{ $itemInfo->provcity }}</li>
        <li>卖家id：{{ $itemInfo->seller_id }}</li>
      </ul>
    </div>
  </div><!--店铺信息 结束-->
  <!--图文详情 开始-->
  <div class="mui-row lbd-goods-info">
    <ul class="mui-table-view">
        <li class="mui-table-view-cell mui-collapse" id='lbd-goods-imgs'>
            <a class="mui-navigate-right">图文详情</a>
            <div class="mui-collapse-content mui-text-center" id="couponInfoDetails"></div>
        </li>
    </ul>
  </div><!--图文详情 结束-->

  @include('wx.layouts._guess_you_like_coupon')

</div>
@stop
@section('footJs')
<script type="text/javascript" charset="utf-8">
  mui.init();
</script>
@stop
