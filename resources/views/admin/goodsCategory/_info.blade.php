@inject('show', 'App\Presenters\GoodsCategoryPresenter')
@inject('showCouponRule', 'App\Presenters\CouponRulePresenter')
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
    <td>{{ $showCouponRule->showCat($couponRules[$goodsCategory->id]) }}</td>
    <td>{{ $showCouponRule->showPageSize($couponRules[$goodsCategory->id]) }}</td>
    <td>{{ $showCouponRule->showQ($couponRules[$goodsCategory->id]) }}</td>
    <td  class="text-left">
      <a href="{{ route('goodsCategorys.edit', $goodsCategory->id) }}" title="编辑"><i class="fa fa-edit"></i></a> |
      <a href="{{ route('goodsCategorys.destroy', $goodsCategory->id) }}" title="删除"><i class="fa fa-close text-danger"></i></a> |
      <a href="{{ route('goodsCategorys.show', $goodsCategory->id) }}" title="商品分类详情"><i class="fa fa-info-circle text-info"></i></a> |&nbsp;| 
      {!! $show->couponRuleAction($couponRules[$goodsCategory->id], $goodsCategory->id) !!}
    </td>
</tr>
@endforeach
