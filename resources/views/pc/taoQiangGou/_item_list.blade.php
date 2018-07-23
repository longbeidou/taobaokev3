<div class="container-fluid tqg-item">
    @inject('tqg', 'App\Presenters\TaoQiangGouPresenter')
    @foreach($tqgItems as $key => $itemsArr)
    <?php
    $status = $tqg->statusShow($rulesArr, $key, $rulesArr[$key]['hour']);
    ?>
    <div  class="container item-pannel {{ $tqg->activeShowPC($rulesArr, $key, $rulesArr[$key]['hour']) }} item{{ $key }}">
        <div class="row tqg-top">
            @if($status == -1)
            <div class="col-xs-6 tips">本场次还有宝贝可以继续抢购哦</div>
            @elseif($status == 0)
            <div class="col-xs-6 tips">限时限量 疯狂抢购</div>
            <div class="col-xs-6 text-right time">距离本场结束：<span class="left-time" id="time-left-active" endtime="{{ $tqg->getActiveEndTime($rulesArr, $key) }}">00:00:00</span></div>
            @else
            <div class="col-xs-6 tips">提前设置提醒不错过</div>
            <div class="col-xs-6 text-right time">距离本场开始：<span class="left-time" id="time-left-{{ $key }}" endtime="{{ $tqg->getActiveEndTime($rulesArr, $key) }}">12:23:33</span></div>
            @endif
        </div>
        <div class="row tqg-bottom">
            @foreach($itemsArr as $k => $item)
            <?php
            $isBegin = $tqg->isBegin($item->start_time);
            ?>
            <a rel="nofollow" href="{{ $item->click_url }}" target="_blank" title="{{ $item->title }}">
                <div class="col-xs-4 item">
                    <div class="row">
                        <div class="col-xs-6 img-box"><img class="lazy" data-original="{{ $item->pic_url }}"></div>
                        <div class="col-xs-6 content">
                            <h3>{{ $item->title }}</h3>
                            <div class="middle">
                                <div class="pull-left price">
                                    <div class="ori">￥{{ number_format($item->reserve_price, 2) }}</div>
                                    <div class="now"><span class="prefix">￥</span>{{ number_format($item->zk_final_price, 2) }}</div>
                                </div>
                                <div class="pull-right link">
                                    @if(!$isBegin)
                                    <button class="btn btn-info">即将开始</button>
                                    @else
                                    <button class="btn btn-danger">马上抢</button>
                                    @endif
                                </div>
                            </div>
                            @if(!$isBegin)
                            <div class="bottom">
                                <div class="data">
                                  <span class="text-success">{{ $tqg->getBeginDate($item->start_time) }}准时开始</span>
                                </div>
                            </div>
                            @else
                            <div class="bottom">
                                <div class="data">
                                    <?php
                                        $num = $item->sold_num == 0 ? 0 : round($item->sold_num*100/$item->total_amount);
                                    ?>
                                    <div class="pull-left">已抢购{{ $num }}%</div>
                                    <div class="pull-right">已抢{{ $item->sold_num }}件</div>
                                </div>
                                <div class="line">
                                    <div class="progress">
                                          @if($num < 25)
                                          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="{{ $item->sold_num }}" aria-valuemin="0" aria-valuemax="{{ $item->total_amount }}" style="width: {{ $num }}%"></div>
                                          @elseif($num< 50)
                                          <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="{{ $item->sold_num }}" aria-valuemin="0" aria-valuemax="{{ $item->total_amount }}" style="width: {{ $num }}%"></div>
                                          @elseif($num < 75)
                                          <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="{{ $item->sold_num }}" aria-valuemin="0" aria-valuemax="{{ $item->total_amount }}" style="width: {{ $num }}%"></div>
                                          @else
                                          <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="{{ $item->sold_num }}" aria-valuemin="0" aria-valuemax="{{ $item->total_amount }}" style="width: {{ $num }}%"></div>
                                          @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="row ajax-tips">
            <div class="col-xs-12 text-center">
                <p status="on"><button class="btn btn-info form-control tqg-items-ajax" index="{{ $key }}" status="{{ $status }}" type="button">查看更多</button></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
