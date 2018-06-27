<?php

namespace Longbeidou\Taobaoke\Contracts;

interface Contract
{
	// 淘宝客基础API
	/**
	* 淘宝客商品查询
	*/
	public function taobaoTbkItemGet(Array $datas);

	/**
	* 淘宝客商品查询
	*/
	public function taobaoTbkItemRecommendGet(Array $datas);

	/**
	* 淘宝客商品详情（简版）
	*/
	public function taobaoTbkItemInfoGet(Array $datas);

	/**
	* 淘宝客店铺查询
	*/
	public function taobaoTbkShopGet(Array $datas);

	/**
	* 淘宝客店铺关联推荐查询
	*/
	public function taobaoTbkShopRecommendGet(Array $datas);

	/**
	* 枚举正在进行中的定向招商的活动列表
	*/
	public function taobaoTbkUatmEventGet(Array $datas);

	/**
	* 获取淘宝联盟定向招商的宝贝信息
	*/
	public function taobaoTbkUatmEventItemGet(Array $datas);

	/**
	* 获取淘宝联盟选品库的宝贝信息
	*/
	public function taobaotbkUatmFavoritesItemGet(Array $datas);

	/**
	* 获取淘宝联盟选品库列表
	*/
	public function taobaoTbkUatmFavoritesGet(Array $datas);

	/**
	* 淘抢购api
	*/
	public function taobaoTbkJuTqgGet(Array $datas);

	/**
	* 物料传播方式获取
	*/
	public function taobaoTbkSpreadGet(String $url);

	/**
	* 聚划算商品搜索接口
	*/
	public function taobaoJuItemsSearch(Array $datas);

	/**
	* 好券清单API【导购】
	*/
	public function taobaoTbkDgItemCouponGet(Array $datas);

	/**
	* 阿里妈妈推广券信息查询
	*/
	public function taobaoTbkCouponGet(Array $datas);

	/**
	* 淘宝客淘口令
	*/
	public function taobaoTbkTpwdCreate(Array $datas);

	/**
	* 淘宝客新用户订单API--导购
	*/
	public function taobaoTbkDgNewuserOrderGet(Array $datas);

	/**
	* 淘宝客新用户订单API--社交
	*/
	public function taobaoTbkScNewuserOrderGet(Array $datas);

	/**
	* 通用物料搜索API
	*/
	public function taobaoTbkScMaterialOptional(Array $datas);

	/**
	* 通用物料搜索API（导购）
	*/
	public function taobaoTbkDgMaterialOptional(Array $datas);

	/**
	* 拉新活动汇总API--导购
	*/
	public function taobaoTbkDgNewuserOrderSum(Array $datas);

	/**
	* 拉新活动汇总API--社交
	*/
	public function taobaoTbkScNewuserOrderSum(Array $datas);

	// 淘口令基础包
	/**
	* 生成淘口令
	*/
	public function taobaoWirelessShareTpwdCreate(Array $datas);

	/**
	* 查询解析淘口令
	*/
	public function taobaoWirelessShareTpwdQuery(String $tpwd);

	// 淘宝客-工具-超级搜索    注：已经存在
	/**
	* 通用物料搜索API
	*/
	// public function taobaoTbkScMaterialOptional(Array $datas);

	/**
	* 淘客媒体内容输出
	*/
	public function taobaoTbkContentGet(Array $datas);

	/**
	* 淘宝客擎天柱通用物料API
	*/
	public function taobaoTbkDgOptimusMaterial(Array $datas);

	/**
	* 淘宝客擎天柱通用物料API
	*/
	public function taobaoTbkScOptimusMaterial(Array $datas);

	// 淘宝客-媒体-单品券高效转链包
	/**
	* 【导购】链接转换
	*/
	public function taobaoTbkCouponConvert(Array $datas);

	// 淘宝客链接API
	/**
	* 淘宝客商品链接转换
	*/
	public function taobaoTbkItemConvert(Array $datas);

	/**
	* 淘宝客店铺链接转换
	*/
	public function taobaoTbkShopConvert(Array $datas);

	/**
	* 淘口令转链
	*/
	public function taobaoTbkTpwdConvert(Array $datas);
}
