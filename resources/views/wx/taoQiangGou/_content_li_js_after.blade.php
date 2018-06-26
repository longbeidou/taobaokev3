hourAfter = data[i].start_time.substr(11, 2);
url = data[i].click_url.split('?')
str += '<a href="{{ route('wx.webJump.tqgForJs') }}?'+url[1]+'"><div class="mui-row lbd-box">'
str +=       '<div class="mui-col-xs-4 lbd-img"><img src="'+data[i].pic_url+'"/></div>'
str +=       '<div class="mui-col-xs-8 lbd-more"><div class="lbd-top"><h4 class="lbd-name">'+data[i].title+'</h4></div></div>'
str +=       '<div class="mui-col-xs-8 lbd-bottom">'
str +=         '<div class="mui-pull-left lbd-bottom-box">'
str +=           '<p class="mui-text-right"><span class="lbd-m">￥</span><span class="lbd-price-now">'+data[i].reserve_price+'</span><span class="lbd-price-ori">￥ '+data[i].zk_final_price+'</span></p>'
str +=           '<div class="lbd-tip-no">'+hourAfter+':00准时开抢</div>'
str +=         '</div>'
str +=       '</div>'
str += '</div></a>'
