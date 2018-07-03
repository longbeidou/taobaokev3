@inject('itemShow', 'App\Presenters\ItemInfoPresenter')
<nav class="mui-bar mui-bar-tab lbd-footer-tab lbd-goods-footer" id="lbd-footer-tab-item">
    <a title="淘宝天猫优惠券" class="mui-tab-item" href="{{ route('wx.index') }}" style="width: 100%;">
        <span class="mui-icon mui-icon-home"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item" rel="nofollow" href="{{ route('wx.ShareItem.coupon', $itemInfo->num_iid) }}{{ $itemShow->concatCouponLinkPara($couponLinkPara) }}&coupon_amount={{ floor($couponInfo->coupon_amount) }}" style="width: 100%;">
        <span class="mui-icon mui-icon-extra mui-icon-extra-share"></span>
        <span class="mui-tab-label">分享</span>
    </a>
    <a title="搜索关于{{ $itemInfo->title }}的淘宝优惠券" class="mui-tab-item" href="{{ route('wx.search.all') }}?q={{ $itemInfo->title }}" style="width: 100%;">
        <span class="mui-icon mui-icon-search"></span>
        <span class="mui-tab-label">搜同款</span>
    </a>

    <a class="mui-tab-item lbd-take" rel="nofollow" href="{{ route('wx.CouponAction.index', $itemInfo->num_iid) }}{{ $itemShow->concatCouponLinkPara($couponLinkPara) }}" style="width: 140px;">
        <span class="mui-tab-label">
          领取{{ floor($couponInfo->coupon_amount) }}元券
          <div class="lbd-left-circle lbd-01"></div>
          <div class="lbd-left-circle lbd-2"></div>
          <div class="lbd-left-circle lbd-3"></div>
          <div class="lbd-right-circle lbd-01"></div>
          <div class="lbd-right-circle lbd-2"></div>
          <div class="lbd-right-circle lbd-3"></div>
        </span>
    </a>
</nav>
