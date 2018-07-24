<script type="text/javascript">
var page_size = {{ $requestPara['page_size'] }};
var adzone_id = {{ $requestPara['adzone_id'] }};
var material_id = {{ $requestPara['material_id'] }};
var page_no = 1;
var url = "{{ route('pc.api.alimama.taobaoTbkDgOptimusMaterial') }}";

function numberFormat(price_now)
{
  price_now = Math.round(parseFloat(price_now)*100)/100
  if(price_now.toString().indexOf('.') < 0){
    price_now = price_now.toString()+'.00'
  }
  if(price_now.toString().indexOf('.') == price_now.toString().length-2){
    price_now = price_now.toString()+'0'
  }
  return price_now;
}

function timestempsToDate(timestemp)
{
  var t = parseInt(timestemp);
  var dateObj = new Date(t);
  var Y = dateObj.getFullYear();
  var m = dateObj.getMonth()+1 < 10 ? '0'+(dateObj.getMonth()+1) : dateObj.getMonth()+1;
  var d = dateObj.getDate();
  return Y+'-'+m+'-'+d;
}

// 将ajax获取到的数据插入到列表中
function addItems(data)
{
    itemhtml = '';
    length = data.length;
    for(i = 0; i < length; i++)
    {
        item = data[i];
        if (item.user_type == 1) {
          img_name = 'tmall32';
        } else {
          img_name = 'taobao32';
        }
        if (item.item_description == '')
        {
          var desc = '热销商品推荐';
        } else {
          var desc = item.item_description;
        }
        price_now = numberFormat(item.jdd_price)
        price_ori = numberFormat(item.orig_price)
        urlArr = item.click_url.split('?')
        itemhtml += '<div class="col-xs-3 item-box">'
        itemhtml += '<a href="{{ route('pc.itemInfo.pinTuanInfo') }}/'+item.num_iid+'?'+urlArr[1]+'&pintuan_info='+item.ostime+'and'+item.oetime+'and'+item.jdd_price+'and'+item.orig_price+'and'+item.item_description+'" target="_blank">'
        itemhtml += '<div class="item"><div class="img-box"><img src="'+item.pict_url+'">'
        itemhtml += '<div class="item-desc">'+desc+'</div></div>'
        itemhtml += '<h2><img src="/pcstyle/images/'+img_name+'.png" alt="淘宝优惠券logo"> '+item.title+'</h2><hr><div class="info">'
        itemhtml += '<div class="row price-now"><div class="col-xs-12"><div class="pull-left  pt-dmj">单买价￥'+price_ori+'</div>'
        itemhtml += '<div class="pull-right  pt-num">'+item.sell_num+'人已拼团</div></div></div><div class="row price-ori"><div class="col-xs-12">'
        itemhtml += '<div class="pull-left  pt-ptj">拼团价<span class="prefix">￥</span><span class="number">'+price_now+'</span></div>'
        itemhtml += '<div class="pull-right  pt-people-box">'
        if (item.jdd_num == 2) {
          itemhtml += '<span class="pt-people p2">2人团</span>';
        } else {
          itemhtml += '<span class="pt-people p4">4人团</span>';
        }
        itemhtml += '</div></div></div></div></div></a></div>'
    }
    $('.material-coupon-list .container>.row').append(itemhtml);
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
              material_id : material_id,
          },
          success : function(result) {
              if (result == 415) {
                  $('.ajax-tips p').text('报~~~使出吃奶的力气也没有找到更多的宝贝了~~~');
                  $('.ajax-tips p').attr('status', 'off');
              } else {
                  try {
                    addItems(result);
                  } catch (e) {

                  }
                  $('.ajax-tips p').attr('status', 'on');
              }
          }
        });
    }
});
</script>
