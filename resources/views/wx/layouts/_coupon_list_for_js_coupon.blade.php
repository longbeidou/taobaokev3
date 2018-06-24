couponInfo = item.coupon_info.replace(/满/g, '')
couponInfo = couponInfo.replace(/元/g, '')
couponInfo = couponInfo.replace(/元/g, '')
couponInfo = couponInfo.replace(/减/g, '-')
couponInfo = couponInfo.replace(/无条件券/g, '-')
couponInfoArr=couponInfo.split('-')
price_now = item.zk_final_price-couponInfoArr[1]
price_now = Math.round(parseFloat(price_now)*100)/100
ePara = item.coupon_click_url.substr(39)

str += '<a class="addURL" e="'+ePara+'" href="{{ route('wx.itemInfo.item') }}/'+item.num_iid+'">'
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
