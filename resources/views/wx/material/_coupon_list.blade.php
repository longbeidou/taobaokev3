<div class="mui-scroll lbd-goods-list" id="lbd-goods-list">
    <ul class="mui-table-view lbd-goods-list-info">
        @inject('material', 'App\Presenters\OptimusMaterialPresenter')
        @foreach($items as $key => $item)
          @if(!empty($item->coupon_click_url))
          <li class="mui-table-view-cell mui-media">
            <a class="addPara" no='data{{ $key }}' href="{{ route('wx.itemInfo.iteminfo') }}/{{ $item->item_id }}">
              <data id="data{{ $key }}" link='{{ $material->getParaStrFromUrl($item->coupon_click_url) }}' coupon="coupon_info={{ date('Y-m-d', $item->coupon_start_time/1000) }}and{{ date('Y-m-d', $item->coupon_end_time/1000) }}and{{ $item->coupon_amount }}"></data>
              <div class="mui-row">
                <div class="mui-col-xs-4 goods-image">
                  <img data-lazyload="{{ $item->pict_url }}"/>
                </div>
                <div class="mui-col-xs-8 lbd-content">
                  <p class="lbd-title">{{ $item->title }}</p>
                </div>
                <div class="mui-col-xs-8 lbd-content-more">
                  <div class="lbd-top">
                    @if($item->user_type == 1)
                    <span class="lbd-from-tmall">天猫</span>
                    @else
                    <span class="lbd-from-taobao">淘宝</span>
                    @endif
                    <span class="lbd-from-new">今日上新</span>
                    销量：{{ $item->volume }}
                  </div>
                  <div class="lbd-bottom">
                    <div class="mui-pull-left">
                      <div class="lbd-price-ori">原价￥{{ number_format($item->zk_final_price, 2) }}</div>
                      <div class="lbd-price-now"><span class="lbd-m">￥</span>{{ number_format($item->zk_final_price - $item->coupon_amount, 2) }}</div>
                    </div>
                    <div class="mui-pull-right">
                      <div class="lbd-coupon">
                        <div class="lbd-left-circle"></div>
                        <div class="lbd-right-circle"></div>
                        <span class="lbd-m">￥</span>{{ $item->coupon_amount }}元券
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </li>
          @endif
        @endforeach
    </ul>
</div>
