@inject('tqg', 'App\Presenters\TaoQiangGouPresenter')
<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
  <div class="mui-scroll">
    @foreach($rulesArr as $key => $rule)
    <a class="mui-control-item {{ $tqg->activeShow($rulesArr, $key, $rule['hour']) }}" href="#item{{ $key }}">
      <div class="lbd-tab-top">{{ $rule['hour'] }}:00</div>
      <div class="lbd-tab-bottom">{{ $tqg->isBeginning($rule['hour']) }}</div>
    </a>
    @endforeach
  </div>
</div>
