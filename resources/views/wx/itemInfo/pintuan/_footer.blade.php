@inject('itemShow', 'App\Presenters\ItemInfoPresenter')
<nav class="mui-bar mui-bar-tab lbd-footer-tab lbd-goods-footer" id="lbd-footer-tab-item">
    <a title="聚划算拼团会场" class="mui-tab-item" href="{{ route('wx.optimusMaterial.pintuan') }}" style="width: 100%;">
      <span class="mui-icon mui-icon-extra mui-icon-extra-peoples"></span>
      <span class="mui-tab-label">拼团主会场</span>
    </a>
    <a class="mui-tab-item" rel="nofollow" href="{{ route('wx.ShareItem.pintuan', $itemInfo->num_iid) }}{{ $itemShow->concatCouponLinkPara($pintuanLinkPara) }}&pintuan_info={{ $pintuanInfoStr }}" style="width: 100%;">
        <span class="mui-icon mui-icon-extra mui-icon-extra-share"></span>
        <span class="mui-tab-label">分享</span>
    </a>
    <a class="mui-tab-item" rel="nofollow" href="{{ route('wx.CouponAction.pintuan', $itemInfo->num_iid) }}{{ $itemShow->concatCouponLinkPara($pintuanLinkPara) }}" style="width: 90px; color: #fff; background-color: rgba(237, 42, 122, 0.5);">
        <span class="mui-icon" style="width: initial; font-size: 20px; font-weight: 800; padding-top: 6px;">{{ number_format($pintuanInfo->orig_price, 2) }}</span>
        <span class="mui-tab-label">单买价</span>
    </a>
    <a class="mui-tab-item" rel="nofollow" href="{{ route('wx.CouponAction.pintuan', $itemInfo->num_iid) }}{{ $itemShow->concatCouponLinkPara($pintuanLinkPara) }}" style="width: 90px; color: #fff; background-color: rgba(237, 42, 122, 1);">
        <span class="mui-icon" style="width: initial; font-size: 20px; font-weight: 800; padding-top: 6px;">{{ number_format($pintuanInfo->jdd_price, 2) }}</span>
        <span class="mui-tab-label">拼团价</span>
    </a>
</nav>
