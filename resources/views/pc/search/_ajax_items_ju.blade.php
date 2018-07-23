<script type="text/javascript">
var url = "{{ route('pc.api.alimama.taobaoJuItemsSearch') }}";
var word = "{{ $para['word'] }}";
var pid = "{{ $para['pid'] }}";
var page_size = "{{ $para['page_size']/2 }}";
var current_page = '2';

// 将ajax获取到的数据插入到列表中
function addItems(data)
{
    itemhtml = '';
    length = data.length;
    for(i = 0; i < length; i++)
    {
        item = data[i];
        mystime = new Date(item.online_start_time);
        if (Number(mystime.getMonth()) + 1 >= 10) {
          month = Number(mystime.getMonth());
        } else {
          month = '0'+(Number(mystime.getMonth()) + 1);
        }
        if (Number(mystime.getDate()) + 1 >= 10) {
          day = Number(mystime.getDate());
        } else {
          day = '0'+mystime.getDate();
        }
        start_time = mystime.getFullYear()+'-'+month+'-'+day+' 00:00:00'

        mystime = new Date(item.online_end_time);
        if (Number(mystime.getMonth()) + 1 >= 10) {
          month = Number(mystime.getMonth());
        } else {
          month = '0'+(Number(mystime.getMonth()) + 1);
        }
        if (Number(mystime.getDate()) + 1 >= 10) {
          day = Number(mystime.getDate());
        } else {
          day = '0'+mystime.getDate();
        }
        end_time = mystime.getFullYear()+'-'+month+'-'+day+' 59:59:59'
        actPrice = Math.round(parseFloat(item.act_price)*100)/100
        if(actPrice.toString().indexOf('.') < 0){
          actPrice = actPrice.toString()+'.00'
        }
        if(actPrice.toString().indexOf('.') == actPrice.toString().length-2){
          actPrice = actPrice.toString()+'0'
        }
        itemhtml += '<div class="row ju-box"><div class="col-xs-4 ju-image">'
        itemhtml += '<a rel="nofollow" href="'+item.pc_url+'" target="_blank"><img src="'+item.pic_url_for_w_l+'"></a></div><div class="col-xs-8 ju-info">'
        itemhtml += '<h2><a rel="nofollow" href="'+item.pc_url+'" target="_blank"><img src="/pcstyle/images/ju32.png" alt="聚划算logo"> '+item.title+'</a></h2>'
        itemhtml += '<div class="ju-special"><span class="tips">产品特点：</span>'
        itemhtml += '<ul class="list-inline"><li>'+item.item_usp_list.string[0]+'</li><li>'+item.item_usp_list.string[1]+'</li><li>'+item.item_usp_list.string[2]+'</li></ul>'
        itemhtml += '</div><div class="row ju-bottom"><div class="col-xs-8 ju-take-box">'
        itemhtml += '<p class="ju-price-info">聚划算活动价:￥<span class="ju-now">'+actPrice+'</span>元 / 原价:￥<span class="ju-ori">'+item.orig_price+'</span>元</p>'
        itemhtml += '<p class="ju-you">包邮免运费</p><div class="text-center ju-action">'
        itemhtml += '<p class="ju-s">'+item.price_usp_list.string[0]+'</p><p class="ju-date">活动开始时间:'+start_time+'</p><p class="ju-date">活动结束时间:'+end_time+'</p>'
        itemhtml += '<div class="ju-link"><a rel="nofollow" href="'+item.pc_url+'" target="_blank">马上领取</a></div>'
        itemhtml += '</div></div><div class="col-xs-4 ju-ercode-img">'
        itemhtml += '<p class="text-center">手机淘宝APP扫码购买</p><img class="lazy" src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data='+item.wap_url+'" >'
        itemhtml += '</div></div></div></div>'
    }
    $('#ajax-ju-item-list').append(itemhtml);
}
// 监听页面滚动的高度，确定抢购时间是否选择固定
$(window).scroll(function() {
    var h = $(document).height() - $(document).scrollTop() - $(window).height();
    var status = $('.ajax-tips p').attr('status');
    if (h < 1000 && status === 'on') {
        $('.ajax-tips p').attr('status', 'off');
        current_page++;
        status = 'off';
        $.ajax({
          url : url,
          async : false,
          timeout : 10000,
          type : 'POST',
          data : {
              page_size : page_size,
              word : word,
              pid : pid,
              current_page : current_page
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
