<?php

namespace App\Services\PC;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Repositories\Contracts\GoodsCategoryInterface;
use App\Services\WX\IndexService as WXIndexService;
use App\Services\WX\AllGoodsCategoryService;
use App\Services\Share\GuessYouLikeService;

class IndexService extends WXIndexService
{
    public $alimamaRepository;
    public $goodsCategory;
    public $allGoodsCategory;
    public $guessYouLike;

    public function __construct(
      AlimamaRepositoryInterface $alimama,
      GoodsCategoryInterface $goodsCategory,
      AllGoodsCategoryService $allGoodsCategory,
      GuessYouLikeService $guessYouLike
    ){
      $this->alimamaRepository = $alimama;
      $this->goodsCategory = $goodsCategory;
      $this->allGoodsCategory = $allGoodsCategory;
      $this->guessYouLike = $guessYouLike;
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

    // 获取猜你喜欢的优惠券数量
    public function guessYouLike($adzonId, $num)
    {
      return $this->guessYouLike->coupons($adzonId, $num);
    }
}
