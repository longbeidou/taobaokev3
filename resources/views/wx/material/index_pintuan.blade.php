@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')
<style>
  .mui-pull-bottom-tips {
    text-align: center;
    background-color: #efeff4;
    font-size: 15px;
    line-height: 40px;
    color: #777;
  }
</style>
@stop
@section('content')
  @include('wx.material._header')
<div class="mui-content lbd-material">
  <div id="slider" class="mui-slider mui-fullscreen">
		<div id="scroll1" class="mui-scroll-wrapper" style="top: 38px;">
      @include('wx.material._coupon_list')
		</div>
	</div>
</div>
@stop
@section('footJs')
<script src="/wxstyle/js/mui.min.js"></script>
<script src="/wxstyle/js/mui.pullToRefresh.js"></script>
<script src="/wxstyle/js/mui.pullToRefresh.material.js"></script>
<script src="/wxstyle/js/mui.lazyload.js"></script>
<script src="/wxstyle/js/mui.lazyload.img.js"></script>
<script>
    mui.init();
    @include('wx.material._common_js')
</script>
<script type="text/javascript">
  mui('body').on('tap', '.a-can-do', function() {
    document.location.href=this.href;
  })
</script>
@stop
