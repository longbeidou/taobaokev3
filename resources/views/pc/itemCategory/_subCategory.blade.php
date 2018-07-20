<div class="container-fluid bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 box">
                <ul class="list-inline">
                    <li class="text-center line"><a href="{{ route('pc.index') }}" target="_blank" title="天猫超市优惠券">首页</a></li>
                    <li class="text-center line"><a href="{{ route('pc.allGoodsCategory.index') }}" target="_self" title="淘宝天猫优惠券商品分类">全部商品</a></li>
                    <li class="text-center line"><a href="{{ route('pc.goodsCategorys.categoryOne', ['id'=>$fatherCategoryInfo->id]) }}" target="_self" title="">{{ $fatherCategoryInfo->name }}</a></li>
                    <li class="text-center line active"><a href="{{ route('pc.goodsCategorys.categoryTwo', ['id'=>$goodsCategoryInfo->id]) }}" target="_self" title="">{{ $goodsCategoryInfo->name }}</a></li>
                    @foreach($subGoodsCategory as $key => $category)
                    <li class="text-center"><a href="{{ route('pc.goodsCategorys.categorySon', ['id'=>$category->id]) }}" target="_self" title="{{ $category->name }}淘宝天猫优惠券">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
