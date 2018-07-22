<div class="container-fluid" id="search-index">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3 search-box">
                <ul class="nav nav-tabs search-tab" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">综合搜索</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">天猫</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">聚划算</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">淘口令</a></li>
                </ul>
                <div class="tab-content search-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row">
                            <form class="form-group" action="{{ route('pc.search.all') }}" method="get">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="q" placeholder="请输入要搜索的商品名称">
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit" class="form-control">搜索</button>
                                </div>
                            </form>
                            <div class="col-xs-12">
                                <p class="help-block"><strong>提示：</strong>搜索范围为 <strong>淘宝和天猫</strong> 的商品</p>
                            </div>
                        </div>
                        <div class="row tips-box">
                            <div class="col-xs-12">
                                <h5>综合搜索使用说明</h5>
                                <p>
                                    <ol>
                                        <li>多个关键词用空格隔开，例如：T恤 白色</li>
                                        <li>优惠券的有效期一般比较短，请及时查询，及时使用</li>
                                        <li>商品的优惠券过期失效，请尽快下单</li>
                                        <li>如需人工帮助，请联系本站客服</li>
                                        <li>系统实时更新优惠券，保证优惠券的及时性</li>
                                    </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="row">
                            <form class="form-group" action="{{ route('pc.search.tmall') }}" method="get">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="q" placeholder="请输入要搜索的商品名称">
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit" class="form-control">搜索</button>
                                </div>
                            </form>
                            <div class="col-xs-12">
                                <p class="help-block"><strong>提示：</strong>搜索范围为 <strong>天猫</strong> 的商品</p>
                            </div>
                        </div>
                        <div class="row tips-box">
                            <div class="col-xs-12">
                                <h5>天猫搜索使用说明</h5>
                                <p>
                                    <ol>
                                        <li>多个关键词用空格隔开，例如：T恤 白色</li>
                                        <li>优惠券的有效期一般比较短，请及时查询，及时使用</li>
                                        <li>商品的优惠券过期失效，请尽快下单</li>
                                        <li>如需人工帮助，请联系本站客服</li>
                                        <li>系统实时更新优惠券，保证优惠券的及时性</li>
                                    </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        <div class="row">
                            <form class="form-group" action="{{ route('pc.search.ju') }}" method="get">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="q" placeholder="请输入要搜索的商品名称">
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit" class="form-control">搜索</button>
                                </div>
                            </form>
                            <div class="col-xs-12">
                                <p class="help-block"><strong>提示：</strong>搜索范围为 <strong>淘宝聚划算</strong> 的商品</p>
                            </div>
                        </div>
                        <div class="row tips-box">
                            <div class="col-xs-12">
                                <h5>聚划算搜索使用说明</h5>
                                <p>
                                    <ol>
                                        <li>多个关键词用空格隔开，例如：T恤 白色</li>
                                        <li>聚划算的活动商品有下单日期，请在指定的时间内下单</li>
                                        <li>活动商品过期后会恢复原价，查询后请尽快下单购买</li>
                                        <li>如需人工帮助，请联系本站客服</li>
                                        <li>系统实时更新聚划算的活动商品，保证查询的有效性</li>
                                    </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="settings">
                        <div class="row">
                            <form class="form-group" action="{{ route('pc.search.tpwd') }}" method="get">
                                <div class="col-xs-10">
                                    <input class="form-control" type="text" name="q" placeholder="请输入要搜索的淘口令">
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit" class="form-control">搜索</button>
                                </div>
                            </form>
                            <div class="col-xs-12">
                                <p class="help-block"><strong>提示：</strong>搜索范围为 <strong>淘口令相关</strong> 的商品</p>
                            </div>
                        </div>
                        <div class="row tips-box">
                            <div class="col-xs-12">
                                <h5>淘口令搜索使用说明</h5>
                                <p>
                                    <ol>
                                        <li>粘贴含有优惠口令的文字可以搜索特定商品</li>
                                        <li>淘口令案例：復·制这段描述，€z8rP0wuMBLc€ ，咑閞【手机淘宝】即可查看。"</li>
                                        <li>淘口令是领取优惠券的一种方式，例如："€z8rP0wuMBLc€"就是淘口令</li>
                                        <li>淘口令的有效期为30天，淘口令自生成30天后失效</li>
                                        <li>请使用在有效期内的淘口令进行商品查询</li>
                                    </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
