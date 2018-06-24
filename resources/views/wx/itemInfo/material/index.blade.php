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
    @include('wx.itemInfo.material._footer')
@else
    @include('wx.itemInfo.material._footer_no')
@endif

<div class="mui-content">
  @inject('itemShow', 'App\Presenters\ItemInfoPresenter')
  <!--商品介绍 开始-->
  <div class="mui-row lbd-goods-pic">
    @include('wx.itemInfo.material._banner')
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
      @include('wx.itemInfo.material._coupon_info_no')
  @else
      @include('wx.itemInfo.material._coupon_info')
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
    <ul class="mui-table-view" id="lbd-images-box">
        <li class="mui-table-view-cell mui-collapse" id='lbd-goods-imgs'>
            <a class="mui-navigate-right">图文详情</a>
            <div class="mui-collapse-content mui-text-center" id="couponInfoDetails">
              <p>详情加载中...</p>
            </div>
        </li>
    </ul>
  </div><!--图文详情 结束-->

  @include('wx.layouts._guess_you_like_coupon')

</div>
@stop
@section('footJs')
<script type="text/javascript" charset="utf-8">
  mui.init();
  var loadImg = 0;
  mui('#lbd-images-box').on('tap', 'li', function() {
    if (loadImg === 0) {
      loadImg++;
      mui.ajax('{{ route('api.itemInfoImages.itemDetailImage') }}', {
        data : {
          id : '{{ $itemInfo->num_iid }}'
        },
        dataType : 'json',//服务器返回json格式数据
        type : 'post',//HTTP请求类型
        timeout : 10000,//超时时间设置为10秒；
        headers : {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN' : '{{ csrf_token() }}'
        },
        success : function(data) {
          if (data == 415) {
            document.getElementById('couponInfoDetails').innerHTML = '<p>加载商品详情失败！</p>'
          } else {
            document.getElementById('couponInfoDetails').innerHTML = data;
          }
        },
        error : function(xhr,type,errorThrown){
            //异常处理；
            console.log(type);
        }
      });
    }
  });

  // 监听tap事件，解决 a标签 不能跳转页面问题
  mui('#lbd-footer-tab-item').on('tap','a',function(){
    document.location.href=this.href;
  })

  // 监听tap事件，让a标签自动加入url的参数
  mui('body').on('tap','.addURL',function(){
    document.location.href=this.href+'?url='+this.getAttribute('e');
  })
  // 监听tap事件，让a标签实现点击
  mui('body').on('tap','.lbd-a-no-tap',function(){
    document.location.href=this.href;
  })
</script>
@stop
