//	图片懒加载
  (function($) {
    var list = document.getElementById("lbd-goods-list");
    $(document).imageLazyload({
      diff: 700,
      placeholder: '/wxstyle/images/lazyimg.gif'
    });
  })(mui);

  pageNo     = 2;
  pageSize   = '20';
  adzoneId   = '{{ $requestPara['adzone_id'] }}';
  materialId = '{{ $requestPara['material_id'] }}';
  apiURL     = "{{ route('api.alimama.taobaoTbkDgOptimusMaterial') }}";
  targetURL  = "{{ route('wx.itemInfo.iteminfo') }}";

(function($) {
  //阻尼系数
  var deceleration = mui.os.ios?0.003:0.0009;
  $('.mui-scroll-wrapper').scroll({
    bounce: false,
    indicators: true, //是否显示滚动条
    deceleration:deceleration
  });
  $.ready(function() {
    //循环初始化所有下拉刷新，上拉加载。
    $.each(document.querySelectorAll('.mui-scroll'), function(index, pullRefreshEl) {
      $(pullRefreshEl).pullToRefresh({
        up: {
          callback: function() {
            var self = this;
            setTimeout(function() {
              mui.ajax(apiURL,{
                  data:{
                    adzone_id   : adzoneId,
                    material_id : materialId,
                    page_size   : pageSize,
                    page_no     : pageNo
                  },
                  dataType:'json',//服务器返回json格式数据
                  type:'post',//HTTP请求类型
                  timeout:10000,//超时时间设置为10秒；
                  headers:{
                      'Content-Type':'application/json',
                      'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                  },
                  success:function(data){
                      pageNo++;
                      //服务器返回响应，根据响应结果，分析是否登录成功；
                      if (data == 415) {
                        self.endPullUpToRefresh(true);
                      } else {
                        if (data.length > 0) {
                          var ul = self.element.querySelector('.mui-table-view');
                          ul.appendChild(createFragment(data, ul));
                          self.endPullUpToRefresh();
                        } else {
                          self.endPullUpToRefresh(true);
                        }
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
    var createFragment = function(data, ul) {
      var fragment = document.createDocumentFragment();
      var li;
      for (var i = 0, count = data.length; i < count; i++) {
        if (data[i].coupon_click_url != null) {
          urlParaArr = data[i].coupon_click_url.split('?')
          if (urlParaArr[1] == null) {
            urlPara = '';
          } else {
            urlPara = urlParaArr[1];
          }
          startTime = new Date(parseInt(data[i].coupon_end_time));
          s_y = startTime.getFullYear();
          s_m = startTime.getMonth()+1;
          s_d = startTime.getDate();
          end = s_y+'-'+s_m+'-'+s_d;
          startTime = new Date(parseInt(data[i].coupon_start_time));
          s_y = startTime.getFullYear();
          s_m = startTime.getMonth()+1;
          s_d = startTime.getDate();
          start = s_y+'-'+s_m+'-'+s_d;
          coupon = 'coupon_info='+start+'and'+end+'and'+data[i].coupon_amount;
          str = '';
          li = document.createElement('li');
          li.className = 'mui-table-view-cell mui-media';
          str += '<a class="addPara" no="data'+pageNo+'a'+i+'" href="'+targetURL+'/'+data[i].num_iid+'"><data id="data'+pageNo+'a'+i+'" link="'+urlPara+'" coupon='+coupon+'></data>'
            str +=   '<div class="mui-row">'
              str +=     '<div class="mui-col-xs-4 goods-image"><img src="'+data[i].pict_url+'"/></div>'
              str +=     '<div class="mui-col-xs-8 lbd-content"><p class="lbd-title">'+data[i].title+'</p></div>'
              str +=     '<div class="mui-col-xs-8 lbd-content-more"><div class="lbd-top">'
                if(data[i].user_type == 1) {
                  str += '<span class="lbd-from-tmall">天猫</span>'
                } else {
                  str += '<span class="lbd-from-taobao">淘宝</span>'
                }
                str +=         '<span class="lbd-from-new">今日上新</span>销量：'+data[i].volume+'</div>'
                str +=       '<div class="lbd-bottom"><div class="mui-pull-left"><div class="lbd-price-ori">原价￥'+parseFloat(data[i].zk_final_price).toFixed(2)+'</div>'
                str +=           '<div class="lbd-price-now"><span class="lbd-m">￥</span>'+parseFloat(data[i].zk_final_price - data[i].coupon_amount).toFixed(2)+'</div></div>'
                str +=         '<div class="mui-pull-right"><div class="lbd-coupon"><div class="lbd-left-circle"></div><div class="lbd-right-circle"></div>'
                str +=         '<span class="lbd-m">￥</span>'+data[i].coupon_amount+'元券</div></div></div></div></div></a>'
                li.innerHTML = str;
                fragment.appendChild(li);
        }
      }
      return fragment;
    };
  });
})(mui);
// 监听tap事件，让a标签自动加入url的参数
mui('body').on('tap','.addPara',function(){
  dataId = this.getAttribute('no');
  link = document.getElementById(dataId).getAttribute('link')
  coupon = document.getElementById(dataId).getAttribute('coupon')
  document.location.href=this.href+'?'+link+'&'+coupon;
})

// 回到顶部
document.writeln("<div id=\'lbd-action-top\' class=\'lbd-action-top\'>");
document.writeln("  <i class=\'mui-icon-extra mui-icon-extra-top\' onclick=\'goToTop()\'></i>");
document.writeln("</div>");
// // 点击回到顶部
function goToTop()
{
  document.getElementById('lbd-action-top').style.display = 'none';
  mui('#scroll1').scroll().scrollTo(0,0);
}
window.onscroll = function () {
  y = mui('.mui-scroll-wrapper').scroll().y;
  if (y < -500) {
    document.getElementById('lbd-action-top').style.zIndex = 999;
    document.getElementById('lbd-action-top').style.display = '';
  }
  else {
    document.getElementById('lbd-action-top').style.zIndex = -1;
    document.getElementById('lbd-action-top').style.display = 'none';
  }
}
