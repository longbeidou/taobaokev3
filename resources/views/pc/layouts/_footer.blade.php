<footer class="container-fluid" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 top">
                <div class="pull-left category">
                    <ul class="list-inline">
                        <li><a href="{{ route('pc.index') }}" title="{{ env('SITE_NAME') }}优惠券" target="_blank">首页</a></li>
                        <li><a href="{{ route('pc.allGoodsCategory.index') }}" title="淘宝内部优惠券商品分类" target="_blank">商品分类</a></li>
                        <li><a href="{{ route('pc.search.index') }}" title="淘宝天猫优惠券查询" target="_blank">超级搜索</a></li>
                        <li><a href="{{ route('pc.optimusMaterial.pintuan') }}" title="聚划算拼团专场" target="_blank">拼团</a></li>
                        <li><a href="{{ route('pc.taoqianggou.index') }}" title="淘抢购" target="_blank">淘抢购</a></li>
                        <li><a href="{{ route('pc.optimusMaterial.zhibo') }}" title="淘宝天猫优惠券直播专场" target="_blank">好券直播</a></li>
                        <li><a href="{{ route('pc.optimusMaterial.baby') }}" title="母婴类淘宝优惠券专场" target="_blank">母婴生活馆</a></li>
                        <li><a href="{{ route('pc.optimusMaterial.brand') }}" title="大牌淘宝内部优惠券专场" target="_blank">大牌专场</a></li>
                        <li><a href="{{ route('pc.optimusMaterial.fashion') }}" title="淘宝天猫优惠券潮流范专场" target="_blank">潮流街区</a></li>
                        <li><a href="{{ route('pc.optimusMaterial.recommend') }}" title="淘宝内部优惠券推荐专场" target="_blank">推荐好货</a></li>
                        <li><a href="{{ route('pc.optimusMaterial.sales') }}" title="特价淘宝天猫优惠券专场" target="_blank">特惠专场</a></li>
                        <li><a href="{{ route('pc.download.app') }}" title="{{ env('SITE_NAME') }}优惠券APP下载" target="_blank">{{ env('SITE_NAME') }}APP下载</a></li>
                    </ul>
                </div>
                <div class="pull-right text-right adv">
                    <span>—— 分享淘宝天猫优惠券的专业网站 ——</span>
                </div>
            </div>
            <div class="col-xs-12 bottem">
                <div class="pull-left power">Powered by {{ config('website.company_name') }}</div>
                <div class="pull-right text-right copyright">Copyright@2017-{{ date('Y', time()) }} 备案号：{{ config('website.domain_beian') }}</div>
            </div>
        </div>
    </div>
</footer>
