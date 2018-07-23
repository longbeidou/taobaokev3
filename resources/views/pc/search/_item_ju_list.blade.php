@inject('ju', 'App\Presenters\JuPresenter')
@inject('couponShow', 'App\Presenters\CouponListPresenter')
@foreach($juItems as $key => $item)
<div class="row ju-box">
    <div class="col-xs-4 ju-image">
        <a rel="nofollow" href="{{ $item->pc_url }}" target="_blank"><img src="{{ $item->pic_url_for_w_l }}"></a>
    </div>
    <div class="col-xs-8 ju-info">
        <h2><a rel="nofollow" href="{{ $item->pc_url }}" target="_blank"><img src="/pcstyle/images/ju32.png" alt="聚划算logo"> {{ $item->title }}</a></h2>
        <div class="ju-special">
            <span class="tips">产品特点：</span>
            <ul class="list-inline">
                <li>{{ $item->item_usp_list->string[0] }}</li>
                <li>{{ $item->item_usp_list->string[1] }}</li>
                <li>{{ $item->item_usp_list->string[2] }}</li>
            </ul>
        </div>
        <div class="row ju-bottom">
            <div class="col-xs-8 ju-take-box">
                <p class="ju-price-info">聚划算活动价:￥<span class="ju-now">{{ number_format($item->act_price, 2) }}</span>元 / 原价:￥<span class="ju-ori">{{ number_format($item->orig_price, 2) }}</span>元</p>
                <p class="ju-you">包邮免运费</p>
                <div class="text-center ju-action">
                    <p class="ju-s">{{ $item->price_usp_list->string[0] }}</p>
                    <p class="ju-date">活动开始时间:{{ $couponShow->makeIntergerToDateTimeString($item->online_start_time) }}</p>
                    <p class="ju-date">活动结束时间:{{ $couponShow->makeIntergerToDateTimeString($item->online_end_time) }}</p>
                    <div class="ju-link">
                        <a rel="nofollow" href="{{ $item->pc_url }}" target="_blank">马上领取</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 ju-ercode-img">
                <p class="text-center">手机淘宝APP扫码购买</p>
                <img class="lazy" data-original="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $item->wap_url }}" >
            </div>
        </div>
    </div>
</div>
@endforeach
