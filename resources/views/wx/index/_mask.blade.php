<!--商品分类的蒙版 开始-->
<div class="lbd-mask-cate mui-content" id="lbd-mask-cate">
  <div class="mui-row">
    <div class="mui-col-xs-12 cate">
      <ul>
        <li class="lbd-top">请选择</li>
        @foreach($topCategory as $category)
        <li>
          <a href="{{ $category->id }}">
            <div class="img"><img src="{{ $category->image }}" style="width: 100%;"/></div>
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
