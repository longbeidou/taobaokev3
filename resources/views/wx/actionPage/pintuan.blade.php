@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
  @include('wx.actionPage._header')
  @include('wx.layouts._footer_tab')

<div class="mui-content">
		<div id="slider" class="mui-slider lbd-coupon-take-box">
			<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#item1mobile">淘口令方式</a>
        @if($showClient)
				<a class="mui-control-item" href="#item2mobile">链接方式</a>
        @endif
        <a class="mui-control-item" href="#item3mobile">龙琴时代APP</a>
			</div>
      @if($showClient)
			<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-4" style="background-color: #ED2A7A;"></div>
      @else
      <div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-6" style="background-color: #ED2A7A;"></div>
      @endif
			<div class="mui-slider-group">
				<div id="item1mobile" class="mui-slider-item mui-control-content mui-active" style="min-height: 400px; background-color: #fff;">
					<div id="scroll1" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
								@include('wx.actionPage._tpwd')
								<li class="mui-table-view-cell">
									<h5>淘口令使用说明：</h5>
									<p>
										1.如果手机有淘宝APP，则可以直接复制口令拼团。手机没有淘宝APP，请先安装再复制淘口令参加拼团。<br />
										2.拼团步骤：<br>
										&nbsp;&nbsp;&nbsp;&nbsp;a.点击【复制淘口令】按钮<br />
										&nbsp;&nbsp;&nbsp;&nbsp;b.打开手机淘宝APP<br />
										&nbsp;&nbsp;&nbsp;&nbsp;c.在淘宝APP内拼团购买<br />
										3.参与拼团有时间限制，过期作废，请尽快下单。
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
        @if($showClient)
				<div id="item2mobile" class="mui-slider-item mui-control-content" style="min-height: 400px; background-color: #fff;">
					<div id="scroll2" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
								<li class="mui-table-view-cell">
								    <div class="mui-button-row" id="lbd-coupon-take-link">
								        <a href="{{ $pinTuanLink }}" rel="nofollow"  class="mui-btn mui-btn-yellow mui-btn-block">立即拼团</a>
								    </div>
								</li>
								<li class="mui-table-view-cell">
									<h5>链接方式拼团使用说明：</h5>
									<p>
										1.此方法是通过浏览器参与拼团。<span style="color: #ed2a7a;">由于通过浏览器拼团的成功率低于淘口令方式并且操作复杂，所以<strong>强烈建议</strong>使用淘口令方式参与拼团</span>。<br />
										2.领券步骤：<br>
										&nbsp;&nbsp;&nbsp;&nbsp;a.点击【立即拼团】按钮<br />
										&nbsp;&nbsp;&nbsp;&nbsp;b.在出现的登录页面输入账号和密码<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;c.登录淘宝后参与拼团购买<br />
										&nbsp;&nbsp;&nbsp;&nbsp;d.拼团成功就可以享受优惠了<br />
                    3.参与拼团有时间限制，过期作废，请尽快下单。
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
        @endif
        <div id="item3mobile" class="mui-slider-item mui-control-content" style="min-height: 400px; background-color: #fff;">
					<div id="scroll2" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
                @include('wx.actionPage._app_download')
								<li class="mui-table-view-cell">
									<h5>龙琴时代APP拼团使用说明：</h5>
									<p>
                    1.通过龙琴时代APP拼团的成功率最高<br/>
										2.拼团的产品每天24小时实时更新，保证时效性<br />
                    3.商品种类涉及上百个大类，上千个小分类，总能找到自己喜欢的宝贝<br />
                    4.独家分享上千家合作的淘宝天猫店铺的大额优惠券，领券最低一折购物<br />
										5.优惠券有使用期限，过期作废，请尽快下单。
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
@stop
@section('footJs')
<script src="/wxstyle/js/clipboard.min.js"></script>
<script type="text/javascript" charset="utf-8">
  mui.init();
  @if($showClient)
  mui('#lbd-coupon-take-link').on('tap', 'a', function() {
    document.location.href = this.href;
  });
  @endif
  // 复制淘口令的操作
      var clipboard = new ClipboardJS('.lbdTpwdCopy');

      clipboard.on('success', function(e) {
        document.getElementById('lbd-tpwd-copy').innerHTML = '复制成功！'
        document.getElementById('lbd-tpwd-copy').style.backgroundColor = 'green'
          console.log(e);
      });

      clipboard.on('error', function(e) {
        document.getElementById('lbd-tpwd-copy').innerHTML = '复制失败！'
        document.getElementById('lbd-tpwd-copy').style.backgroundColor = 'red'
        document.getElementById('lbd-tips').style.display = ''
          console.log(e);
      });
</script>
@stop
