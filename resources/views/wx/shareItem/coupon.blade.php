@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left lbd-all-kinds-nav"></a>
    <h1 class="mui-title">分享淘宝优惠券</h1>
</header>
@include('wx.layouts._footer_tab')

<div class="mui-content">
		<div id="slider" class="mui-slider lbd-coupon-take-box">
			<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#item1mobile">分享文案</a>
				<a class="mui-control-item" href="#item2mobile">分享图片</a>
			</div>
			<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-6" style="background-color: #ED2A7A;"></div>
			<div class="mui-slider-group">
				<div id="item1mobile" class="mui-slider-item mui-control-content mui-active" style="min-height: 630px; background-color: #fff;">
					<div id="scroll1" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
								<li class="mui-table-view-cell">
									<textarea rows="8" id="lbd-tpwd" style="margin-bottom: 0px; font-size: 12px; line-height: 14px;">{{ $itemInfo->title }}
【在售价】{{ number_format($itemInfo->zk_final_price, 2) }}元
【券後价】{{ number_format($itemInfo->zk_final_price-$couponAmount, 2) }}元
================
復.制这段文字，{{ $tpwd }} ，咑.閞【手.机淘.宝】即可查看</textarea>
								    <div class="mui-button-row">
								        <button type="button" id="lbd-tpwd-copy" data-clipboard-action="copy" data-clipboard-target="#lbd-tpwd" class="mui-btn mui-btn-yellow lbdTpwdCopy" >复制淘口令文案</button>
								    </div>
								    <p id="lbd-tips" style="margin-top: 10px; color: red; display: none;">复制失败，请手动复制文案</p>
								</li>
								<li class="mui-table-view-cell">
									<h5>淘口令使用说明：</h5>
									<p>
										1.如果手机有淘宝APP，则可以使用此方式<br />
										2.淘口令领券步骤：<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;a.点击【复制淘口令文案】按钮<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;b.通过微信、QQ等软件发给好友<br />
										&nbsp;&nbsp;&nbsp;&nbsp;c.好友复制发给的文案<br />
										&nbsp;&nbsp;&nbsp;&nbsp;d.打开手机淘宝APP<br />
										&nbsp;&nbsp;&nbsp;&nbsp;e.在淘宝APP内领券下单<br />
										3.优惠券有使用期限，过期作废，请尽快下单。
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div id="item2mobile" class="mui-slider-item mui-control-content" style="min-height: 630px; background-color: #fff;">
					<div id="scroll2" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
								<li class="mui-table-view-cell">
								    <img  src="{{ route('wx.image.couponShareImage', $itemInfo->num_iid) }}?couponAmount={{ $couponAmount }}"  width="100%" />
								</li>
								<li class="mui-table-view-cell">
									<h5>图片领优惠券步骤：</h5>
									<p>
										1.长按图片保存到手机<br />
										2.通过微信、QQ等软件发给好友<br>
										3.好友通过识别图中的二维码领取优惠券。<br />
										4.优惠券有使用期限,过期作废,领券后需尽快下单
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
