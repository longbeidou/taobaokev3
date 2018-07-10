@inject('footer', 'App\Presenters\FooterTabPresenter')
<nav class="mui-bar mui-bar-tab lbd-footer-tab" id="lbd-footer-tab">
    <a title="淘宝天猫优惠券" class="mui-tab-item a-can-do {{ $footer->isActiveAction(route('wx.index')) }}" href="{{ route('wx.index') }}">
        <span class="mui-icon mui-icon-home"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a title="淘宝天猫优惠券商品分类" class="mui-tab-item a-can-do {{ $footer->isActiveAction(route('wx.allGoodsCategory.index')) }}" href="{{ route('wx.allGoodsCategory.index') }}">
        <span class="mui-icon mui-icon-list"></span>
        <span class="mui-tab-label">分类</span>
    </a>
    <a title="龙琴时代APP下载" class="mui-tab-item a-can-do {{ $footer->isActiveAction(route('wx.download.app')) }}" href="{{ route('wx.download.app') }}">
        <span class="mui-icon mui-icon-download"></span>
        <span class="mui-tab-label">下载APP</span>
    </a>
    <a title="搜索淘宝天猫优惠券" class="mui-tab-item a-can-do {{ $footer->isActiveAction(route('wx.search.index')) }}" href="{{ route('wx.search.index') }}">
        <span class="mui-icon mui-icon-search"></span>
        <span class="mui-tab-label">搜索</span>
    </a>
    <a title="淘抢购" class="mui-tab-item a-can-do {{ $footer->isActiveAction(route('wx.taoqianggou.index')) }}" href="{{ route('wx.taoqianggou.index')}}">
        <span class="mui-icon mui-icon-navigate"></span>
        <span class="mui-tab-label">淘抢购</span>
    </a>
</nav>
