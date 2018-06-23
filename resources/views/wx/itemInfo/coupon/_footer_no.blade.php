<nav class="mui-bar mui-bar-tab lbd-footer-tab lbd-goods-footer" id="lbd-footer-tab-item">
    <a class="mui-tab-item lbd-1 " href="{{ route('wx.index') }}">
        <span class="mui-icon mui-icon-home"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item lbd-take" href="{{ route('wx.search.all') }}?q={{ $itemInfo->title }}">
        <span class="mui-tab-label">
          搜索此券
          <div class="lbd-left-circle lbd-01"></div>
          <div class="lbd-left-circle lbd-2"></div>
          <div class="lbd-left-circle lbd-3"></div>
          <div class="lbd-right-circle lbd-01"></div>
          <div class="lbd-right-circle lbd-2"></div>
          <div class="lbd-right-circle lbd-3"></div>
        </span>
    </a>
</nav>
