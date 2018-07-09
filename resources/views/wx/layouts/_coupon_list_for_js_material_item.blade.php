couponInfo = item.coupon_info.replace(/满/g, '')
couponInfo = couponInfo.replace(/元/g, '')
couponInfo = couponInfo.replace(/元/g, '')
couponInfo = couponInfo.replace(/减/g, '-')
couponInfo = couponInfo.replace(/无条件券/g, '-')
couponInfoArr=couponInfo.split('-')
price_now = item.zk_final_price-couponInfoArr[1]
price_now = Math.round(parseFloat(price_now)*100)/100
urlArr = item.coupon_share_url.split('?')

if(item.zk_final_price.toString().indexOf('.') < 0){
  item.zk_final_price = item.zk_final_price.toString()+'.00'
}
if(item.zk_final_price.toString().indexOf('.') == item.zk_final_price.toString().length-2){
  item.zk_final_price = item.zk_final_price.toString()+'0'
}

if(price_now.toString().indexOf('.') < 0){
  price_now = price_now.toString()+'.00'
}
if(price_now.toString().indexOf('.') == price_now.toString().length-2){
  price_now = price_now.toString()+'0'
}

str +=   '<a class="addPara" no="data'+pageNo+'a'+i+'" href="{{ route('wx.itemInfo.iteminfo') }}/'+item.num_iid+'">'
str +=     '<data id="data'+pageNo+'a'+i+'" link="'+urlArr[1]+'" coupon="coupon_info='+item.coupon_start_time+'and'+item.coupon_end_time+'and'+couponInfoArr[1]+'"></data>'
str +=       '<div class="mui-row">'
str +=         '<div class="mui-col-xs-4 goods-image"><img src="'+item.pict_url+'"/></div>'
str +=         '<div class="mui-col-xs-8 lbd-content"><p class="lbd-title">'+item.title+'</p></div>'
str +=         '<div class="mui-col-xs-8 lbd-content-more">'
str +=           '<div class="lbd-top">'

if (item.user_type == 1) {
  str += '<span class="lbd-from-tmall">天猫</span>'
} else {
  str += '<span class="lbd-from-taobao">淘宝</span>'
}

str +=             '<span class="lbd-from-new">今日上新</span>销量：'+item.volume+'</div>'
str +=           '<div class="lbd-bottom">'
str +=             '<div class="mui-pull-left"><div class="lbd-price-ori">原价￥'+item.zk_final_price+'</div><div class="lbd-price-now"><span class="lbd-m">￥</span>'+price_now+'</div></div>'
str +=             '<div class="mui-pull-right"><div class="lbd-coupon"><div class="lbd-left-circle"></div><div class="lbd-right-circle"></div><span class="lbd-m">￥</span>'+couponInfoArr[1]+'元券</div></div>'
str +=           '</div>'
str +=         '</div>'
str +=       '</div>'
str +=     '</a>'
