<?php

return [
	'appkey' => '',
	'secretKey' => '',
	// 返回数据的格式，分为json和xml两种
	'format' => 'json',
	// 淘口令的选项如果存在则按照选项的值来生成，否则将会被替换为商品信息
	'tpwd' => [
		'logo' => '',
		'text' => '',
		'user_id' => ''
	],
	// 完全按照下面的标准生成淘口令
	'tpwd_only' => [
		'logo' => '', // 如果启用，则此项必填
		'text' => '', // 如果启用，则此项必填
		'user_id' => ''
	],
	'advanced_permissions' => [ // 是否开启高级权限
		'taobao_tbk_coupon_convert' => false, // 	【导购】链接转换 true表示开启
		'taobao_tbk_item_convert' => false, // 淘宝客商品链接转换 true表示开启
		'taobao_tbk_shop_convert' => false, // 淘宝客店铺链接转换 true表示开启
		'taobao_tbk_tpwd_convert' => false  // 淘口令转链 true表示开启
	]
];
