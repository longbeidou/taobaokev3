<?php

return [
	// 无线端聚划算搜索的pid
	'wx_ju_search_pid' => 'mm_' . env('PID_USER') . '_' . env('PID_SITE') . '_' . env('ZID_WX_S_GROUP'),

	// 无线端全部搜索的adzone_id
	'wx_search_all_adzone_id' => env('ZID_WX_S_ALL'),

	// 无线端 只针对天猫的搜索
	'wx_search_tmall_adzone_id' => env('ZID_WX_S_TMALL'),

	// 无线端 淘口令 搜索
	'wx_search_tpwd' => env('ZID_WX_STPWD'),

	// 无线端首页coupon api获取的商品
	'wx_index_coupon_adzone_id' => env('ZID_WX_INDEX'),

	// 无线端猜你喜欢 coupon api获取的商品
	'wx_coupon_guess_you_like' => env('ZID_WX_GUESS'),

	// 无线端猜你喜欢 聚划算拼团  api获取的商品
	'wx_coupon_guess_you_like_pintuan' => env('ZID_WX_GUESS_GROUP'),

	// 无线端淘抢购
	'wx_tqg' => env('ZID_WX_TQG'),

	// PC端首页coupon api获取的商品
	'pc_index_coupon_adzone_id' => env('ZID_PC_INDEX'),

	// PC端商品列表页猜你喜欢
	'pc_coupon_guess_you_like' => env('ZID_PC_GUESS'),

	// PC端聚划算搜索的pid
	'pc_ju_search_pid' => 'mm_' . env('PID_USER') . '_' . env('PID_SITE') . '_' . env('ZID_PC_S_GROUP'),

	// PC端全部搜索的adzone_id
	'pc_search_all_adzone_id' => env('ZID_PC_S_ALL'),

	// PC端 只针对天猫的搜索
	'pc_search_tmall_adzone_id' => env('ZID_PC_S_TMALL'),

	// PC端淘口令 搜索
	'pc_search_tpwd' => env('ZID_PC_S_TPWD'),
];
