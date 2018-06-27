<div id="top0" class="mui-control-content mui-active">
  <ul class="mui-table-view">
    <li class="mui-table-view-cell lbd-cates">
      <!-- <h3 class="mui-text-center lbd-title">推荐</h3> -->
      <ul class="mui-table-view mui-grid-view mui-grid-9">
        @foreach($recommendSonCategory as $category)
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a href="{{ route('goodsCategorys.categorySon', $category->id) }}" title="{{ $category->name }}优惠券">
                <div class="lbd-img">
                  <img src="{{ $category->image }}" alt="{{ $category->name }}图片" />
                </div>
                <div class="mui-media-body mui-text-center lbd-name">{{ $category->name }}</div>
            </a>
        </li>
        @endforeach
      </ul>
    </li>
  </ul>
</div>
