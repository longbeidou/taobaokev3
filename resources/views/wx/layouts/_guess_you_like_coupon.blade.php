@inject('couponShow', 'App\Presenters\CouponListPresenter')
<!--猜你喜欢 开始-->
<div class="mui-row lbd-guess-you-like">
  <h5 class="mui-text-center"><i class="mui-icon mui-icon-star"></i> 猜你喜欢</h5>
</div>
<!--商品列表 开始-->
<div class="mui-row lbd-goods-list" id="lbd-goods-list">
  <ul class="mui-table-view lbd-goods-list-info">
      @foreach($guessYouLikeCoupons as $coupon)
      <li class="mui-table-view-cell mui-media">
          <a class="addURL" e="{{ $couponShow->getParaStrFromCouponUrl($coupon->coupon_click_url) }}" href="{{ route('wx.itemInfo.index.coupon', $coupon->num_iid) }}">
            <div class="mui-row">
              <div class="mui-col-xs-4 goods-image">
                <img src="{{ $coupon->pict_url }}"/>
              </div>
              <div class="mui-col-xs-8 lbd-content">
                <p class="lbd-title">{{ $coupon->title }}</p>
              </div>
              <div class="mui-col-xs-8 lbd-content-more">
                <div class="lbd-top">
                  <!-- <span class="lbd-from-tmall">天猫</span> -->
                  {!! $couponShow->showTmallOrTaobao($coupon->user_type) !!}
                  <span class="lbd-from-new">今日上新</span>
                  销量：{{ $coupon->volume }}
                </div>
                <div class="lbd-bottom">
                  <div class="mui-pull-left">
                    <div class="lbd-price-ori">原价￥{{ $coupon->zk_final_price }}</div>
                    <div class="lbd-price-now"><span class="lbd-m">￥</span>{{ $couponShow->finalPrice($coupon->coupon_info, $coupon->zk_final_price) }}</div>
                  </div>
                  <div class="mui-pull-right">
                    <div class="lbd-coupon">
                      <div class="lbd-left-circle"></div>
                      <div class="lbd-right-circle"></div>
                      <span class="lbd-m">￥</span>{{ $couponShow->saveMoney($coupon->coupon_info, $coupon->zk_final_price) }}元券
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
      </li>
      @endforeach
  </ul>
</div><!--商品列表 结束-->
