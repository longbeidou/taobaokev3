<footer class="container-fluid" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 top">
                <div class="pull-left category">
                    <ul class="list-inline">
                        <li><a href="{{ route('pc.index') }}" title="龙琴时代优惠券" target="_blank">首页</a></li>
                        <li><a href="" title="" target="_blank">服装</a></li>
                        <li><a href="" title="" target="_blank">服装</a></li>
                        <li><a href="" title="" target="_blank">服装</a></li>
                        <li><a href="" title="" target="_blank">服装</a></li>
                        <li><a href="" title="" target="_blank">服装</a></li>
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
