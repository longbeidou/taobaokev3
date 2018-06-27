<!--横向滑动商品导航 开始-->
<header class="mui-bar mui-bar-nav lbd-index-nav" id="lbd-index-header">
  <div class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
        <div class="mui-scroll" id="lbd-index-scroll">
            <a class="mui-control-item" title="淘宝天猫优惠券" href="{{ route('wx.index') }}">推荐</a>
            @foreach($upGoodsCategory as $category)
            <a class="mui-control-item @if($category->id == $id) mui-active @endif " title="{{ $category->name }}淘宝优惠券商品" href="{{ route('goodsCategorys.categoryTwo', $category->id) }}">{{ $category->name }}</a>
            @endforeach
        </div>
        <a rel="nofollow" class="mui-icon mui-icon-arrowdown mui-pull-right" id="lbd-mask-cate-show"></a>
   </div>
</header><!--横向滑动商品导航 结束-->
