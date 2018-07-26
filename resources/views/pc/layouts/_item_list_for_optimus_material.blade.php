@inject('couponShow', 'App\Presenters\CouponListPresenter')
@foreach($optimusMaterialItems as $key => $item)
@if(!empty($item->coupon_click_url) && !empty($item->coupon_start_time))
<div class="col-xs-3 item-box">
    <a no='dataom{{ $key }}' href="{{ route('pc.itemInfo.iteminfo', ['id'=>$item->num_iid]) }}" title="{{ $item->title }}" target="_blank">
        <div class="item">
            <div class="img-box">
              <img class="lazy" data-original="{{ $item->pict_url }}">
              @if(empty($item->item_description))
              <div class="item-desc">热销商品推荐</div>
              @else
              <div class="item-desc">{{ $item->item_description }}</div>
              @endif
            </div>
            <h2>{!! $couponShow->imgTaobaoOrTmall($item->user_type) !!} {{ $item->title }}</h2>
            <hr>
            <div class="info">
                <div class="row price-now">
                    <div class="col-xs-12">
                        <div class="pull-left">现价￥{{ number_format($item->zk_final_price, 2) }}</div>
                        <div class="pull-right">月销:{{ $item->volume }}</div>
                    </div>
                </div>
                <div class="row price-ori">
                    <div class="col-xs-12">
                        <div class="pull-left">券后<span class="prefix">￥</span><span class="number">{{ number_format($item->zk_final_price - $item->coupon_amount, 2) }}</span></div>
                        <div class="pull-right">
                            <div class="circle-left"></div>
                            <div class="circle-right"></div>
                            ￥<span class="money">{{ $item->coupon_amount }}</span>元券
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <data id="dataom{{ $key }}" para="{{ $couponShow->getParaStrFromUrl($item->coupon_click_url) }}&coupon_info={{ date('Y-m-d', $item->coupon_start_time/1000) }}and{{ date('Y-m-d', $item->coupon_end_time/1000) }}and{{ number_format($item->coupon_amount, 0) }}"></data>
</div>
@endif
@endforeach
