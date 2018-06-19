@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <a class="mui-icon mui-icon-search mui-pull-right" href="{{ route('wx.search.index') }}"></a>
    <h1 class="mui-title">淘宝天猫优惠券搜索结果</h1>
</header>

@include('wx.layouts._footer_tab')

<div class="mui-content">
  @inject('showActive', 'App\Presenters\CouponListPresenter')
  <!--商品列表 开始-->
  <div class="mui-row lbd-index-list-head lbd-fixed" id="lbd-index-list-head">
    <ul>
      <li class="{{ $showActive->showActiveForSort($sort, '') }}">
          <a href="{{ route('wx.search.all') }}?q={{ $q }}">精选</a>
      </li>
      <li class="{{ $showActive->showActiveForSort($sort, 'sales') }}">
          <a href="{{ route('wx.search.all') }}?sort=sales&q={{ $q }}">销量</a>
      </li>
      <li class="{{ $showActive->showActiveForSort($sort, 'commi') }}">
          <a href="{{ route('wx.search.all') }}?sort=commi&q={{ $q }}">最热</a>
      </li>
      <li class="{{ $showActive->showActiveForSort($sort, 'price') }}">
          <a href="{{ route('wx.search.all') }}?sort=price&q={{ $q }}">价格</a>
      </li>
    </ul>
  </div>
  <div class="mui-row lbd-position-fixed-height"></div>
  <div class="mui-row lbd-goods-list" id="lbd-goods-list">
    <ul class="mui-table-view lbd-goods-list-info">
@if(empty($couponItems))
        <li class="mui-table-view-cell mui-media">
            <h5 class="mui-text-center">没有搜索到相关的优惠券信息</h5>
        </li>
    </ul>
@else
  @include('wx.layouts._coupon_list_for_material')
    </ul>
    <!--查看更多商品 开始-->
    <div class="mui-col-xs-12 mui-text-center lbd-index-box" id="lbd-index-see-more">
      <button type="button" class="mui-btn mui-btn-block mui-btn-grey lbd-index-info" data-loading-text="提交中">点击查看更多...</button>
    </div><!--查看更多商品 结束-->
@endif
  </div><!--商品列表 结束-->
</div>
@stop
@section('footJs')
<script src="/wxstyle/js/mui.lazyload.js"></script>
<script src="/wxstyle/js/mui.lazyload.img.js"></script>
<script type="text/javascript" charset="utf-8">
    mui.init();
(function($) {
  var list = document.getElementById("lbd-goods-list");
  $(document).imageLazyload({
    placeholder: '/wxstyle/images/lazyimg.gif'
  });
})(mui);
var pageNo = 1;
mui('#lbd-index-see-more').on('tap', 'button', function() {
  loadingstr = '<button type="button" class="mui-btn mui-btn-block mui-btn-grey lbd-index-info" >玩命加载中...</button>';
  document.getElementById('lbd-index-see-more').innerHTML = loadingstr;

  // ajax获取优惠券信息
  pageNo++
  mui.ajax('{{ route('api.alimama.taobaoTbkDgMaterialOptional') }}',{
      data:{
        page_size : '24',
        platform : '2',
        q : '{{ $para['q'] or '' }}',
        has_coupon : 'true',
        adzone_id : '{{ $para['adzone_id'] or '' }}',
        sort : '{{ $para['sort'] }}',
        page_no : pageNo
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
            // alert("请求参数出错，请刷新页面重新操作！")
            document.getElementById('lbd-index-see-more').style.display = 'none';
            var table = document.body.querySelector('.lbd-goods-list-info');
      			var li = document.createElement('li');
      			li.className = 'mui-table-view-cell mui-media';
      			li.innerHTML = '<h5 class="mui-text-center">使出吃奶的力气也没有找到更多的宝贝了~</h5>';
            table.appendChild(li);
          } else {
            var str = '';
            var len = data.length;
            var table = document.body.querySelector('.lbd-goods-list-info');
            for (i = 0; i < len; i++) {
              item = data[i];
              @include('wx.layouts._coupon_list_for_js_material')
              var li = document.createElement('li');
              li.className = 'mui-table-view-cell mui-media';
              li.innerHTML = str;
              table.appendChild(li);
              str = '';
            }
          }
      },
      error:function(xhr,type,errorThrown){
          //异常处理；
          console.log(type);
      }
  });

  // var table = document.body.querySelector('.lbd-goods-list-info');
  // var li = document.createElement('li');
  // li.className = 'mui-table-view-cell mui-media';
  // li.innerHTML = 'str';
  // table.appendChild(li);


  setTimeout(function() {
    seemore = '<button type="button" class="mui-btn mui-btn-block mui-btn-grey lbd-index-info" data-loading-text="提交中">点击查看更多...</button>';
    document.getElementById('lbd-index-see-more').innerHTML = seemore;
  }, 1500);
})
</script>
@stop
