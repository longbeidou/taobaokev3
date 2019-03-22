<?php

return [

	// 网站名称
	'name' => env('SITE_NAME'),

	// 网站首页的title内容
	'indexTitle' => env('SITE_TITLE'),

	// 首页的keywords内容
	'keywords' => env('SITE_KEYWORDS'),

	// 首页描述
	'description' => env('SITE_DESC'),

	// 网站的域名
	'domain' => env('SITE_DOMAIN'),

	// 公司名称或组织名称
	'company_name' => env('SITE_COMPANY_NAME'),

	// 网站的备案号
	'domain_beian' => env('SITE_BEIAN'),

	// 联系客服的二维码图片 200*200px
	'kefu_ercode' => '/storage/pc/images/kefu.png',

	// 领取优惠券的页面，链接可以展示的客户端
	'show_client' => ['pc', 'wx', 'qq'],

	// 无线端淘抢购的时间节点
	'wx_tqg_hour' => ['00', '08', '10', '13', '15', '17', '19', '21', '23'],

	// 网站专用的fonticon地址
	'font_icon_src' => '/storage/pc/css/iconfont.css',

	// 网站统计代码-无线端
	'analysis_js_wx' => env('ANALYSIS_JS_WX'),

	// 网站统计代码-PC端
	'analysis_js_app' => env('ANALYSIS_JS_APP'),

	// 网站统计代码-PC端
	'analysis_js_pc' => env('ANALYSIS_JS_PC'),

	// 无线端搜素引擎自动推送
	'wx_search_engines_push_js' => '<script src="/common/js/wx/wx_search_engines_push.js" language="JavaScript"></script>',
];
