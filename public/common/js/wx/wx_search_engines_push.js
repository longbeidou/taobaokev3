// 百度自动推送
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();

// 好搜自动推送
(function(){
var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?48187882efd1652ccc26f13f9b4990f7":"https://jspassport.ssl.qhimg.com/11.0.1.js?48187882efd1652ccc26f13f9b4990f7";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
