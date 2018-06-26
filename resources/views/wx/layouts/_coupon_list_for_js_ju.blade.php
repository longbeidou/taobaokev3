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

urlPara = item.wap_url.split('?')
urlParaArr = urlPara[1].split('&')
id = urlParaArr[0].replace(/id=/, '')
item_id = urlParaArr[1].replace(/item_id=/, '')

str +=     '<a rel="nofollow" href="{{ route('wx.webJump.juForJs') }}/'+id+'/'+item_id+'/">'
str +=     	'<div class="mui-row">'
str +=     		'<div class="mui-col-xs-4 goods-image"><img src="'+item.pic_url_for_w_l+'"/></div>'
str +=     		'<div class="mui-col-xs-8 lbd-content-top">'
str +=     			'<p class="lbd-title">'+item.title+'</p>'
str +=     			'<p class="lbd-usp mui-text-center"><span class="lbd-info">'+item.item_usp_list.string[0]+'</span>/<span class="lbd-info">'+item.item_usp_list.string[1]+'</span>/<span class="lbd-info">'+item.item_usp_list.string[2]+'</span></p>'
str +=     			'<p class="mui-text-right mui-price-info"><span class="mui-mark-now">￥</span><span class="mui-price_now">'+item.act_price+'</span><span class="mui-mark-ori">￥</span><span class="mui-price_ori">'+item.orig_price+'</span></p>'
str +=     		'</div>'
str +=     		'<div class="mui-col-xs-8 lbd-content-buttom mui-text-right">'
str +=     			'<div class="lbd-coupon-box mui-text-center"><div class="lbd-left-circle-1"></div><div class="lbd-left-circle-2"></div><div class="lbd-left-circle-3"></div><div class="lbd-right-circle-1"></div><div class="lbd-right-circle-2"></div><div class="lbd-right-circle-3"></div>'
str += 						'<p class="lbd-usp-des">'+item.price_usp_list.string[0]+'</p>'
str += 						'<p class="lbd-date-begin">开始时间：'+start_time+'</p>'
str += 						'<p class="lbd-date-end">结束时间：'+end_time+'</p>'
str +=     			'</div>'
str +=     		'</div>'
str +=     	'</div>'
str +=     '</a>'
