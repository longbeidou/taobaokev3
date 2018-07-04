<!--商品分类 开始-->
<div class="mui-row lbd-cate-list">
  <ul>
    @foreach($subGoodsCategory as $category)
      @if($key <= 8)
      <li>
        <a class="lbd-a-no-tap" title="{{ $category->name }}淘宝优惠券商品" href="{{ route('goodsCategorys.categoryTwo', ['id' => $category->id]) }}">
          <div class="lbd-img">
            <img src="{{ $category->image }}" alt="{{ $category->name }}优惠券图片" />
          </div>
          <div class="lbd-text">{{ $category->name }}</div>
        </a>
      </li>
      @endif
    @endforeach
  </ul>
</div>
