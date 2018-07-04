<?php
  $hour = \Carbon\Carbon::now()->hour;
  $targetHour = substr($item->start_time, 11, 2);
?>
@inject('tqg', 'App\Presenters\TaoQiangGouPresenter')
@if ( $hour >= $targetHour)
  @if(!empty($tqg->getParasStrFromClickUrl($item->click_url)))
  <li class="mui-table-view-cell lbd-info">
    <a rel="nofollow" href="{{ route('wx.webJump.tqg') }}?e={{ $tqg->getParasStrFromClickUrl($item->click_url) }}">
      <div class="mui-row lbd-box">
        <div class="mui-col-xs-4 lbd-img">
          <img src="{{ $item->pic_url }}"/>
        </div>
        <div class="mui-col-xs-8 lbd-more">
          <div class="lbd-top">
            <h4 class="lbd-name">{{ $item->title }}</h4>
          </div>
        </div>
        <div class="mui-col-xs-8 lbd-bottom">
          <div class="mui-pull-left">
            <p>
              <span class="lbd-m">￥</span><span class="lbd-price-now">{{ number_format($item->reserve_price, 2) }}</span>
              <span class="lbd-price-ori">￥{{ number_format($item->zk_final_price, 2) }}</span>
            </p>
            <div class="lbd-tip">疯抢进行中</div>
          </div>
          <div class="mui-pull-right">
            <div class="mui-text-center lbd-take">马上抢 ></div>
            <div class="mui-pull-right lbd-mount">{{ $item->total_amount }}件已抢</div>
          </div>
        </div>
      </div>
    </a>
  </li>
  @endif
@else
  @if(!empty($tqg->getParasStrFromClickUrl($item->click_url)))
  <li class="mui-table-view-cell lbd-info">
    <a rel="nofollow" href="{{ route('wx.webJump.tqg') }}?e={{ $tqg->getParasStrFromClickUrl($item->click_url) }}">
      <div class="mui-row lbd-box">
        <div class="mui-col-xs-4 lbd-img">
          <img src="{{ $item->pic_url }}"/>
        </div>
        <div class="mui-col-xs-8 lbd-more">
          <div class="lbd-top">
            <h4 class="lbd-name">{{ $item->title }}</h4>
          </div>
        </div>
        <div class="mui-col-xs-8 lbd-bottom">
          <div class="mui-pull-left lbd-bottom-box">
            <p class="mui-text-right">
              <span class="lbd-m">￥</span><span class="lbd-price-now">{{ number_format($item->reserve_price, 2) }}</span>
              <span class="lbd-price-ori">￥{{ number_format($item->zk_final_price, 2) }}</span>
            </p>
            <div class="lbd-tip-no">{{$targetHour}}:00准时开抢</div>
          </div>
        </div>
      </div>
    </a>
  </li>
  @endif
@endif
