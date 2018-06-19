<?php

namespace App\Presenters;

use App\Traits\CouponRelated;

class CouponListPresenter
{
  use CouponRelated;

  public function showTmallOrTaobao($userType)
  {
    $userType == '1' ? $str = '<span class="lbd-from-tmall">天猫</span>' : $str = '<span class="lbd-from-taobao">淘宝</span>';

    return $str;
  }

  // 最终价
  public function finalPrice($couponInfo, $priceOrigin, $num = 2)
  {
    $couponInfoArray = $this->makeCouponInfoToArray($couponInfo);
    $count = $this->buyCount($couponInfoArray, $priceOrigin);

    $finalPrice = $priceOrigin-$couponInfoArray[1]/$count;

    return round($finalPrice, $num);
  }

  // 使用优惠券省多少钱
  public function saveMoney ($couponInfo, $priceOrigin, $num = 2)
  {
    $couponInfoArray = $this->makeCouponInfoToArray($couponInfo);
    $count = $this->buyCount($couponInfoArray, $priceOrigin);

    $saveMoney = $couponInfoArray[1]/$count;

    return round($saveMoney, $num);
  }

  // 买几件商品可以使用优惠券
  public function buyCount ($couponInfoArray, $priceOrigin)
  {
    $num = 1;

    for ( $i = 1; $i++; $i < 100) {
      if ($priceOrigin*$num >= $couponInfoArray[0]) {
        return $num;
      }

      $num++;
    }

    return $num;
  }

  // 将优惠券排序的标准是否激活
  public function showActiveForSort($now, $ori)
  {
    $now == $ori ? $str = 'lbd-active' : $str = '';

    return $str;
  }

  // 将时间戳转换成日期格式
  public function makeIntergerToDateTimeString($str)
  {
    return date('Y-m-d H:i:s', substr($str, 0, 10));
  }
}
