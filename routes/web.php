<?php

// 用户默认的用户注册登录路由
Auth::routes();
Route::get('/home', 'Home\HomeController@index')->name('home');

// 管理员后台登录
Route::prefix('admin')->group(function() {
	Route::get('login', 'Admin\LoginController@login')->name('admin.login');
  Route::post('login', 'Admin\LoginController@doLogin')->name('admin.dologin');
  Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
  Route::get('dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
  Route::get('changepassword', 'Admin\UserController@changePassword')->name('admin.changePassword');
  Route::post('changepassword', 'Admin\UserController@doChangePassword')->name('admin.doChangePassword');
  Route::resource('goodsCategorys', 'Admin\GoodsCategoryController');
  Route::get('couponRules/{id}', 'Admin\CouponRulesController@show')->name('admin.couponRule.show');
  Route::get('couponRules/{id}/edit', 'Admin\CouponRulesController@edit')->name('admin.couponRule.edit');
  Route::post('couponRules/', 'Admin\CouponRulesController@store')->name('admin.couponRule.store');
  Route::get('couponRules/{id}/create', 'Admin\CouponRulesController@create')->name('admin.couponRule.create');
  Route::post('couponRules/{id}/update', 'Admin\CouponRulesController@update')->name('admin.couponRule.update');
});

Route::get('/', 'Index\WX\IndexController@index')->name('wx.index');
Route::get('/{id}{sort?}', 'Index\WX\IndexController@categoryOne')->name('goodsCategorys.categoryOne')->where('id', '[0-9]+');
Route::get('/sub{id}{sort?}', 'Index\WX\IndexController@categoryTwo')->name('goodsCategorys.categoryTwo')->where('id', '[0-9]+');
Route::get('/son{id}{sort?}', 'Index\WX\IndexController@categorySon')->name('goodsCategorys.categorySon')->where('id', '[0-9]+');
Route::get('/agc', 'Index\WX\AllGoodsCategoryController@index')->name('wx.allGoodsCategory.index');
Route::get('/search', 'Index\WX\SearchController@index')->name('wx.search.index');
Route::get('/search/all/', 'Index\WX\SearchController@all')->name('wx.search.all');
Route::get('/search/tmall/', 'Index\WX\SearchController@tmall')->name('wx.search.tmall');
Route::get('/search/ju/', 'Index\WX\SearchController@ju')->name('wx.search.ju');
Route::get('/search/tpwd/', 'Index\WX\SearchController@tpwd')->name('wx.search.tpwd');
Route::get('/taoqianggou', 'Index\WX\TaoQiangGouController@index')->name('wx.taoqianggou.index');
Route::get('/item/{id?}', 'Index\WX\ItemInfoController@item')->name('wx.itemInfo.item')->where('id', '[0-9]+');
Route::get('/iteminfo/{id?}', 'Index\WX\ItemInfoController@iteminfo')->name('wx.itemInfo.iteminfo')->where('id', '[0-9]+');
// Route::get('/couponInfo/{id?}', 'Index\WX\ItemInfoController@couponIndex')->name('wx.itemInfo.index.coupon')->where('id', '[0-9]+');
// Route::get('/itemInfo/{id?}', 'Index\WX\ItemInfoController@itemIndex')->name('wx.itemInfo.index.material')->where('id', '[0-9]+');
Route::get('/couponaction/{id}', 'Index\WX\CouponActionController@index')->name('wx.CouponAction.index')->where('id', '[0-9]+');
Route::get('/shareitem/{id}', 'Index\WX\ShareItemController@coupon')->name('wx.ShareItem.coupon')->where('id', '[0-9]+');
Route::get('/coupon/image/{id}', 'Index\WX\ImageController@couponShareImage')->name('wx.image.couponShareImage')->where('id', '[0-9]+');
Route::get('/url/der/tqg', 'Index\WX\WebJumpController@tqg')->name('wx.webJump.tqg');
Route::get('/url/der/tqg/e/', 'Index\WX\WebJumpController@tqgForJs')->name('wx.webJump.tqgForJs');
Route::get('/url/der/ju', 'Index\WX\WebJumpController@ju')->name('wx.webJump.ju');
Route::get('/url/der/ju/js', 'Index\WX\WebJumpController@juForJs')->name('wx.webJump.juForJs');
Route::get('/zhibo-{id}', 'Index\WX\OptimusMaterialController@zhibo')->name('wx.optimusMaterial.zhibo')->where('id', '[0-9]+');
Route::get('/brand-{id}', 'Index\WX\OptimusMaterialController@brand')->name('wx.optimusMaterial.brand')->where('id', '[0-9]+');
Route::get('/baby-{id}', 'Index\WX\OptimusMaterialController@baby')->name('wx.optimusMaterial.baby')->where('id', '[0-9]+');
Route::get('/pintuan', 'Index\WX\OptimusMaterialController@pintuan')->name('wx.optimusMaterial.pintuan');
Route::get('/sales', 'Index\WX\OptimusMaterialController@sales')->name('wx.optimusMaterial.sales');
Route::get('/fashion', 'Index\WX\OptimusMaterialController@fashion')->name('wx.optimusMaterial.fashion');
Route::get('/recommend', 'Index\WX\OptimusMaterialController@recommend')->name('wx.optimusMaterial.recommend');

Route::prefix('api/alimama')->group(function() {
	Route::post('taobaoTbkDgItemCouponGet', 'Api\AlimamaController@taobaoTbkDgItemCouponGet')->name('api.alimama.taobaoTbkDgItemCouponGet');
	Route::post('taobaoTbkDgMaterialOptional', 'Api\AlimamaController@taobaoTbkDgMaterialOptional')->name('api.alimama.taobaoTbkDgMaterialOptional');
	Route::post('taobaoJuItemsSearch', 'Api\AlimamaController@taobaoJuItemsSearch')->name('api.alimama.taobaoJuItemsSearch');
	Route::post('taobaoTbkJuTqgGet', 'Api\AlimamaController@taobaoTbkJuTqgGet')->name('api.alimama.taobaoTbkJuTqgGet');
	Route::post('taobaoTbkDgOptimusMaterial', 'Api\AlimamaController@taobaoTbkDgOptimusMaterial')->name('api.alimama.taobaoTbkDgOptimusMaterial');
});
Route::prefix('api/item')->group(function() {
	Route::post('itemimages/{id?}', 'Api\ItemInfoImagesController@itemDetailImage')->name('api.itemInfoImages.itemDetailImage')->where('id', '[0-9]+');
});
