<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use Longbeidou\Taobaoke\Contracts\Contract;
use App\Traits\CouponRelated;

/**
 * 阿里妈妈淘宝客api实现
 */
class AlimamaRepository implements AlimamaRepositoryInterface
{
  use CouponRelated;

  public $alimamaSdk;

  public function __construct(Contract $api)
  {
    $this->alimamaSdk = $api;
  }

  // 好券清单api
  public function taobaoTbkDgItemCouponGet(Array $para)
  {
    $result = $this->alimamaSdk->taobaoTbkDgItemCouponGet($para);

    if (empty($result->results)) {
      return false;
    }

    if ($para['page_size'] != '100' && count($result->results->tbk_coupon) == 100) {
      return false;
    }

    if ($para['page_size'] == '100' && !empty($para['q']) && !empty($para['page_no']) && $para['page_no'] != '1') {
      return false;
    }

    return $result->results->tbk_coupon;
  }
}
