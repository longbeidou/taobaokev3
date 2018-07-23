<div class="tqg-time">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-inline" id="tqg-time">
                    @inject('tqg', 'App\Presenters\TaoQiangGouPresenter')
                    @foreach($rulesArr as $key => $rule)
                        <?php
                        $status = $tqg->statusShow($rulesArr, $key, $rule['hour']);
                        ?>
                        @if($status == -1)
                        <li tqg-item-id="item{{ $key }}" data="time-left-{{ $key }}" class="text-center tqg-item-list-box"><span class="time">{{ $rule['hour'] }}:00</span><span class="status">已经开抢</span></li>
                        @elseif($status == 0)
                        <li tqg-item-id="item{{ $key }}" data="time-left-{{ $key }}" class="text-center tqg-item-list-box active"><span class="time">{{ $rule['hour'] }}:00</span><span class="status">正在抢购</span></li>
                        @else
                        <li tqg-item-id="item{{ $key }}" data="time-left-{{ $key }}" class="text-center tqg-item-list-box"><span class="time">{{ $rule['hour'] }}:00</span><span class="status">未开抢</span></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
