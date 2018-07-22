@inject('couponShow', 'App\Presenters\CouponListPresenter')
@foreach($materialItems as $key => $item)
    @if(!empty($item->coupon_info))
    <div class="col-xs-3 item-box">
      <a no='data{{ $key }}' href="{{ route('pc.itemInfo.iteminfo', ['id'=>$item->num_iid]) }}" title="{{ $item->title }}" target="_blank">
        <div class="item">
          <div class="img-box"><img class="lazy" data-original="{{ $item->pict_url }}"></div>
          <h2>{!! $couponShow->imgTaobaoOrTmall($item->user_type) !!} {{ $item->title }}</h2>
          <hr>
          <div class="info">
            <div class="row price-now">
              <div class="col-xs-12">
                <div class="pull-left">现价￥{{ $item->zk_final_price }}</div>
                <div class="pull-right">月销:{{ $item->volume }}</div>
              </div>
            </div>
            <div class="row price-ori">
              <div class="col-xs-12">
                <div class="pull-left">券后<span class="prefix">￥</span><span class="number">{{ $couponShow->finalPrice($item->coupon_info, $item->zk_final_price) }}</span></div>
                <div class="pull-right">
                  <div class="circle-left"></div>
                  <div class="circle-right"></div>
                  ￥<span class="money">{{ $couponShow->saveMoney($item->coupon_info, $item->zk_final_price, 0) }}</span>元券
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>
      <data id="data{{ $key }}" para="{{ $couponShow->getParaStrFromUrl($item->coupon_share_url) }}"></data>
    </div>
    @endif
@endforeach
