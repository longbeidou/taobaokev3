@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
  @include('wx.goodsCategory._header_scroll_bar')
  @include('wx.layouts._footer_tab')

<div class="mui-content">
  @include('wx.goodsCategory._goods_category_sub')

  <!--商品列表 开始-->
  @inject('showActive', 'App\Presenters\CouponListPresenter')
  <div class="mui-row lbd-index-list-head" id="lbd-index-list-head">
    <ul>
      <li class="{{ $showActive->showActiveForSort($sort, '') }}">
          <a href="{{ route('goodsCategorys.categoryOne', $id) }}">精选</a>
      </li>
      <li class="{{ $showActive->showActiveForSort($sort, 'sales') }}">
          <a href="{{ route('goodsCategorys.categoryOne', ['id' => $id, 'sort' => 'sales']) }}">销量</a>
      </li>
      <li class="{{ $showActive->showActiveForSort($sort, 'commi') }}">
          <a href="{{ route('goodsCategorys.categoryOne', ['id' => $id, 'sort' => 'commi']) }}">最热</a>
      </li>
      <li class="{{ $showActive->showActiveForSort($sort, 'price') }}">
          <a href="{{ route('goodsCategorys.categoryOne', ['id' => $id, 'sort' => 'price']) }}">价格</a>
      </li>
    </ul>
  </div>
  <div id="mui-row lbd-position-fixed"></div>
  <div class="mui-row lbd-goods-list" id="lbd-goods-list">
    <ul class="mui-table-view lbd-goods-list-info">
        @include('wx.layouts._coupon_list_for_material')
    </ul>
    <!--查看更多商品 开始-->
    <div class="mui-col-xs-12 mui-text-center lbd-index-box" id="lbd-index-see-more">
      <button type="button" class="mui-btn mui-btn-block mui-btn-grey lbd-index-info" data-loading-text="提交中">点击查看更多...</button>
    </div><!--查看更多商品 结束-->
  </div><!--商品列表 结束-->
</div>
  @include('wx.index._mask')
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
            // adzone_id :  $adzoneId }},
            // page_size :  $pageSize }},
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
              alert("请求参数出错，请刷新页面重新操作！")
            } else {
              var str = '';
              var len = data.length;
              var table = document.body.querySelector('.lbd-goods-list-info');
              for (i = 0; i < len; i++) {
                item = data[i];
                @include('wx.layouts._coupon_list_for_js')
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
      seemore = '<button type="button" class="mui-btn mui-btn-block mui-btn-grey lbd-index-info" data-loading-text="提交中">点击查看更多...</button>';
      document.getElementById('lbd-index-see-more').innerHTML = seemore;
    }, 1500);
  })
  </script>
  <script type="text/javascript">
  function ___getPageScroll() {
      var xScroll, yScroll;
      if (self.pageYOffset) {
          yScroll = self.pageYOffset;
          xScroll = self.pageXOffset;
      } else if (document.documentElement && document.documentElement.scrollTop) {     // Explorer 6 Strict
          yScroll = document.documentElement.scrollTop;
          xScroll = document.documentElement.scrollLeft;
      } else if (document.body) {// all other Explorers
          yScroll = document.body.scrollTop;
          xScroll = document.body.scrollLeft;
      }
      arrayPageScroll = new Array(xScroll,yScroll);
      return arrayPageScroll;
  };
  setInterval(function() {
      var xScroll, yScroll;
      if (self.pageYOffset) {
          yScroll = self.pageYOffset;
          xScroll = self.pageXOffset;
      } else if (document.documentElement && document.documentElement.scrollTop) {     // Explorer 6 Strict
          yScroll = document.documentElement.scrollTop;
          xScroll = document.documentElement.scrollLeft;
      } else if (document.body) {// all other Explorers
          yScroll = document.body.scrollTop;
          xScroll = document.body.scrollLeft;
      }

    if (yScroll > 280) {
      document.getElementById('lbd-index-list-head').style.position = 'fixed';
      document.getElementById('mui-row lbd-position-fixed').style.height = '31px';
    } else {
      document.getElementById('lbd-index-list-head').style.position = '';
      document.getElementById('mui-row lbd-position-fixed').style.height = '0px';
    }
  }, 100)
  </script>
@stop
