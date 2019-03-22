<!--网站的banner 开始-->
<div class="mui-row">
  <div id="slider" class="mui-slider" >
    <div class="mui-slider-group mui-slider-loop">
      <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
      <div class="mui-slider-item mui-slider-item-duplicate">
        <a class="a-can-do" href="{{ route('wx.optimusMaterial.baby', ['id' => 0]) }}">
          <img src="/storage/wx/images/banners/baby.jpg">
        </a>
      </div>
      <!-- 第一张 -->
      <div class="mui-slider-item">
        <a class="a-can-do" href="{{ route('wx.optimusMaterial.zhibo', ['id' => 0]) }}">
          <img src="/storage/wx/images/banners/zhibo.jpg">
        </a>
      </div>
      <!-- 第二张 -->
      <div class="mui-slider-item">
        <a class="a-can-do" href="{{ route('wx.optimusMaterial.brand', ['id' => 0]) }}">
          <img src="/storage/wx/images/banners/brand.jpg">
        </a>
      </div>
      <!-- 第三张 -->
      <div class="mui-slider-item">
        <a class="a-can-do" href="{{ route('wx.optimusMaterial.baby', ['id' => 0]) }}">
          <img src="/storage/wx/images/banners/baby.jpg">
        </a>
      </div>
      <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
      <div class="mui-slider-item mui-slider-item-duplicate">
        <a class="a-can-do" href="{{ route('wx.optimusMaterial.zhibo', ['id' => 0]) }}">
          <img src="/storage/wx/images/banners/zhibo.jpg">
        </a>
      </div>
    </div>
    <div class="mui-slider-indicator">
      <div class="mui-indicator mui-active"></div>
      <div class="mui-indicator"></div>
      <div class="mui-indicator"></div>
    </div>
  </div>
</div><!--网站的banner 结束-->
