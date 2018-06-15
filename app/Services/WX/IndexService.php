<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;

class IndexService
{
  public $alimamaRepository;

  function __construct(AlimamaRepositoryInterface $alimama)
  {
    $this->alimamaRepository = $alimama;
  }

  // 获取收益优惠券的信息
  public function couponItems($para)
  {
    $couponItems = $this->alimamaRepository->taobaoTbkDgItemCouponGet($para);

    return $couponItems;
  }
}
