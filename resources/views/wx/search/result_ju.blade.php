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
    <h1 class="mui-title">聚划算搜索结果</h1>
</header>

@include('wx.layouts._footer_tab')

<div class="mui-content">
  <!--商品列表 开始-->
  <div class="mui-row lbd-goods-list" id="lbd-goods-list">
    <ul class="mui-table-view lbd-goods-list-info">
@if(empty($juItems))
        <li class="mui-table-view-cell mui-media">
            <h5 class="mui-text-center">没有搜索到相关的优惠券信息</h5>
        </li>
    </ul>
@else
  @include('wx.layouts._coupon_list_for_ju')
    </ul>
    <!--查看更多商品 开始-->
    <div class="mui-col-xs-12 mui-text-center lbd-index-box" id="lbd-index-see-more">
      <button type="button" class="mui-btn mui-btn-block mui-btn-danger lbd-index-info" data-loading-text="提交中">点击查看更多...</button>
    </div><!--查看更多商品 结束-->
@endif
  </div><!--商品列表 结束-->
</div>
@include('wx.layouts._to_top')
@stop
@section('footJs')
<script src="/storage/wx/js/mui.lazyload.js"></script>
<script src="/storage/wx/js/mui.lazyload.img.js"></script>
<script type="text/javascript" charset="utf-8">
    mui.init();
(function($) {
  var list = document.getElementById("lbd-goods-list");
  $(document).imageLazyload({
    placeholder: '/storage/wx/images/lazyimg.gif'
  });
})(mui);
var pageNo = 1;
mui('#lbd-index-see-more').on('tap', 'button', function() {
  loadingstr = '<button type="button" class="mui-btn mui-btn-block mui-btn-grey lbd-index-info" >玩命加载中...</button>';
  document.getElementById('lbd-index-see-more').innerHTML = loadingstr;

  // ajax获取优惠券信息
  pageNo++
  mui.ajax('{{ route('api.alimama.taobaoJuItemsSearch') }}',{
      data:{
        page_size : '24',
        platform : '2',
        word : '{{ $para['q'] or '' }}',
        pid : '{{ $para['pid'] or '' }}',
        current_page : pageNo
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
              @include('wx.layouts._coupon_list_for_js_ju')
              var li = document.createElement('li');
              li.className = 'mui-table-view-cell mui-media lbd-ju-info';
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

  setTimeout(function() {
    seemore = '<button type="button" class="mui-btn mui-btn-block mui-btn-danger lbd-index-info" data-loading-text="提交中">点击查看更多...</button>';
    document.getElementById('lbd-index-see-more').innerHTML = seemore;
  }, 1500);
})
</script>
@stop
