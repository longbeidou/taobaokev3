<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
  <div class="mui-scroll lbd-material">
    @foreach($allInfo['rules'] as $id => $rule)
    <a class="mui-control-item a-can-do @if($currentId == $id) mui-active @endif" href="{{ route('wx.optimusMaterial.brand', $id) }}">{{ $rule['category'] }}</a>
    @endforeach
  </div>
</div>
