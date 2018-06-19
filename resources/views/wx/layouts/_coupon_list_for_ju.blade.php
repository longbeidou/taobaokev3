@inject('couponShow', 'App\Presenters\CouponListPresenter')
@foreach($juItems as $item)
<li class="mui-table-view-cell mui-media lbd-ju-info">
    <a href="{{ $item->wap_url }}">
    	<div class="mui-row">
    		<div class="mui-col-xs-4 goods-image">
    			<img data-lazyload="{{ $item->pic_url_for_w_l }}"/>
    		</div>
    		<div class="mui-col-xs-8 lbd-content-top">
    			<p class="lbd-title">{{ $item->title }}</p>
    			<p class="lbd-usp mui-text-center">
    				<span class="lbd-info">{{ $item->item_usp_list->string[0] }}</span>/<span class="lbd-info">{{ $item->item_usp_list->string[1] }}</span>/<span class="lbd-info">{{ $item->item_usp_list->string[2] }}</span>
    			</p>
    			<p class="mui-text-right mui-price-info">
    				<span class="mui-mark-now">￥</span>
    				<span class="mui-price_now">{{ $item->act_price }}</span>
    				<span class="mui-mark-ori">￥</span>
    				<span class="mui-price_ori">{{ $item->orig_price }}</span>
    			</p>
    		</div>
    		<div class="mui-col-xs-8 lbd-content-buttom mui-text-right">
    			<div class="lbd-coupon-box mui-text-center">
						<div class="lbd-left-circle-1"></div>
						<div class="lbd-left-circle-2"></div>
						<div class="lbd-left-circle-3"></div>
						<div class="lbd-right-circle-1"></div>
						<div class="lbd-right-circle-2"></div>
						<div class="lbd-right-circle-3"></div>
						<p class="lbd-usp-des">{{ $item->price_usp_list->string[0] }}</p>
						<p class="lbd-date-begin">开始时间：{{ $couponShow->makeIntergerToDateTimeString($item->online_start_time) }}</p>
						<p class="lbd-date-end">结束时间：{{ $couponShow->makeIntergerToDateTimeString($item->online_end_time) }}</p>
    			</div>
    		</div>
    	</div>
    </a>
</li>
@endforeach
