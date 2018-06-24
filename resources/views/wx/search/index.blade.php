@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
<header class="mui-bar mui-bar-nav lbd-search-header">
  <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
  <a class="mui-icon mui-icon-home mui-pull-right" href="{{ route('wx.index') }}"></a>
  <h1 class="mui-title">搜优惠券</h1>
</header>

@include('wx.layouts._footer_tab')

<div class="mui-content lbd-search">
	<div id="slider" class="mui-slider">
		<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
			<a class="mui-control-item mui-active" href="#item1mobile">全部</a>
			<a class="mui-control-item" href="#item2mobile">天猫</a>
			<a class="mui-control-item" href="#item3mobile">聚划算</a>
			<a class="mui-control-item" href="#item4mobile">淘口令</a>
		</div>
		<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-3"></div>
		<div class="mui-slider-group">
			<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
				<div class="mui-content-padded" >
					<form action="{{ route('wx.search.all') }}" method="get">
						<div class="mui-input-row">
							<textarea id="textarea" name='q' rows="5" placeholder="请输入商品的名称或商品的关键字（例如：T恤 女），商品关键字用空格隔开..." required></textarea>
						</div>
						<div class="mui-button-row">
							<button type="submit" class="mui-btn mui-btn-block mui-btn-danger" >搜 索</button>
						</div>
					</form>
					<p><strong>*</strong>搜索淘宝和天猫的商品优惠券</p>
				</div>
			</div>
			<div id="item2mobile" class="mui-slider-item mui-control-content">
				<div class="mui-content-padded" >
					<form action="{{ route('wx.search.tmall') }}" method="get">
						<div class="mui-input-row">
							<textarea id="textarea" name='q' rows="5" placeholder="请输入商品的名称或商品的关键字（例如：T恤 女），商品关键字用空格隔开..." required></textarea>
						</div>
						<div class="mui-button-row">
							<button type="submit" class="mui-btn mui-btn-block mui-btn-danger" >搜 索</button>
						</div>
					</form>
					<p><strong>*</strong>只搜索天猫的商品优惠券</p>
				</div>
			</div>
			<div id="item3mobile" class="mui-slider-item mui-control-content">
				<div class="mui-content-padded" >
					<form action="{{ route('wx.search.ju') }}" method="get">
						<div class="mui-input-row">
							<textarea id="textarea" name='q' rows="5" placeholder="请输入商品的名称或商品的关键字（例如：T恤 女），商品关键字用空格隔开..." required></textarea>
						</div>
						<div class="mui-button-row">
							<button type="submit" class="mui-btn mui-btn-block mui-btn-danger" >搜 索</button>
						</div>
					</form>
					<p><strong>*</strong>只搜索聚划算的商品优惠券</p>
				</div>
			</div>
			<div id="item4mobile" class="mui-slider-item mui-control-content">
				<div class="mui-content-padded" >
					<form action="{{ route('wx.search.tpwd') }}" method="get">
						<div class="mui-input-row">
							<textarea id="textarea" name='q' rows="5" placeholder="请粘贴含有淘口令的文字，例如：復·制这段描述，€z8rP0wuMBLc€ ，咑閞【手机淘宝】即可查看。" required></textarea>
						</div>
						<div class="mui-button-row">
							<button type="submit" class="mui-btn mui-btn-block mui-btn-danger" >搜 索</button>
						</div>
					</form>
					<p><strong>*</strong>通过淘口令搜素商品优惠券</p>
				</div>
			</div>
		</div>
	</div>

  @include('wx.layouts._guess_you_like_coupon')

</div>
@stop
@section('footJs')
<script type="text/javascript" charset="utf-8">
  mui.init();
  // 监听tap事件，让a标签自动加入url的参数
  mui('body').on('tap','.addURL',function(){
    document.location.href=this.href+'?url='+this.getAttribute('e');
  })
</script>
@stop
