<?php

namespace App\Services\PC;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Repositories\Contracts\GoodsCategoryInterface;

class IndexService
{
    public $alimamaRepository;
    public $goodsCategory;

    public function __construct(AlimamaRepositoryInterface $alimama, GoodsCategoryInterface $goodsCategory)
    {
      $this->alimamaRepository = $alimama;
      $this->goodsCategory = $goodsCategory;
    }

    // 推荐的优惠券
    public function recommendCoupons($para)
    {
        $couponItems = $this->alimamaRepository->taobaoTbkDgItemCouponGet($para);

        return $couponItems;
    }

    // 获取顶级分类的信息
    public function topGoodsCategory($para = [])
    {
      return $this->goodsCategory->topCategory($para);
    }

    // 获取商品分类的2级导航
    public function subCategory($leftTopCategory)
    {
      if (empty($leftTopCategory)) {
        return [];
      }

      $result = [];

      foreach ($leftTopCategory as $key => $category) {
        $result[$key]['subCategoryList'] = $this->goodsCategory->subCategory($category->id, ['is_shown'=>1]);
        $result[$key]['topCategoryInfo'] = $category;
      }

      return $result;
    }

    // 获取商品三级分类的导航
    public function sonCategory($subCategory)
    {
      if (empty($subCategory)) {
        return [];
      }

      $result = [];

      foreach ($subCategory as $topKey => $topInfoArr) {
        foreach ($topInfoArr['subCategoryList'] as $subkey => $subInfo) {
          $result[$topKey]['topCategoryInfo'] = $topInfoArr['topCategoryInfo'];
          $result[$topKey]['subList'][$subkey]['subCategoryInfo'] = $subInfo;
          $result[$topKey]['subList'][$subkey]['sonList'] = $this->goodsCategory->subCategory($subInfo->id, ['is_shown'=>1]);
         }
      }

      return $result;
    }
}
