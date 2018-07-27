<?php

return [

	// 网站名称
	'name' => '龙琴时代优惠券网',

	// 网站首页的title内容
	'indexTitle' => '淘宝内部优惠券|天猫超市优惠券|淘宝优惠券领取-龙琴时代优惠券购物网站',

	// 首页的keywords内容
	'keywords' => '淘宝内部优惠券,天猫超市优惠券,淘宝内部优惠券领取,淘宝优惠券网站,天猫优惠券网站',

	// 首页描述
	'description' => '龙琴时代优惠券网是一个专业的淘宝天猫优惠券分享网站,免费提供淘宝优惠券、天猫优惠券、内部优惠券、天猫超市优惠券、京东优惠券、拼多多优惠券等.淘宝天猫优惠券领取上龙琴时代网!',

	// 网站的域名
	'domain' => 'www.52010000.cn',

	// 公司名称或组织名称
	'company_name' => '四川龙琴科技有限公司',

	// 网站的备案号
	'domain_beian' => '蜀ICP备15010745号-18',

	// 联系客服的二维码图片 200*200px
	'kefu_ercode' => '/pcstyle/images/kefu.png',

	// 领取优惠券的页面，链接可以展示的客户端
	'show_client' => ['pc', 'wx', 'qq'],

	// 无线端淘抢购的时间节点
	'wx_tqg_hour' => ['00', '08', '10', '13', '15', '17', '19', '21', '23'],

	// 网站专用的fonticon地址
	// 'font_icon_src' => '//at.alicdn.com/t/font_581943_b2zuivwy5g8bmx6r.css',
	'font_icon_src' => '/css/selfIcon/iconfont.css',

	// 网站统计代码-无线端
	'analysis_js_wx' => env('ANALYSIS_JS_WX'),

	// 网站统计代码-PC端
	'analysis_js_app' => env('ANALYSIS_JS_APP'),

	// 网站统计代码-PC端
	'analysis_js_pc' => env('ANALYSIS_JS_PC'),

	// 无线端搜素引擎自动推送
	'wx_search_engines_push_js' => '<script src="/common/js/wx/wx_search_engines_push.js" language="JavaScript"></script>',
];
