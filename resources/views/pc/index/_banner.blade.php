<div class="container-fluid" id="banner-box">
    <div class="container">
        <dir class="row banner-row">
            <div class="col-xs-2 category">
                <ul class="list-unstyled">
                    @foreach($topGoodsCategory as $category)
                    <a href="{{ route('pc.goodsCategorys.categoryOne', ['id'=>$category->id]) }}" title="{{ $category->name }}淘宝天猫优惠券" target="_blank"><li no='cate{{ $category->id }}'>{{ $category->name }}</li></a>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-10 content-box">
                <div id="banner-list" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#banner-list" data-slide-to="0" class="active"></li>
                        <li data-target="#banner-list" data-slide-to="1" class=""></li>
                        <li data-target="#banner-list" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner banners" role="listbox">
                        <div class="item active">
                            <a href="{{ route('pc.optimusMaterial.zhibo', ['id'=>0]) }}" title="淘宝天猫优惠券直播专场" target="_blank">
                                <img src="http://placehold.it/1013x510" alt="淘宝天猫优惠券直播专场banner">
                            </a>
                        </div>
                        <div class="item">
                            <a href="{{ route('pc.optimusMaterial.brand', ['id'=>0]) }}" title="大牌淘宝内部优惠券专场" target="_blank">
                              <img src="http://placehold.it/1013x510" alt="大牌淘宝内部优惠券专场banner">
                            </a>
                        </div>
                        <div class="item">
                            <a href="{{ route('pc.optimusMaterial.baby', ['id'=>0]) }}" title="母婴类淘宝优惠券专场" target="_blank">
                              <img src="http://placehold.it/1013x510" alt="母婴类淘宝优惠券专场banner">
                            </a>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#banner-list" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    </a>
                    <a class="right carousel-control" href="#banner-list" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="subCategory-box">
                    @foreach($sonCategory as $key => $oneCategory)
                    <div class="subCategory" id="cate{{ $oneCategory['topCategoryInfo']->id }}">
                        @foreach($oneCategory['subList'] as $twoCategory)
                        <div class="row">
                            <div class="col-xs-2 text-right cate-left">
                                <a href="{{ route('pc.goodsCategorys.categoryTwo', ['id'=>$twoCategory['subCategoryInfo']->id]) }}" target="_blank" title="{{ $twoCategory['subCategoryInfo']->name }}淘宝天猫优惠券">
                                    <span>{{ $twoCategory['subCategoryInfo']->name }}<img data-src="{{ $twoCategory['subCategoryInfo']->image }}" src="/pcstyle/images/loading.gif" alt="{{ $twoCategory['subCategoryInfo']->name }}优惠券图片"></span>
                                </a>
                                <i class="glyphicon glyphicon-menu-right"></i>
                            </div>
                            <div class="col-xs-10 cate-right">
                                <ul class="list-inline">
                                    @foreach($twoCategory['sonList'] as $threeCategory)
                                    <li class="text-left"><a href="{{ route('pc.goodsCategorys.categorySon', ['id'=>$threeCategory->id]) }}" target="_blank" title="{{ $threeCategory->name }}淘宝天猫优惠券"><img data-src="{{ $threeCategory->image }}" src="/pcstyle/images/loading.gif" alt="{{ $threeCategory->name }}优惠券图片"> {{ $threeCategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </dir>
    </div>
</div>
