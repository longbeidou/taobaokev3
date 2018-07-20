// 商品子分类导航的显示与隐藏
$('#banner-box .category ul li').bind('mouseover', function() {
    $('#banner-box .content-box .subCategory-box').css('display', 'block');
    no = '#'+this.getAttribute('no');
    m = $(no).css('display', 'block');
    $('#banner-box .content-box .subCategory-box').attr('no', no);
});
$('#banner-box .category ul li').bind('mouseout', function() {
    $('#banner-box .content-box .subCategory-box').css('display', 'none');
    no = '#'+this.getAttribute('no');
    m = $(no).css('display', 'none');
});
$('#banner-box .content-box .subCategory-box').bind('mouseover', function() {
    $('#banner-box .content-box .subCategory-box').css('display', 'block');
    no = this.getAttribute('no');
    $(no).css('display', 'block');
});
$('#banner-box .content-box .subCategory-box').bind('mouseout', function() {
    $('#banner-box .content-box .subCategory-box').css('display', 'none');
    no = this.getAttribute('no');
    $(no).css('display', 'none');
});

// 商品详情页传参使用
$('.coupon-list a[no^="data"]').bind('click', function(event) {
    no = this.getAttribute('no');
    para = document.getElementById(no).getAttribute('para');
    // document.location.href = this.href+'?'+para;
    window.open(this.href+'?'+para);
    //IE和Chrome下是window.event 火狐下是event
    event = event || window.event;
    if(event.preventDefault){
      event.preventDefault();
    }else{
      event.returnValue = false;
    }
    return false;
});

// 图片懒加载使用
$(function() {
    $("img.lazy").lazyload({
        effect: "fadeIn",
        threshold: 200,
        failure_limit : 20,
        skip_invisible : false,
        placeholder: "/pcstyle/images/loading.gif"
    });
  });

// 监听页面滚动的高度，确定抢购时间是否选择固定
$(window).scroll(function() {
    if ($(window).scrollTop() > 139) {
        $('.tqg-time').css('position', 'fixed')
        $('.tqg-time').css('top', '0px')
    } else {
        $('.tqg-time').css('position', 'absolute')
        $('.tqg-time').css('top', '139px')
    }
});
