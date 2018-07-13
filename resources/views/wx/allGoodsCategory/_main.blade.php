@foreach($sonCategory as $topKey => $topCategory)
<div id="top{{ $topKey+1 }}" class="mui-control-content">
  <ul class="mui-table-view">
    @foreach($topCategory['subList'] as $subCategory)
    <li class="mui-table-view-cell lbd-cates">
      <h3 class="mui-text-center lbd-title">{{ $subCategory['subCategoryInfo']->name }}</h3>
      <ul class="mui-table-view mui-grid-view mui-grid-9">
        @foreach($subCategory['sonList'] as $sonCategory)
        <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
            <a href="{{ route('goodsCategorys.categorySon', $sonCategory->id) }}" title="{{ $sonCategory->name }}优惠券">
                <div class="lbd-img">
                  <img data-lazyload="{{ $sonCategory->image }}" alt="{{ $sonCategory->name }}图片"/>
                </div>
                <div class="mui-media-body mui-text-center lbd-name">{{ $sonCategory->name }}</div>
            </a>
        </li>
        @endforeach
      </ul>
    </li>
    @endforeach
  </ul>
</div>
@endforeach
