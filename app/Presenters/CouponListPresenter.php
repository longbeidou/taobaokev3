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

    return number_format(round($finalPrice, $num), $num);
  }

  // 使用优惠券省多少钱
  public function saveMoney ($couponInfo, $priceOrigin, $num = 2)
  {
    $couponInfoArray = $this->makeCouponInfoToArray($couponInfo);
    $count = $this->buyCount($couponInfoArray, $priceOrigin);

    $saveMoney = $couponInfoArray[1]/$count;

    return number_format(round($saveMoney, $num), $num);
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

  // 过滤优惠券api获取的优惠券链接的域名只获取参数
  public function getParaStrFromCouponUrl($link)
  {
    if (empty($link)) {
      return '';
    }

    return str_replace('https://uland.taobao.com/coupon/edetail', '', $link);
  }

  // 过滤通用api获取的优惠券链接的域名只获取参数
  public function getParaStrFromMaterialUrl($link)
  {
    if (empty($link)) {
      return '';
    }

    return str_replace('//uland.taobao.com/coupon/edetail', '', $link);
  }

  // 返回链接的参数的字符串
  public function getParaStrFromUrl($url)
  {
     $urlArr = explode('?', $url);

     return empty($urlArr[1]) ? '' : $urlArr[1];
  }

  // PC首页标题前面的淘宝天猫小logo
  public function imgTaobaoOrTmall($userType)
  {
      $imgTaobao = '<img src="/pcstyle/images/taobao32.png" alt="淘宝优惠券logo">';
      $imgTmall = '<img src="/pcstyle/images/tmall32.png" alt="淘宝优惠券logo">';

      return $userType == 1 ? $imgTmall : $imgTaobao;
  }
}
