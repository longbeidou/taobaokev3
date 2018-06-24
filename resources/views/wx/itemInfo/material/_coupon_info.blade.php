<!--优惠券 开始-->
<div class="mui-row lbd-goods-coupon">
  <div class="mui-col-xs-9 lbd-left">
    <div class="lbd-left-circle lbd-0"></div>
    <div class="lbd-left-circle lbd-1"></div>
    <div class="lbd-left-circle lbd-2"></div>
    <div class="lbd-left-circle lbd-3"></div>
    <div class="lbd-money mui-pull-left">
      <span class="lbd-m">￥</span>{{ floor($couponInfo->coupon_amount) }}
    </div>
    <div class="lbd-date mui-pull-right">
      <div class="mui-text-center lbd-top">
        <span>优惠券</span>使用期限
      </div>
      <div class="lbd-bottom">{{ $couponInfo->coupon_start_time }}/{{ $couponInfo->coupon_end_time }}</div>
    </div>
  </div>
  <div class="mui-col-xs-3 lbd-right">
    <a rel="nofollow" href="https://www.baidu.com" class="lbd-link lbd-a-no-tap">立即领券</a>
    <div class="lbd-right-circle"></div>
  </div>
</div><!--优惠券 结束-->
