<div class="container-fluid" id="top-box">
    <div class="container" id="top">
        <div class="row">
            <div class="col-xs-3"><img src="/storage/pc/images/logolist.png"></div>
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-xs-12 index-search-box">
                        <ul class="nav nav-tabs search-tab" role="tablist">
                            @inject('showActive', 'App\Presenters\CouponListPresenter')
                            <li role="presentation" class="{{ $showActive->showActiveForSortPC(route('pc.search.all'), url()->current()) }}"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">综合搜索</a></li>
                            <li role="presentation" class="{{ $showActive->showActiveForSortPC(route('pc.search.tmall'), url()->current()) }}"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">天猫</a></li>
                            <li role="presentation" class="{{ $showActive->showActiveForSortPC(route('pc.search.ju'), url()->current()) }}"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">聚划算</a></li>
                            <li role="presentation" class="{{ $showActive->showActiveForSortPC(route('pc.search.tpwd'), url()->current()) }}"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">淘口令</a></li>
                        </ul>
                        <div class="tab-content search-content">
                            <div role="tabpanel" class="tab-pane {{ $showActive->showActiveForSortPC(route('pc.search.all'), url()->current()) }}" id="home">
                                <div class="row">
                                    <form class="form-group" action="{{ route('pc.search.all') }}" method="get">
                                        <div class="col-xs-10">
                                            <input class="form-control input-sm" type="text" name="q" value="{{ $q }}" required placeholder="请输入要搜索的商品名称">
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="submit" class="form-control input-sm">搜索</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane {{ $showActive->showActiveForSortPC(route('pc.search.tmall'), url()->current()) }}" id="profile">
                                <div class="row">
                                    <form class="form-group" action="{{ route('pc.search.tmall') }}" method="get">
                                        <div class="col-xs-10">
                                            <input class="form-control input-sm" type="text" name="q" value="{{ $q }}" required placeholder="请输入要搜索的商品名称">
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="submit" class="form-control input-sm">搜索</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane {{ $showActive->showActiveForSortPC(route('pc.search.ju'), url()->current()) }}" id="messages">
                                <div class="row">
                                    <form class="form-group" action="{{ route('pc.search.ju') }}" method="get">
                                        <div class="col-xs-10">
                                            <input class="form-control input-sm" type="text" name="q" value="{{ $q }}" required placeholder="请输入要搜索的商品名称">
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="submit" class="form-control input-sm">搜索</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane {{ $showActive->showActiveForSortPC(route('pc.search.tpwd'), url()->current()) }}" id="settings">
                                <div class="row">
                                    <form class="form-group" action="{{ route('pc.search.tpwd') }}" method="get">
                                        <div class="col-xs-10">
                                            @if(route('pc.search.tpwd') == url()->current())
                                            <input class="form-control input-sm" type="text" name="q" value="{{ $tpwd }}" required placeholder="请输入要搜索的淘口令">
                                            @else
                                            <input class="form-control input-sm" type="text" name="q" required placeholder="请输入要搜索的淘口令">
                                            @endif
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="submit" class="form-control input-sm">搜索</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 topimg">
                <div class="table-cell text-center">
                    <img src="/storage/pc/images/top01.png">
                    <p class="text-center">100%人工审核</p>
                </div>
                <div class="table-cell text-center">
                    <img src="/storage/pc/images/top02.png">
                    <p class="text-center">实时维护排查</p>
                </div>
                <div class="table-cell text-center">
                    <img src="/storage/pc/images/top03.png">
                    <p class="text-center">全天持续上新</p>
                </div>
            </div>
        </div>
    </div>
</div>
