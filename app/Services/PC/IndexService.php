<?php

namespace App\Services\PC;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Repositories\Contracts\GoodsCategoryInterface;
use App\Services\WX\IndexService as WXIndexService;
use App\Services\WX\AllGoodsCategoryService;

class IndexService extends WXIndexService
{
    public $alimamaRepository;
    public $goodsCategory;
    public $allGoodsCategory;

    public function __construct(
      AlimamaRepositoryInterface $alimama,
      GoodsCategoryInterface $goodsCategory,
      AllGoodsCategoryService $allGoodsCategory
    ){
      $this->alimamaRepository = $alimama;
      $this->goodsCategory = $goodsCategory;
      $this->allGoodsCategory = $allGoodsCategory;
    }

    // 推荐的优惠券
    public function recommendCoupons($para)
    {
        $couponItems = $this->alimamaRepository->taobaoTbkDgItemCouponGet($para);

        return $couponItems;
    }

    // 获取商品分类的2级导航
    public function subCategory($leftTopCategory)
    {
        return $this->allGoodsCategory->subCategory($leftTopCategory);
    }

    // 获取商品三级分类的导航
    public function sonCategory($subCategory)
    {
        return $this->allGoodsCategory->sonCategory($subCategory);
    }
}
