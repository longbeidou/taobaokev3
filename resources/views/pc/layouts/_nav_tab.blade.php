<nav class="container-fluid" id="nav-tab">
    <div class="container box">
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-inline pull-left">
                    @inject('navTab', 'App\Presenters\NavTab')
                    <li class="{{ $navTab->pcNavTabActive(route('pc.index')) }}"><a href="{{ route('pc.index') }}" title="淘宝天猫优惠券">首页</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.allGoodsCategory.index')) }}"><a href="{{ route('pc.allGoodsCategory.index') }}" title="淘宝内部优惠券商品分类" target="_blank">商品分类</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.search.index')) }}"><a href="{{ route('pc.search.index') }}" title="淘宝天猫优惠券查询" target="_blank">超级搜索</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.optimusMaterial.pintuan')) }}"><a href="{{ route('pc.optimusMaterial.pintuan')}}" title="聚划算拼团专场" target="_blank">拼团</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.taoqianggou.index')) }}"><a href="{{ route('pc.taoqianggou.index') }}" title="淘抢购" target="_blank">淘抢购</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.optimusMaterial.zhibo')) }}"><a href="{{ route('pc.optimusMaterial.zhibo', ['id'=>0]) }}" title="淘宝天猫优惠券直播专场" target="_blank">好券直播</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.optimusMaterial.baby')) }}"><a href="{{ route('pc.optimusMaterial.baby', ['id'=>0]) }}" title="母婴类淘宝优惠券专场" target="_blank">母婴生活馆</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.optimusMaterial.brand')) }}"><a href="{{ route('pc.optimusMaterial.brand', ['id'=>0]) }}" title="大牌淘宝内部优惠券专场" target="_blank">大牌专场</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.optimusMaterial.fashion')) }}"><a href="{{ route('pc.optimusMaterial.fashion') }}" title="淘宝天猫优惠券潮流范专场" target="_blank">潮流街区</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.optimusMaterial.recommend')) }}"><a href="{{ route('pc.optimusMaterial.recommend') }}" title="淘宝内部优惠券推荐专场" target="_blank">推荐好货</a></li>
                    <li class="{{ $navTab->pcNavTabActive(route('pc.optimusMaterial.sales')) }}"><a href="{{ route('pc.optimusMaterial.sales') }}" title="特价淘宝天猫优惠券专场" target="_blank">特惠专场</a></li>
                </ul>
                <ul class="list-inline pull-right other">
                    <li class="name">手机网站 <span class="caret"></span><div class="content"><img src="/storage/pc/images/e_wx.png" alt="{{ env('SITE_NAME') }}手机网站二维码"></div></li>
                    <li class="name">查券客服 <span class="caret"></span><div class="content"><img src="{{ config('website.kefu_ercode') }}" alt="{{ env('SITE_NAME') }}客服二维码"></div></li>
                    <li class="name {{ $navTab->pcNavTabActive(route('pc.download.app')) }}"><a href="{{ route('pc.download.app') }}" title="{{ env('SITE_NAME') }}优惠券APP下载" target="_blank">下载APP <span class="caret"></span><div class="content"><img src="/storage/pc/images/e_app.png" alt="{{ env('SITE_NAME') }}优惠券APP下载二维码"></div></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
