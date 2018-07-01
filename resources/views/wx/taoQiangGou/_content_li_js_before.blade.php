url = data[i].click_url.split('?e=')

if(data[i].zk_final_price.toString().indexOf('.') < 0){
  data[i].zk_final_price = data[i].zk_final_price.toString()+'.00'
}
if(data[i].zk_final_price.toString().indexOf('.') == data[i].zk_final_price.toString().length-2){
  data[i].zk_final_price = data[i].zk_final_price.toString()+'0'
}

str += '<a rel="nofollow" href="{{ route('wx.webJump.tqgForJs') }}?e='+url[1]+'/">'
str +=     '<div class="mui-row lbd-box">'
str +=       '<div class="mui-col-xs-4 lbd-img"><img src="'+data[i].pic_url+'"/></div>'
str +=       '<div class="mui-col-xs-8 lbd-more"><div class="lbd-top"><h4 class="lbd-name">'+data[i].title+'</h4></div></div>'
str +=       '<div class="mui-col-xs-8 lbd-bottom">'
str +=         '<div class="mui-pull-left"><p><span class="lbd-m">￥</span><span class="lbd-price-now">'+data[i].reserve_price+'</span><span class="lbd-price-ori">￥'+data[i].zk_final_price+'</span></p><div class="lbd-tip">疯抢进行中</div></div>'
str +=         '<div class="mui-pull-right"><div class="mui-text-center lbd-take">马上抢 ></div><div class="mui-pull-right lbd-mount">'+data[i].total_amount+'件已抢</div></div>'
str +=       '</div>'
str +=     '</div>'
str += '</a>'
