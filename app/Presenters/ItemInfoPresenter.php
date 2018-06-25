<?php

namespace App\Presenters;

use App\Services\GoodsCategoryService;

class ItemInfoPresenter
{
  // 将店铺的类型设置为文字显示
  public function makeUserTypeToText($userType)
  {
    $userType == 1 ? $str = '天猫店' : $str = '淘宝店';

    return $str;
  }

  // 拼接优惠券的参数
  public function concatCouponLinkPara($paraArr)
  {
    $linkStr = '?';
    $paraArrNew = [];

    foreach ($paraArr as $para => $value) {
      $paraArrNew[] = $para.'='.$value;
    }

    return $linkStr.implode('&', $paraArrNew);
  }
}
