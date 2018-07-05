@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_index')
  <meta name="keywords" content="{{ config('website.keywords') }}">
  <meta name="description" content="{{ config('website.description') }}">
@stop
@section('headcss')

@stop
@section('content')
  @include('wx.index._header_scroll_bar')
  @include('wx.layouts._footer_tab')

<div class="mui-content">
  @include('wx.index._banner')

  @include('wx.index._category')
  <!--商品列表 开始-->
  <div class="mui-row lbd-index-list-head" id="lbd-index-list-head-no-fix">
    <ul>
      <li class="lbd-active" style="width:100%;">
          <a>每日精选优惠券商品</a>
      </li>
    </ul>
  </div>
  <div id="mui-row lbd-position-fixed"></div>
  <div class="mui-row lbd-goods-list" id="lbd-goods-list">
    <ul class="mui-table-view lbd-goods-list-info">
@if(empty($couponItems))
        <li class="mui-table-view-cell mui-media">
            <h5 class="mui-text-center">没有获取到相关的优惠券信息</h5>
        </li>
    </ul>
@else
        @include('wx.layouts._coupon_list_for_coupon')
    </ul>
    <!--查看更多商品 开始-->
    <div class="mui-col-xs-12 mui-text-center lbd-index-box" id="lbd-index-see-more">
      <button type="button" class="mui-btn mui-btn-block mui-btn-danger lbd-index-info" data-loading-text="提交中">点击查看更多...</button>
    </div><!--查看更多商品 结束-->
@endif
  </div><!--商品列表 结束-->
</div>
  @include('wx.index._mask')
  @include('wx.layouts._to_top')
@stop
@section('footJs')
<script src="/wxstyle/js/mui.lazyload.js"></script>
<script src="/wxstyle/js/mui.lazyload.img.js"></script>
<script type="text/javascript" charset="utf-8">
      mui.init();
      mui("#lbd-mask-cate").on('tap','#lbd-mask-hide',function(){
        document.getElementById('lbd-mask-cate').style.display = 'none';
  })
      mui("#lbd-mask-cate").on('tap','.lbd-mask-bottom',function(){
        document.getElementById('lbd-mask-cate').style.display = 'none';
  })
      mui("#lbd-index-header").on('tap', '#lbd-mask-cate-show', function() {
        document.getElementById("lbd-mask-cate").style.display = 'block';
      })
      mui('#lbd-index-scroll').on('tap','a',function(){
        document.location.href=this.href;
      });
      mui('#lbd-mask-cate').on('tap','a',function(){
        document.location.href=this.href;
      });
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
    mui.ajax('{{ route('api.alimama.taobaoTbkDgItemCouponGet') }}',{
        data:{
            page_no : pageNo,
            adzone_id : {{ $adzoneId }},
            page_size : {{ $pageSize }},
            platform : 2
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
                @include('wx.layouts._coupon_list_for_js_coupon')
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
    setTimeout(function() {
      seemore = '<button type="button" class="mui-btn mui-btn-block mui-btn-danger lbd-index-info" data-loading-text="提交中">点击查看更多...</button>';
      document.getElementById('lbd-index-see-more').innerHTML = seemore;
    }, 1500);
  })
  </script>
  <script type="text/javascript">
  // 监听tap事件，让a标签自动加入url的参数
  mui('body').on('tap','.addURL',function(){
    document.location.href=this.href+'?url='+this.getAttribute('e');
  })
  </script>
@stop
