<script type="text/javascript">
var page_size = {{ $pageSize }}/2;
var adzone_id = {{ $adzoneId }};
var page_no = 2;
var url = "{{ route('pc.api.alimama.taobaoTbkDgItemCouponGet') }}";

// 将ajax获取到的数据插入到列表中
function addItems(data)
{
    itemhtml = '';
    length = data.length;
    for(i = 0; i < length; i++)
    {
        item = data[i];
        if (item.coupon_info != null) {
            couponInfo = item.coupon_info.replace(/满/g, '')
            couponInfo = couponInfo.replace(/元/g, '')
            couponInfo = couponInfo.replace(/元/g, '')
            couponInfo = couponInfo.replace(/减/g, '-')
            couponInfo = couponInfo.replace(/无条件券/g, '-')
            couponInfoArr=couponInfo.split('-')
            price_now = item.zk_final_price-couponInfoArr[1]
            price_now = Math.round(parseFloat(price_now)*100)/100
            urlArr = item.coupon_click_url.split('?')
            if(price_now.toString().indexOf('.') < 0){
              price_now = price_now.toString()+'.00'
            }
            if(price_now.toString().indexOf('.') == price_now.toString().length-2){
              price_now = price_now.toString()+'0'
            }
            if (item.user_type == 0) {
              img_name = 'tmall32';
            } else {
              img_name = 'taobao32';
            }
            itemhtml += '<div class="col-xs-3 item-box"><a no="data'+page_no+'-'+i+'" href="https://www.longbeidou.com/s?wd='+item.num_iid+'" title="'+item.title+'" target="_blank"><div class="item">'
            itemhtml +=       '<div class="img-box"><img class="lazy" src="'+item.pict_url+'"></div>'
            itemhtml +=       '<h2><img src="/pcstyle/images/'+img_name+'.png" alt="淘宝优惠券logo"> '+item.title+'</h2><hr>'
            itemhtml +=       '<div class="info">'
            itemhtml +=         '<div class="row price-now"><div class="col-xs-12"><div class="pull-left">现价￥'+item.zk_final_price+'</div><div class="pull-right">月销:'+item.volume+'</div></div></div>'
            itemhtml +=         '<div class="row price-ori"><div class="col-xs-12">'
            itemhtml +=             '<div class="pull-left">券后<span class="prefix">￥</span><span class="number">'+price_now+'</span></div>'
            itemhtml +=             '<div class="pull-right"><div class="circle-left"></div><div class="circle-right"></div>￥<span class="money">'+couponInfoArr[1]+'</span>元券</div></div>'
            itemhtml +=         '</div></div></div></a><data id="data'+page_no+'-'+i+'" para="'+urlArr[1]+'"></data></div>'
        }
    }
    $('.coupon-list .container>.row').append(itemhtml);
}
// 监听页面滚动的高度，确定抢购时间是否选择固定
$(window).scroll(function() {
    var h = $(document).height() - $(document).scrollTop() - $(window).height();
    var status = $('.ajax-tips p').attr('status');
    if (h < 1000 && status === 'on') {
        $('.ajax-tips p').attr('status', 'off');
        page_no++;
        status = 'off';
        $.ajax({
          url : url,
          async : false,
          timeout : 10000,
          type : 'POST',
          data : {
              page_no : page_no,
              adzone_id : adzone_id,
              page_size : page_size,
              platform : 1
          },
          success : function(result) {
              if (result == 415) {
                  $('.ajax-tips p').append('使出吃奶的力气也没有找到更多的宝贝了~~~');
                  $('.ajax-tips p').attr('status', 'off');
              } else {
                  addItems(result);
                  $('.ajax-tips p').attr('status', 'on');
              }
          }
        });
    }
});
</script>
