@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
@stop
@section('content')

  @include('wx.layouts._footer_tab')

@inject('tqg', 'App\Presenters\TaoQiangGouPresenter')
<div class="mui-content lbd-tqg">
	<div id="slider" class="mui-slider mui-fullscreen">
		@include('wx.taoQiangGou._top_tab')
		<div class="mui-slider-group">
      <!-- 淘抢购的商品信息里列表 -->
      @foreach($tqgItems as $key => $items)
			<div id="item{{ $key }}" class="mui-slider-item mui-control-content {{ $tqg->activeShow($rulesArr, $key, $rulesArr[$key]['hour']) }}">
				<div id="scroll1" class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view">
              @if($items == false)
                @include('wx.taoQiangGou._content_li_no')
              @else
                @foreach($items as $k => $item)
                    @include('wx.taoQiangGou._content_li')
                @endforeach
              @endif
						</ul>
					</div>
				</div>
			</div>
      @endforeach
		</div>
	</div>
</div>
@stop
@section('footJs')
<script src="/wxstyle/js/mui.pullToRefresh.js"></script>
<script src="/wxstyle/js/mui.pullToRefresh.material.js"></script>
<script>
	mui.init();
	(function($) {
		//阻尼系数
		var deceleration = mui.os.ios?0.003:0.0009;
		$('.mui-scroll-wrapper').scroll({
			bounce: false,
			indicators: true, //是否显示滚动条
			deceleration:deceleration
		});
		$.ready(function() {
			test = 5;
      @include('wx.taoQiangGou._ajax_rule_js')
			//循环初始化所有下拉刷新，上拉加载。
			$.each(document.querySelectorAll('.mui-slider-group .mui-scroll'), function(index, pullRefreshEl) {
				$(pullRefreshEl).pullToRefresh({
//							down: {
//								callback: function() {
//									var self = this;
//									setTimeout(function() {
//										var ul = self.element.querySelector('.mui-table-view');
//										ul.insertBefore(createFragment(ul, index, 10, true), ul.firstChild);
//										self.endPullDownToRefresh();
//									}, 1000);
//								}
//							},
					up: {
						callback: function() {
							var self = this;
							setTimeout(function() {
                // ajax获取优惠券信息
                rullArr[index][5]++
                mui.ajax('{{ route('api.alimama.taobaoTbkJuTqgGet') }}',{
                    data:{
                      adzone_id  : rullArr[index][1],
                      start_time : rullArr[index][2],
                      end_time   : rullArr[index][3],
                      page_size  : rullArr[index][4],
                      page_no    : rullArr[index][5]
                    },
                    dataType:'json',//服务器返回json格式数据
                    type:'post',//HTTP请求类型
                    timeout:10000,//超时时间设置为10秒；
                    headers:{
                        'Content-Type':'application/json',
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },
                    success:function(data){
                        //服务器返回响应，根据响应结果，分析是否登录成功；
                        if (data == 415) {
                          self.endPullUpToRefresh(true);
                        } else {
                            var ul = self.element.querySelector('.mui-table-view');
                            ul.appendChild(createFragment(data, ul, index));
                            self.endPullUpToRefresh();
                        }
                    },
                    error:function(xhr,type,errorThrown){
                        //异常处理；
                        console.log(type);
                    }
                });
							}, 1000);
						}
					}
				});
			});
			var createFragment = function(data, ul, index) {
				var length = ul.querySelectorAll('li').length;
				var fragment = document.createDocumentFragment();
				var li;
				for (var i = 0, count = data.length; i < count; i++) {
					li = document.createElement('li');
					li.className = 'mui-table-view-cell lbd-info';
          var hour = data[i].start_time.substr(11, 2);
          hourItem = parseInt(hour)
          var d = new Date();
          str = '';
          if (d.getHours() > hourItem) {
            @include('wx.taoQiangGou._content_li_js_before');
          } else {
            @include('wx.taoQiangGou._content_li_js_after');
          }
					li.innerHTML = str;
					fragment.appendChild(li);
				}
				return fragment;
			};
		});
	})(mui);
</script>
@stop
