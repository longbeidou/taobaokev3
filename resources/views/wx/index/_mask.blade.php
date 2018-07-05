<!--商品分类的蒙版 开始-->
<div class="lbd-mask-cate mui-content" id="lbd-mask-cate">
  <div class="mui-row">
    <div class="mui-col-xs-12 cate">
      <ul>
        <li class="lbd-top">请选择</li>
        @foreach($topGoodsCategory as $category)
        <li>
          <a href="{{ route('goodsCategorys.categoryOne', $category->id) }}" title="{{ $category->name }}淘宝天猫优惠券分类">
            <div class="img"><img src="{{ $category->image }}" alt="{{ $category->name }}淘宝天猫优惠券分类图片" style="width: 60%;"/></div>
            <div class="text">{{ $category->name }}</div>
          </a>
        </li>
        @endforeach
        <li class="lbd-bottom" id="lbd-mask-hide"><i class="mui-icon mui-icon-arrowup"></i></li>
      </ul>
    </div>
  </div>
  <div class="mui-row lbd-mask-bottom"></div>
</div><!--商品分类的蒙版 结束-->
