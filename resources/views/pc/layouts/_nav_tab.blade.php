<nav class="container-fluid" id="nav-tab">
    <div class="container box">
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-inline pull-left">
                    <li class="active"><a href="{{ route('pc.index') }}" title="淘宝天猫优惠券">首页</a></li>
                    <li><a href="" title="" target="_blank">服装</a></li>
                    <li><a href="" title="" target="_blank">服装</a></li>
                    <li><a href="" title="" target="_blank">服装</a></li>
                    <li><a href="" title="" target="_blank">服装</a></li>
                    <li><a href="" title="" target="_blank">服装</a></li>
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
