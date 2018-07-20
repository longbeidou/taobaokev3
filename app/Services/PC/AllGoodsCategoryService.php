<?php

namespace App\Services\PC;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Repositories\Contracts\GoodsCategoryInterface;
use App\Services\WX\AllGoodsCategoryService as AllGoodsCategory;
use App\Services\Share\GuessYouLikeService;

class AllGoodsCategoryService extends AllGoodsCategory
{
  public $guessYouLike;
  public $alimamaRepository;
  public $goodsCategory;

  public function __construct(GuessYouLikeService $guessYouLike, AlimamaRepositoryInterface $alimama, GoodsCategoryInterface $goodsCategory)
  {
      $this->guessYouLike = $guessYouLike;
      $this->alimamaRepository = $alimama;
      $this->goodsCategory = $goodsCategory;
  }

  // 获取猜你喜欢的优惠券数量
  public function guessYouLike($adzonId, $num)
  {
    return $this->guessYouLike->coupons($adzonId, $num);
  }
}
