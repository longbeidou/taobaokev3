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
  targetURL  = "{{ route('wx.itemInfo.pinTuanInfo') }}";

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
          urlParaArr = data[i].click_url.split('?')
          if (urlParaArr[1] == null) {
            urlPara = '';
          } else {
            urlPara = urlParaArr[1];
          }
          function format(num) {
            if(num.toString().indexOf('.') < 0){
              num = num.toString()+'.00'
            }
            if(num.toString().indexOf('.') == num.toString().length-2){
              num = num.toString()+'0'
            }
            return num;
          }
          price_ori = format(data[i].orig_price)
          price_now = format(data[i].jdd_price)
          save_money = format(parseInt(data[i].orig_price*100 - data[i].jdd_price*100)/100)
          str = '';
          li = document.createElement('li');
          li.className = 'mui-table-view-cell mui-media';
          str += '<a class="addPara" no="data'+pageNo+'a'+i+'" href="'+targetURL+'/'+data[i].num_iid+'">'
          str +=  '<data id="data'+pageNo+'a'+i+'" link="'+urlPara+'" pintuan="coupon_info='+data[i].ostime+'and'+data[i].oetime+'and'+data[i].orig_price+'and'+data[i].jdd_price+'and'+data[i].item_description+'"></data>'
          str +=  '<div class="mui-row">'
          str +=    '<div class="mui-col-xs-4 goods-image"><img src="'+data[i].pict_url+'"/></div>'
          str +=    '<div class="mui-col-xs-8 lbd-content"><p class="lbd-title">'+data[i].title+'</p></div>'
          str +=    '<div class="mui-col-xs-8 lbd-content-more">'
          str +=      '<div class="lbd-top">'
                        if(data[i].user_type == 1) {
                          str += '<span class="lbd-from-tmall">天猫</span>'
                        } else {
                          str += '<span class="lbd-from-taobao">淘宝</span>'
                        }
          str +=        '<span class="lbd-from-new">'+data[i].jdd_num+'人团</span> 销量：'+data[i].sell_num+'</div>'
          str +=      '<div class="lbd-bottom"><div class="mui-pull-left">'
          str +=          '<div class="lbd-price-ori" style="text-decoration: none;">单买价￥'+price_ori+'</div>'
          str +=          '<div class="lbd-price-now" style="font-size: 15px;"><span class="lbd-m">拼团价￥</span>'+price_now+'</div>'
          str +=        '</div><div class="mui-pull-right"><div class="lbd-coupon" style="padding: 7px 4px 0px;">'
          str +=            '<span class="lbd-m" style="font-size: 12px;">省</span>'+save_money+'</div>'
          str +=        '</div></div></div></div></a>'
          li.innerHTML = str;
          fragment.appendChild(li);
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
