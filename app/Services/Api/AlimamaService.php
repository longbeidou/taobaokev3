<?php

namespace App\Services\Api;

use App\Repositories\Contracts\AlimamaRepositoryInterface;

class AlimamaService
{
  public $alimamaRepository;

  function __construct(AlimamaRepositoryInterface $alimama)
  {
    $this->alimamaRepository = $alimama;
  }

  // 获取收益优惠券的信息
  public function taobaoTbkDgItemCouponGet($para)
  {
    $couponItems = $this->alimamaRepository->taobaoTbkDgItemCouponGet($para);

    return $couponItems;
  }

  //
  public function taobaoTbkDgMaterialOptional($para)
  {
    $couponItems = $this->alimamaRepository->taobaoTbkDgMaterialOptional($para);

    return $couponItems;
  }
}
