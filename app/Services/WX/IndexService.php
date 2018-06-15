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
  public function couponItems($para)
  {
    $couponItems = $this->alimamaRepository->taobaoTbkDgItemCouponGet($para);

    return $couponItems;
  }

  // 获取顶级分类的信息
  public function topCategory($para = [])
  {
    return $this->goodsCategory->topCategory($para);
  }
}
