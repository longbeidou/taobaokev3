<div class="container-fluid" id="top-box">
    <div class="container" id="top">
        <div class="row">
            <div class="col-xs-3"><img src="/pcstyle/images/logolist.png"></div>
            <div class="col-xs-6">
                <div class="row">
                    <form action="{{ route('pc.search.all') }}" method="get">
                        <div class="col-xs-9 form-box"><input class="form-control" type="text" name="q" placeholder="请输入要搜索的商品名..."></div>
                        <div class="col-xs-3 form-box"><button class="form-control btn btn-danger" type="submit">搜索</button></div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-xs-12 hot-search">
                        <ul class="list-inline">
                          <strong>热门搜索:</strong>
                          <li><a href="{{ route('pc.search.all') }}?q=凉拖鞋" title="">凉拖鞋</a></li>
                          <li><a href="{{ route('pc.search.all') }}?q=时尚T恤" title="">时尚T恤</a></li>
                          <li><a href="{{ route('pc.search.all') }}?q=防晒喷雾" title="">防晒喷雾</a></li>
                          <li><a href="{{ route('pc.search.all') }}?q=纸巾" title="">纸巾</a></li>
                          <li><a href="{{ route('pc.search.all') }}?q=裤子" title="">裤子</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 topimg">
                <div class="table-cell text-center">
                    <img src="/pcstyle/images/top01.png" alt="人工审核的淘宝优惠券">
                    <p class="text-center">100%人工审核</p>
                </div>
                <div class="table-cell text-center">
                    <img src="/pcstyle/images/top02.png" alt="实施维护的天猫超市优惠券">
                    <p class="text-center">实时维护排查</p>
                </div>
                <div class="table-cell text-center">
                    <img src="/pcstyle/images/top03.png" alt="全天上新的淘宝内部优惠券">
                    <p class="text-center">全天持续上新</p>
                </div>
            </div>
        </div>
    </div>
</div>
