@inject('itemShow', 'App\Presenters\ItemInfoPresenter')
<!--优惠券 开始-->
<div class="mui-row lbd-goods-coupon">
  <div class="mui-col-xs-9 lbd-left">
    <div class="lbd-left-circle lbd-0"></div>
    <div class="lbd-left-circle lbd-1"></div>
    <div class="lbd-left-circle lbd-2"></div>
    <div class="lbd-left-circle lbd-3"></div>
    <!-- <div class="lbd-money mui-pull-left">
      <span class="lbd-m">￥</span>{{ number_format($pintuanInfo->orig_price - $pintuanInfo->jdd_price, 2) }}
    </div> -->
    <div class="lbd-date mui-pull-left">
      <div class="lbd-bottom">拼团开始时间:{{ $pintuanInfo->ostime }}</div>
      <div class="lbd-bottom">拼团结束时间:{{ $pintuanInfo->oetime }}</div>
    </div>
  </div>
  <div class="mui-col-xs-3 lbd-right">
    <a rel="nofollow" href="{{ route('wx.CouponAction.pintuan', $itemInfo->num_iid) }}{{ $itemShow->concatCouponLinkPara($pintuanLinkPara) }}" class="lbd-link lbd-a-no-tap">拼团购买</a>
    <!-- <div class="lbd-right-circle"></div> -->
  </div>
</div><!--优惠券 结束-->
