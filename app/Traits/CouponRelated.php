<?php
namespace App\Traits;

/**
 * 优惠券相关的算法
 */
trait CouponRelated
{
  // 将优惠券的面额处理成数组
  public function makeCouponInfoToArray ($couponInfo)
  {
    $couponInfoToSameStr = str_replace(['满', '元', '减', '无条件券'], ['', '', '-', '-'], $couponInfo);
    $couponInfoArray = explode('-', $couponInfoToSameStr);
    if ($couponInfoArray[1] == 0) {
      return [0, $couponInfoArray[0]];
    } else {
      return $couponInfoArray;
    }
  }
}
