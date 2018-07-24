<nav class="container-fluid" id="nav-tab">
    <div class="container box">
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-inline pull-left">
                    <li class="active"><a href="{{ route('pc.index') }}" title="淘宝天猫优惠券">首页</a></li>
                    <li><a href="{{ route('pc.allGoodsCategory.index') }}" title="淘宝内部优惠券商品分类" target="_blank">商品分类</a></li>
                    <li class=""><a href="{{ route('pc.search.index') }}" title="淘宝天猫优惠券查询" target="_blank">超级搜索</a></li>
                    <li><a href="{{ route('pc.taoqianggou.index') }}" title="淘抢购" target="_blank">淘抢购</a></li>
                    <li><a href="{{ route('pc.optimusMaterial.zhibo', ['id'=>0]) }}" title="淘宝天猫优惠券直播专场" target="_blank">好券直播</a></li>
                    <li><a href="{{ route('pc.optimusMaterial.baby', ['id'=>0]) }}" title="母婴类淘宝优惠券专场" target="_blank">母婴生活馆</a></li>
                    <li><a href="{{ route('pc.optimusMaterial.brand', ['id'=>0]) }}" title="大牌淘宝内部优惠券专场" target="_blank">大牌专场</a></li>
                    <li><a href="{{ route('pc.optimusMaterial.fashion') }}" title="淘宝天猫优惠券潮流范专场" target="_blank">潮流街区</a></li>
                    <li><a href="{{ route('pc.optimusMaterial.recommend') }}" title="淘宝内部优惠券推荐专场" target="_blank">推荐好货</a></li>
                    <li><a href="{{ route('pc.optimusMaterial.sales') }}" title="特价淘宝天猫优惠券专场" target="_blank">特惠专场</a></li>
                    <li><a href="" title="聚划算拼团专场" target="_blank">拼团</a></li>
                    <li><a href="" title="聚划算拼团专场" target="_blank">拼团</a></li>
                    <li><a href="" title="聚划算拼团专场" target="_blank">拼团</a></li>
                </ul>
                <ul class="list-inline pull-right other">
                    <li class="name">手机网站 <span class="caret"></span><div class="content"><img src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ route('wx.index') }}" alt="龙琴时代手机网站二维码"></div></li>
                    <li class="name">查券客服 <span class="caret"></span><div class="content"><img src="{{ config('website.kefu_ercode') }}" alt="龙琴时代客服二维码"></div></li>
                    <li class="name">下载APP <span class="caret"></span><div class="content"><img src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ route('wx.download.app') }}" alt="龙琴时代优惠券APP下载二维码"></div></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
