@inject('show', 'App\Presenters\GoodsCategoryPresenter')
@foreach($goodsCategories as $goodsCategory)
<tr>
    <td>{{ $goodsCategory->id }}</td>
    <td>{{ $show->nbspBeforeName($goodsCategory->name, $goodsCategory->level) }}</td>
    <td>{{ $goodsCategory->parent_id }}</td>
    <td>{{ $goodsCategory->level }}</td>
    <td  class="text-center">
      {!! $show->getImage($goodsCategory->image) !!}
    </td>
    <td  class="text-center">{!! $goodsCategory->font_icon !!}</td>
    <td>{{ $goodsCategory->path }}</td>
    <td>{{ $goodsCategory->order }}</td>
    {!! $show->isShown($goodsCategory->is_shown) !!}
    {!! $show->isRecommended($goodsCategory->is_recommended) !!}
    <td  class="text-center">
      <a href="{{ route('goodsCategorys.edit', $goodsCategory->id) }}">编辑</a> |
      <a href="{{ route('goodsCategorys.destroy', $goodsCategory->id) }}">删除</a> |
      <a href="{{ route('goodsCategorys.show', $goodsCategory->id) }}">详情</a>
    </td>
</tr>
@endforeach
