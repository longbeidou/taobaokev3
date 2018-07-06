<!--商品图片 开始-->
<div id="slider" class="mui-slider" >
  <div class="mui-slider-group mui-slider-loop">
    <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
    <div class="mui-slider-item mui-slider-item-duplicate">
        <img src="{{ end($images )}}">
    </div>
    @foreach($images as $key => $image)
    <!-- 第{{ $key+1 }}张 -->
    <div class="mui-slider-item">
        <img src="{{ $image }}">
    </div>
    @endforeach
    <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
    <div class="mui-slider-item mui-slider-item-duplicate">
        <img src="{{ $images[0] }}">
    </div>
  </div>
  <div class="mui-slider-indicator">
    <div class="mui-indicator mui-active"></div>
    @for($i = 1, $count = count($images); $i < $count; $i++)
    <div class="mui-indicator"></div>
    @endfor
  </div>
</div><!--商品图片 结束-->
