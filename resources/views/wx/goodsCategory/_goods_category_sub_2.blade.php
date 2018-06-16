<!--商品分类 开始-->
<div class="mui-row lbd-cate-list">
  <ul>
    @foreach($subGoodsCategory as $category)
    <li>
      <a href="{{ route('goodsCategorys.categorySon', ['id' => $category->id, 'sort' => $sort]) }}">
        <div class="lbd-img">
          <img src="{{ $category->image }}"/>
        </div>
        <div class="lbd-text">{{ $category->name }}</div>
      </a>
    </li>
    @endforeach
  </ul>
</div>
