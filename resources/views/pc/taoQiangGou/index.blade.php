@extends('pc.layouts.master')
@section('title')
  @include('pc.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
    <header>
        @include('pc.layouts._top')
    </header>
    @include('pc.layouts._nav_tab')
    @include('pc.taoQiangGou._qiang_time')
    @include('pc.taoQiangGou._banner')
    @include('pc.taoQiangGou._item_list')
    @include('pc.layouts._footer_adv')
    @include('pc.layouts._footer')
@stop
@section('footJs')
    <!-- include('pc.index._ajax_items') -->
    <script type="text/javascript">
    // 复制淘抢购的时间切换和内容展现
    $('#tqg-time li').bind('click', function() {
      $('#tqg-time li').removeClass('active');
      $(this).addClass('active');
      $('.tqg-item .item-pannel').removeClass('active');
      id = '.'+$(this).attr('tqg-item-id');
      $(id).addClass('active')
    });

    // 当前抢购的倒计时
    function leftTimer(year,month,day,hour,minute,second) {
      var leftTime = (new Date(year,month-1,day,hour,minute,second)) - (new Date());
      var d = parseInt(leftTime / 1000 / 60 / 60 / 24 , 10); //计算剩余的天数
      var h = parseInt(leftTime / 1000 / 60 / 60 % 24 , 10); //计算剩余的小时
      var m = parseInt(leftTime / 1000 / 60 % 60, 10);//计算剩余的分钟
      var s = parseInt(leftTime / 1000 % 60, 10);//计算剩余的秒数
      days = checkTime(d);
      hours = checkTime(h);
      minutes = checkTime(m);
      seconds = checkTime(s);
      timeStr = hours+':'+minutes+':'+seconds;
      $('#time-left-active').text(timeStr);
      var h = $('#time-left-active').attr('endtime');
      if (d <=0 && h <= 0 && m <= 0 && s <= 0) {
        $('#time-left-active').text('00:00:00');
        clearInterval(time_left_active)
      } else {
        var para = "leftTimer({{ date('Y') }}, {{ date('m') }}, {{ date('d') }},"+h+", 59, 59)";
        // time_left_active = setInterval(para, 1000);
      }
    }

    // 当前抢购的倒计时
    function leftTimer2(targetId,year,month,day,hour,minute,second) {
      var leftTime = (new Date(year,month-1,day,hour,minute,second)) - (new Date());
      var d = parseInt(leftTime / 1000 / 60 / 60 / 24 , 10); //计算剩余的天数
      var h = parseInt(leftTime / 1000 / 60 / 60 % 24 , 10); //计算剩余的小时
      var m = parseInt(leftTime / 1000 / 60 % 60, 10);//计算剩余的分钟
      var s = parseInt(leftTime / 1000 % 60, 10);//计算剩余的秒数
      days = checkTime(d);
      hours = checkTime(h);
      minutes = checkTime(m);
      seconds = checkTime(s);
      timeStr = hours+':'+minutes+':'+seconds;
      $(targetId).text(timeStr);
      var h = $(targetId).attr('endtime');
      if (d <=0 && h <= 0 && m <= 0 && s <= 0) {
        $(targetId).text('00:00:00');
        clearInterval(time_left_active2)
      } else {
        var para2 = "leftTimer2(targetId,{{ date('Y') }}, {{ date('m') }}, {{ date('d') }},"+h+", 59, 59)";
        // time_left_active2 = setInterval(para2, 1000);
      }
    }
    // 检查日期的格式
    function checkTime(i){
      if (i < 10) {
        i = '0'+i;
      }
      return i;
    }
    var h = $('#time-left-active').attr('endtime');
    leftTimer({{date('Y')}}, {{date('m')}}, {{date('d')}}, h, 59, 59)
    // 点击获取倒计时
    $('.tqg-item-list-box').bind('click', function(){
      var tag = '';
      targetId = '#'+$(this).attr('data');
      hour = $(targetId).attr('endtime');
      if (hour != undefined) {
        leftTimer2(targetId, {{date('Y')}}, {{date('m')}}, {{date('d')}}, hour, 59, 59)
      }
    });
    @include('pc.taoQiangGou._ajax_rule_js')
    now_date = new Date();
    now_hour = now_date.getHours();
    $('.tqg-items-ajax').bind('click', function() {
        index = $(this).attr('index');
        status = $(this).attr('status');
        rullArr[index][5]++
        url = '{{ route("pc.api.alimama.taobaoTbkJuTqgGet") }}'
        $.ajax({
            url : url,
            async : false,
            timeout : 10000,
            type : 'POST',
            data : {
                adzone_id  : rullArr[index][1],
                start_time : rullArr[index][2],
                end_time   : rullArr[index][3],
                page_size  : rullArr[index][4],
                page_no    : rullArr[index][5]
            },
            success : function(result) {
                if (result == 415) {
                    var s = '.item'+index+' .ajax-tips p';
                    $(s).text('使出吃奶的力气也没有找到更多的宝贝了~~~');
                    $(s).attr('status', 'off');
                } else {
                    addItems(result, status);
                    $(s).attr('status', 'on');
                }
            }
        });
    });
    // 增加淘抢购的商品
    function addItems(data, status)
    {
      itemhtml = '';
      for (var i = 0, length = data.length; i < length; i++) {
        item = data[i]
        var start_time_h = item.start_time.slice(11, 13)
        var item_h = parseInt(start_time_h);
        if (parseInt(start_time_h.indexOf(0)) == 0) {
           var item_h = parseInt(start_time_h.indexOf(1))
        }
        itemhtml += '<a rel="nofollow" href="'+item.click_url+'" target="_blank" title="'+item.title+'">'
        itemhtml += '<div class="col-xs-4 item"><div class="row"><div class="col-xs-6 img-box"><img src="'+item.pic_url+'"></div>'
        itemhtml += '<div class="col-xs-6 content"><h3>'+item.title+'</h3><div class="middle">'
        itemhtml += '<div class="pull-left price"><div class="ori">￥'+item.reserve_price+'</div>'
        itemhtml += '<div class="now"><span class="prefix">￥</span>'+item.zk_final_price+'</div>'
        itemhtml += '</div><div class="pull-right link">'
        if (item_h > now_hour) {
            itemhtml += '<button class="btn btn-info">即将开始</button>'
        } else {
            itemhtml += '<button class="btn btn-danger">马上抢</button>'
        }
        itemhtml += '</div></div>'
        if (item_h > now_hour) {
            var start_time = item.start_time.slice(5, 16)
            itemhtml +=     '<div class="bottom"><div class="data"><span class="text-success">'+start_time+'准时开始</span></div></div>'
        }else{
            itemhtml +=     '<div class="bottom"><div class="data">'
            sold_num = parseInt(item.sold_num)
            total_amount = parseInt(item.total_amount)
            num = Math.round(sold_num*100/total_amount)
            itemhtml +=     '<div class="pull-left">已抢购'+num+'%</div><div class="pull-right">已抢'+item.sold_num+'件</div></div><div class="line"><div class="progress">'
            if(num < 25){
                itemhtml +=     '<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="'+item.sold_num+'" aria-valuemin="0" aria-valuemax="'+item.total_amount+'" style="width: '+num+'%"></div>'
            }
            if(num< 50 && num >= 25){
                itemhtml +=     '<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="'+item.sold_num+'" aria-valuemin="0" aria-valuemax="'+item.total_amount+'" style="width: '+num+'%"></div>'
            }
            if(num < 75 && num >= 50){
                itemhtml +=     '<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="'+item.sold_num+'" aria-valuemin="0" aria-valuemax="'+item.total_amount+'" style="width: '+num+'%"></div>'
            }
            if(num >= 75){
                itemhtml +=     '<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="'+item.sold_num+'" aria-valuemin="0" aria-valuemax="'+item.total_amount+'" style="width: '+num+'%"></div>'
            }
            itemhtml +=     '</div></div></div>'
        }
        itemhtml += '</div></div></div></a>'
      }
      var target = '.tqg-item .item'+index+' .tqg-bottom'
      $(target).append(itemhtml);
    }
    </script>
@stop
