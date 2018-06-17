@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
  @include('wx.allGoodsCategory._header')
  @include('wx.layouts._footer_tab')

<div class="mui-content mui-row mui-fullscreen lbd-all-kinds">
		<div class="mui-col-xs-3 lbd-control">
			<div id="segmentedControls" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical">
				<a class="mui-control-item mui-active" href="#top0">精品推荐</a>
        @include('wx.allGoodsCategory._left_category')
			</div>
		</div>
		<div id="segmentedControlContents" class="mui-col-xs-9 lbd-content" style="border-left: 1px solid #c8c7cc;">
      @include('wx.allGoodsCategory._recommended')
      @include('wx.allGoodsCategory._main')
		</div>
	</div>
@stop
@section('footJs')
<script type="text/javascript" charset="utf-8">
  mui.init();
</script>
@stop
