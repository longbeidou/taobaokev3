<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Repositories\Contracts\GoodsCategoryInterface;

class IndexService
{
  public $alimamaRepository;
  public $goodsCategory;

  function __construct(AlimamaRepositoryInterface $alimama, GoodsCategoryInterface $goodsCategory)
  {
    $this->alimamaRepository = $alimama;
    $this->goodsCategory = $goodsCategory;
  }

  // 获取收益优惠券的信息
  public function topGoodsCategoryCouponItems($para)
  {
    $couponItems = $this->alimamaRepository->taobaoTbkDgItemCouponGet($para);

    return $couponItems;
  }

  // 获取顶级分类的信息
  public function topGoodsCategory($para = [])
  {
    return $this->goodsCategory->topCategory($para);
  }

  // 获取商品分类的子分类
  public function subGoodsCategory($id, $para)
  {
    return $this->goodsCategory->subCategory($id, $para);
  }

  // 当前id的商品分离信息
  public function currentCategoryInfo($id)
  {
    return $this->goodsCategory->getInfoById($id);
  }

  // 获取当前的商品分类获取优惠券的规则参数
  public function currentCouponGetRule($id)
  {
    return $this->goodsCategory->getRuleById($id);
  }

  // 获取子商品分类的优惠券信息
  public function subGoodsCategoryCouponItems($para, $sort)
  {
    if (empty($para)) {
      return [];
    }

    $para = $para->toArray();

    switch ($sort) {
      case 'price':
        $para['sort'] = 'price_asc';
        break;

      case 'sales':
        $para['sort'] = 'total_sales_des';
        break;

      case 'commi':
        $para['sort'] = 'tk_total_commi_des';
        break;
    }

    $result = $this->alimamaRepository->taobaoTbkDgMaterialOptional($para);

    if ($result == false) {
      return [];
    }

    return $result;
  }

  // 返回title
  public function title($sort, $goodsCategoryName)
  {
    if (empty($sort)) {
      return $goodsCategoryName.'优惠券';
    }

    switch ($sort) {
      case 'price':
        return '低价淘宝优惠券 - '.$goodsCategoryName.'优惠券';
        break;

      case 'sales':
        return '热销淘宝优惠券 - '.$goodsCategoryName.'优惠券';
        break;

      case 'commi':
        return '最热淘宝优惠券 - '.$goodsCategoryName.'优惠券';
        break;

      default:
        return $goodsCategoryName.'优惠券';
        break;
    }
  }

  // 获取ajax请求通用搜素api的参数
  public function getAjaxPara($goodsCategoryInfo, $sort)
  {
    if (empty($goodsCategoryInfo->dgMaterialOptionalRule)) {
      return [];
    }

    $paraArr = $goodsCategoryInfo->dgMaterialOptionalRule->toArray();

    foreach ($paraArr as $field => $value) {
      if (empty($value) || $field == 'sort' || $field == 'created_at' || $field == 'updated_at') {
        unset($paraArr[$field]);
      }
    }

    switch ($sort) {
      case 'price':
        $paraArr['sort'] = 'price_asc';
        break;

      case 'sales':
        $paraArr['sort'] = 'total_sales_des';
        break;

      case 'commi':
        $paraArr['sort'] = 'tk_total_commi_des';
        break;
    }

    $paraArr['page_no'] = '1';

    return $paraArr;
  }
}
