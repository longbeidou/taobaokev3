@inject('couponShow', 'App\Presenters\CouponListPresenter')
<div class="container-fluid goods-info">
    <div class="container box">
        <div class="row">
            <div class="col-xs-4">
                <div id="goods-image-list" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($images as $key => $image)
                            @if($key == 0)
                            <li data-target="#goods-image-list" data-slide-to="{{$key}}" class="active"></li>
                            @else
                            <li data-target="#goods-image-list" data-slide-to="{{$key}}"></li>
                            @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php $count = count($images); ?>
                        @foreach($images as $key => $image)
                            @if($key == 0)
                            <div class="item active ">
                              <img src="{{ $image }}">
                            </div>
                            @else
                            <div class="item">
                              <img src="{{ $image }}">
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#goods-image-list" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    </a>
                    <a class="right carousel-control" href="#goods-image-list" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="col-xs-8 right">
                <h1><img src="/pcstyle/images/ju32.png">{{ $itemInfo->title }}</h1>
                <div class="price-box">
                    <div class="pull-left">
                        拼团价<span class="m">￥</span> <span class="price-now">
                          @if(empty($pinTuanInfo->jdd_price))
                          ??.??
                          @else
                          {{ number_format($pinTuanInfo->jdd_price, 2) }}
                          @endif
                        </span> 元&nbsp;&nbsp;&nbsp;&nbsp;
                        现价<span class="price-ori">￥
                          @if(empty($pinTuanInfo->orig_price))
                          {{ number_format($itemInfo->zk_final_price, 2) }}
                          @else
                          {{ number_format($pinTuanInfo->orig_price, 2) }}
                          @endif
                        </span>元
                    </div>
                    <div class="pull-right">
                        已有<span class="num">{{ $itemInfo->volume }}</span>人拼团购买
                    </div>
                </div>
                <div class="row take">
                    <div class="col-xs-9 coupon-box">
                        <div class="row shop-info">
                            <div class="col-xs-12">
                                <h3>店铺名：{{ $itemInfo->nick }}</h3>
                            </div>
                            <div class="col-xs-4">
                                @if($itemInfo->user_type == 1)
                                <p>店铺类型：天猫店</p>
                                @else
                                <p>店铺类型：淘宝店</p>
                                @endif
                                <p>商品所在地：{{ $itemInfo->provcity }}</p>
                                <p>卖家ID：{{ $itemInfo->seller_id }}</p>
                            </div>
                            <div class="col-xs-4">
                                <p>店铺dsr评分：4.9</p>
                                <p>是否包邮：<span class="text-success">包邮</span></p>
                                <p>是否加入消保：<span class="text-success">已加入</span></p>
                            </div>
                            <div class="col-xs-4 text-right">
                                <p>退款率 <span class="text-success">低于</span> 行业均值</p>
                                <p>好评率 <span class="text-success">高于</span> 行业均值</p>
                                <p>成交率 <span class="text-success">高于</span> 行业均值</p>
                            </div>
                        </div>
                        <div class="row coupon pintuan">
                            <div class="col-xs-4 text-center money">
                                  @if(empty($pinTuanInfo->orig_price) || empty($pinTuanInfo->jdd_price))
                                  <span class="m">省</span> <span class="num">??</span>
                                  @else
                                  <span class="m">省</span> <span class="num">{{ number_format($pinTuanInfo->orig_price - $pinTuanInfo->jdd_price) }}</span>
                                  @endif
                            </div>
                            <div class="col-xs-6 text-center date">
                                <p class="top">拼团有效期</p>
                                <p class="bottem">拼团开始时间：{{ $pinTuanInfo->ostime or date('Y-m-d', time()) }}</p>
                                <p class="bottem">拼团结束时间：{{ $pinTuanInfo->oetime or date('Y-m-', time()).'??' }}</p>
                            </div>
                            <div class="col-xs-2 text-center link">
                                @if(empty($pinTuanLink))
                                <a href="{{ route('pc.optimusMaterial.pintuan') }}" target="_self">点击查看</a>
                                @else
                                <a href="{{ $pinTuanLink }}" rel="nofollow" target="_blank">立即拼团</a>
                                @endif
                            </div>
                            <!-- <div class="circle-right"></div> -->
                            <div class="circle-left-1"></div>
                            <div class="circle-left-2"></div>
                            <div class="circle-left-3"></div>
                        </div>
                    </div>
                    <div class="col-xs-3 text-right ercode">
                        <p class="tips text-center">手机淘宝扫码拼团购买</p>
                        @if(empty($pinTuanLink))
                        <img src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ route('wx.itemInfo.pinTuanInfo', ['id'=>$id]) }}">
                        @else
                        <img src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($pinTuanLink) }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
