@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left lbd-all-kinds-nav"></a>
    <h1 class="mui-title">{{ $name }}</h1>
</header>
@include('wx.layouts._footer_tab')

<div class="mui-content">
		<div id="slider" class="mui-slider0 lbd-coupon-take-box">
			<div class="mui-slider-group">
				<div id="item1mobile" class="mui-slider-item mui-control-content mui-active" style="min-height: 430px; background-color: #fff;">
					<div id="scroll1" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
								<li class="mui-table-view-cell">
									<textarea rows="4" id="lbd-tpwd" style="margin-bottom: 0px; font-size: 12px; line-height: 14px;">VIP渠道客户专属淘口令：{{ $tpwd }}</textarea>
								    <div class="mui-button-row">
								        <button type="button" id="lbd-tpwd-copy" data-clipboard-action="copy" data-clipboard-target="#lbd-tpwd" class="mui-btn mui-btn-yellow lbdTpwdCopy" >复制淘口令文案</button>
								    </div>
								    <p id="lbd-tips" style="margin-top: 10px; color: red; display: none;">复制失败，请手动复制文案</p>
								</li>
								<li class="mui-table-view-cell">
									<h5>淘口令使用说明：</h5>
									<p>
										1.如果手机有淘宝APP，则可以使用此方式，如果没有，请先下载淘宝APP。<br />
										2.淘口令使用步骤：<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;a.点击【复制淘口令文案】按钮<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;b.打开手机淘宝APP<br />
										&nbsp;&nbsp;&nbsp;&nbsp;c.稍等片刻后，在出现的页面即可参加优惠<br />
										3.每个优惠活动都有使用期限，过期作废，请尽快下单。
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
