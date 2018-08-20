@inject('couponShow', 'App\Presenters\CouponListPresenter')
@foreach($pinTuanItems as $key => $item)
@if(!empty($item->jdd_price))
<div class="col-xs-3 item-box">
    <a no='dataom{{ $key }}' href="{{ route('pc.itemInfo.pinTuanInfo', ['id'=>$item->item_id]) }}" title="{{ $item->title }}" target="_blank">
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
                        <div class="pull-left pt-dmj">单买价￥{{ number_format($item->orig_price, 2) }}</div>
                        <div class="pull-right pt-num">{{ $item->sell_num }}人已拼团</div>
                    </div>
                </div>
                <div class="row price-ori">
                    <div class="col-xs-12">
                        <div class="pull-left pt-ptj">拼团价<span class="prefix">￥</span><span class="number">{{ number_format($item->jdd_price, 2) }}</span></div>
                        <div class="pull-right pt-people-box">
                            @if($item->jdd_num == 2)
                            <span class="pt-people p2">2人团</span>
                            @else
                            <span class="pt-people p4">4人团</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <data id="dataom{{ $key }}" para="{{ $couponShow->getParaStrFromUrl($item->click_url) }}&pintuan_info={{ $item->ostime }}and{{ $item->oetime }}and{{ number_format($item->orig_price, 2) }}and{{ number_format($item->jdd_price, 2) }}and{{ $item->item_description }}"></data>
</div>
@endif
@endforeach
