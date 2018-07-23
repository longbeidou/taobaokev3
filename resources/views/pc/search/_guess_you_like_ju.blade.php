@inject('couponShow', 'App\Presenters\CouponListPresenter')
@foreach($guessYouLikeItems as $key => $item)
    @if(!empty($item->coupon_info))
    <div class="col-xs-6 item-box coupon-list">
        <a no='data{{ $key }}' title="{{ $item->title }}" href="{{ route('pc.itemInfo.iteminfo', ['id'=>$item->num_iid]) }}" target="_blank">
            <div class="item">
                <div class="img-box"><img class="lazy" data-original="{{ $item->pict_url }}"></div>
                <h2>{!! $couponShow->imgTaobaoOrTmall($item->user_type) !!} {{ $item->title }}</h2>
                <p class="text-center">￥{{ $couponShow->finalPrice($item->coupon_info, $item->zk_final_price, 2) }}<del>￥{{ number_format($item->zk_final_price, 2) }}</del></p>
            </div>
        </a>
        <data id="data{{ $key }}" para="{{ $couponShow->getParaStrFromUrl($item->coupon_click_url) }}"></data>
    </div>
    @endif
  @endforeach
