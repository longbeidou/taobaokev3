<?php

namespace Longbeidou\Taobaoke\Libraries;

use Longbeidou\Taobaoke\Libraries\Base;
use Longbeidou\Taobaoke\SDK\top\request\TbkItemGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkItemRecommendGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkItemInfoGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkShopGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkShopRecommendGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkUatmEventGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkUatmEventItemGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkUatmFavoritesItemGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkUatmFavoritesGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkJuTqgGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkSpreadGetRequest;
use Longbeidou\Taobaoke\SDK\top\domain\TbkSpreadRequest;
use Longbeidou\Taobaoke\SDK\top\request\JuItemsSearchRequest;
use Longbeidou\Taobaoke\SDK\top\domain\TopItemQuery;
use Longbeidou\Taobaoke\SDK\top\request\TbkDgItemCouponGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkCouponGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkTpwdCreateRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkDgNewuserOrderGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkScNewuserOrderGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkScMaterialOptionalRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkDgMaterialOptionalRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkDgNewuserOrderSumRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkScNewuserOrderSumRequest;
use Longbeidou\Taobaoke\SDK\top\request\WirelessShareTpwdCreateRequest;
use Longbeidou\Taobaoke\SDK\top\domain\GenPwdIsvParamDto;
use Longbeidou\Taobaoke\SDK\top\request\WirelessShareTpwdQueryRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkContentGetRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkDgOptimusMaterialRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkScOptimusMaterialRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkCouponConvertRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkItemConvertRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkShopConvertRequest;
use Longbeidou\Taobaoke\SDK\top\request\TbkTpwdConvertRequest;

class Library extends Base
{
	// 淘宝客基础API
	/**
	* 淘宝客商品查询
	*/
	public function taobaoTbkItemGet(Array $datas)
	{
		$standard = ['q', 'cat', 'itemloc', 'sort', 'is_tmall', 'is_overseas', 'start_price', 'end_price', 'start_tk_rate', 'end_tk_rate', 'platform', 'page_no', 'page_size'];
		$req = new TbkItemGetRequest;
		$req->setFields('num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客商品关联推荐查询
	*/
	public function taobaoTbkItemRecommendGet(Array $datas)
	{
		$standard = ['num_iid', 'count', 'platform'];
		$req = new TbkItemRecommendGetRequest;
		$req->setFields('num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,nick,seller_id,volume');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客商品详情（简版）
	*/
	public function taobaoTbkItemInfoGet(Array $datas)
	{
		$standard = ['platform', 'num_iids'];
		$req = new TbkItemInfoGetRequest;
		// $req->setFields('num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,nick,seller_id,volume,cat_leaf_name,cat_name');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客店铺查询
	*/
	public function taobaoTbkShopGet(Array $datas)
	{
		$standard = ['q', 'sort', 'is_tmall', 'start_credit', 'end_credit', 'start_commission_rate', 'end_commission_rate', 'start_total_action', 'end_total_action', 'start_auction_count', 'end_auction_count', 'platform', 'page_no', 'page_size'];
		$req = new TbkShopGetRequest;
		$req->setFields('user_id,shop_title,shop_type,seller_nick,pict_url,shop_url');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客店铺关联推荐查询
	*/
	public function taobaoTbkShopRecommendGet(Array $datas)
	{
		$standard = ['user_id', 'count', 'platform'];
		$req = new TbkShopRecommendGetRequest;
		$req->setFields('user_id,shop_title,shop_type,seller_nick,pict_url,shop_url');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 枚举正在进行中的定向招商的活动列表
	*/
	public function taobaoTbkUatmEventGet(Array $datas)
	{
		$standard = ['page_no', 'page_size'];
		$req = new TbkUatmEventGetRequest;
		$req->setFields('event_id,event_title,start_time,end_time');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 获取淘宝联盟定向招商的宝贝信息
	*/
	public function taobaoTbkUatmEventItemGet(Array $datas)
	{
		$standard = ['platform', 'page_size', 'adzone_id', 'unid', 'event_id', 'page_no'];
		$req = new TbkUatmEventItemGetRequest;
		$req->setFields('num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,click_url,nick,seller_id,volume, shop_title, zk_final_price_wap,event_start_time,event_end_time,tk_rate,type,status');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 获取淘宝联盟选品库的宝贝信息
	*/
	public function taobaotbkUatmFavoritesItemGet(Array $datas)
	{
		$standard = ['platform', 'page_size', 'adzone_id', 'unid', 'favorites_id', 'page_no'];
		$req = new TbkUatmFavoritesItemGetRequest;
		$req->setFields('num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,click_url,seller_id,volume,category,coupon_click_url,coupon_end_time,coupon_info,coupon_start_time,coupon_total_count,coupon_remain_count,nick,shop_title,zk_final_price_wap,event_start_time,event_end_time,tk_rate,status,type');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 获取淘宝联盟选品库列表
	*/
	public function taobaoTbkUatmFavoritesGet(Array $datas)
	{
		$standard = ['page_no', 'page_size', 'type'];
		$req = new TbkUatmFavoritesGetRequest;
		$req->setFields('favorites_title,favorites_id,type');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘抢购api
	*/
	public function taobaoTbkJuTqgGet(Array $datas)
	{
		$standard = ['adzone_id', 'start_time', 'end_time', 'page_no', 'page_size'];
		$req = new TbkJuTqgGetRequest;
		$req->setFields('click_url,pic_url,reserve_price,zk_final_price,total_amount,sold_num,title,category_name,start_time,end_time,num_iid');
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 物料传播方式获取
	*/
	public function taobaoTbkSpreadGet(String $url)
	{
		$req = new TbkSpreadGetRequest;
		$requests = new TbkSpreadRequest;
		$requests->url=$url;
		$req->setRequests(json_encode($requests));

		return $this->c->execute($req);
	}

	/**
	* 聚划算商品搜索接口
	*/
	public function taobaoJuItemsSearch(Array $datas)
	{
		$standard = ['current_page', 'page_size', 'pid', 'postage', 'status', 'taobao_category_id', 'word'];
		$req = new JuItemsSearchRequest;
		$param_top_item_query = new TopItemQuery;
		$param_top_item_query = $this->setOptions->toOptions($req, $datas, $standard);
		$req->setParamTopItemQuery(json_encode($param_top_item_query));

		return $this->c->execute($req);
	}

	/**
	* 好券清单API【导购】
	*/
	public function taobaoTbkDgItemCouponGet(Array $datas)
	{
		$standard = ['adzone_id', 'platform', 'cat', 'page_size', 'q', 'page_no'];
		$req = new TbkDgItemCouponGetRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 阿里妈妈推广券信息查询
	*/
	public function taobaoTbkCouponGet(Array $datas)
	{
		$req = new TbkCouponGetRequest;
		if (!empty($datas['me'])) {
			$req->setMe($datas['me']);
		} else {
			$req->setItemId($datas['item_id']);
			$req->setActivityId($datas['activity_id']);
		}

		return $this->c->execute($req);
	}

	/**
	* 淘宝客淘口令
	*/
	public function taobaoTbkTpwdCreate(Array $datas)
	{
		$standard = ['user_id', 'text', 'url', 'logo', 'ext'];
		$req = new TbkTpwdCreateRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客新用户订单API--导购
	*/
	public function taobaoTbkDgNewuserOrderGet(Array $datas)
	{
		$standard = ['page_size', 'adzone_id', 'page_no', 'start_time', 'end_time', 'activity_id'];
		$req = new TbkDgNewuserOrderGetRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客新用户订单API--社交
	*/
	public function taobaoTbkScNewuserOrderGet(Array $datas)
	{
		$standard = ['page_size', 'adzone_id', 'page_no', 'site_id', 'start_time', 'end_time', 'activity_id'];
		$req = new TbkScNewuserOrderGetRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 通用物料搜索API
	*/
	public function taobaoTbkScMaterialOptional(Array $datas)
	{
		$standard = ['start_dsr', 'page_size', 'page_no', 'platform', 'end_tk_rate', 'start_tk_rate', 'end_price', 'start_price', 'is_overseas', 'is_tmall', 'sort', 'itemloc', 'cat', 'q', 'adzone_id', 'site_id', 'has_coupon', 'ip', 'include_rfd_rate', 'include_good_rate', 'include_pay_rate_30', 'need_prepay', 'need_free_shipment', 'npx_level'];
		$req = new TbkScMaterialOptionalRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 通用物料搜索API（导购）
	*/
	public function taobaoTbkDgMaterialOptional(Array $datas)
	{
		$standard = ['start_dsr', 'page_size', 'page_no', 'platform', 'end_tk_rate', 'start_tk_rate', 'end_price', 'start_price', 'is_overseas', 'is_tmall', 'sort', 'itemloc', 'cat', 'q', 'adzone_id', 'has_coupon', 'ip', 'include_rfd_rate', 'include_good_rate', 'include_pay_rate_30', 'need_prepay', 'need_free_shipment', 'npx_level'];
		$req = new TbkDgMaterialOptionalRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 拉新活动汇总API--导购
	*/
	public function taobaoTbkDgNewuserOrderSum(Array $datas)
	{
		$standard = ['page_size', 'adzone_id', 'page_no', 'site_id', 'activity_id'];
		$req = new TbkDgNewuserOrderSumRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 拉新活动汇总API--社交
	*/
	public function taobaoTbkScNewuserOrderSum(Array $datas)
	{
		$standard = ['page_size', 'adzone_id', 'page_no', 'site_id', 'activity_id'];
		$req = new TbkScNewuserOrderSumRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	// 淘口令基础包
	/**
	* 生成淘口令
	*/
	public function taobaoWirelessShareTpwdCreate(Array $datas)
	{
		$standard = ['user_id', 'text', 'url', 'logo', 'ext'];
		$req = new WirelessShareTpwdCreateRequest;
		$tpwd_param = new GenPwdIsvParamDto;
		$tpwd_param = $this->setOptions->toOptions($tpwd_param, $datas, $standard);
		$req->setTpwdParam(json_encode($tpwd_param));

		return $this->c->execute($req);
	}

	/**
	* 查询解析淘口令
	*/
	public function taobaoWirelessShareTpwdQuery(String $tpwd)
	{
		$req = new WirelessShareTpwdQueryRequest;
		$req->setPasswordContent($tpwd);

		return $this->c->execute($req);
	}

	// 淘宝客-工具-超级搜索    注：已经存在
	/**
	* 通用物料搜索API
	*/
	// public function taobaoTbkScMaterialOptional(Array $datas)
	// {
	// 	$standard = [];
	// 	$req = new TbkScMaterialOptionalRequest;
	// 	$req = $this->setOptions->options($req, $datas, $standard);

	// 	return $this->c->execute($req);
	// }

	/**
	* 淘客媒体内容输出
	*/
	public function taobaoTbkContentGet(Array $datas)
	{
		$standard = ['adzone_id', 'type', 'before_timestamp', 'count', 'cid', 'image_width', 'image_height', 'content_set'];
		$req = new TbkContentGetRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客擎天柱通用物料API
	*/
	public function taobaoTbkDgOptimusMaterial(Array $datas)
	{
		$standard = ['adzone_id', 'page_size', 'page_no', 'material_id'];
		$req = new TbkDgOptimusMaterialRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客擎天柱通用物料API
	*/
	public function taobaoTbkScOptimusMaterial(Array $datas)
	{
		$standard = ['adzone_id', 'page_size', 'page_no', 'material_id', 'site_id'];
		$req = new TbkScOptimusMaterialRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	// 淘宝客-媒体-单品券高效转链包
	/**
	* 【导购】链接转换
	*/
	public function taobaoTbkCouponConvert(Array $datas)
	{
		$standard = ['item_id', 'adzone_id', 'platform', 'me'];
		$req = new TbkCouponConvertRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	// 淘宝客链接API
	/**
	* 淘宝客商品链接转换
	*/
	public function taobaoTbkItemConvert(Array $datas)
	{
		$standard = ['num_iids', 'adzone_id', 'platform', 'unid', 'dx'];
		$req = new TbkItemConvertRequest;
		$req->setFields("num_iid,click_url");
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘宝客店铺链接转换
	*/
	public function taobaoTbkShopConvert(Array $datas)
	{
		$standard = ['user_ids', 'platform', 'adzone_id', 'unid'];
		$req = new TbkShopConvertRequest;
		$req->setFields("user_id,click_url");
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}

	/**
	* 淘口令转链
	*/
	public function taobaoTbkTpwdConvert(Array $datas)
	{
		$standard = ['password_content', 'adzone_id', 'dx'];
		$req = new TbkTpwdConvertRequest;
		$req = $this->setOptions->options($req, $datas, $standard);

		return $this->c->execute($req);
	}
}
