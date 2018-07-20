<div class="container-fluid" id="all-category-box">
    <div class="container">
        @foreach($sonCategory as $topCategory)
        <div class="row">
            <div class="col-xs-12 one-level">
                <a href="{{ route('pc.goodsCategorys.categoryOne', ['id'=>$topCategory['topCategoryInfo']->id]) }}" title="{{ $topCategory['topCategoryInfo']->name }}淘宝天猫优惠券" target="_blank">
                    <img class="lazy" data-original="{{ $topCategory['topCategoryInfo']->image }}" alt="{{ $topCategory['topCategoryInfo']->name }}淘宝天猫优惠券图片"> {{ $topCategory['topCategoryInfo']->name }}
                </a>
            </div>
            @foreach($topCategory['subList'] as $subCategory)
            <div class="col-xs-12 two-level">
                <div class="row">
                    <a href="{{ route('pc.goodsCategorys.categoryTwo', ['id'=>$subCategory['subCategoryInfo']->id]) }}" title="{{ $subCategory['subCategoryInfo']->name }}淘宝天猫优惠券" target="_blank">
                        <div class="col-xs-2 left">
                            <span>
                                <img class="lazy" data-original="{{ $subCategory['subCategoryInfo']->image }}" alt="{{ $subCategory['subCategoryInfo']->name }}淘宝天猫优惠券图片"> {{ $subCategory['subCategoryInfo']->name }}
                            </span>
                        <i class="glyphicon glyphicon-menu-right text-pull-right"></i>
                        </div>
                    </a>
                    <div class="col-xs-10 right">
                        <ul class="list-inline">
                            @foreach($subCategory['sonList'] as $sonCategory)
                            <li class="text-center"><a href="{{ route('pc.goodsCategorys.categorySon', ['id'=>$sonCategory->id]) }}" target="_blank" title="{{ $sonCategory->name }}淘宝天猫优惠券">
                                <img class="lazy" data-original="{{ $sonCategory->image }}" alt="{{ $sonCategory->name }}淘宝天猫优惠券图片"> {{ $sonCategory->name }}
                            </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
