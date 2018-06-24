<?php

namespace App\Services\WX;

use App\Services\Share\GuessYouLikeService;
use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Services\Share\TpwdService;

class ItemInfoService
{
  public $guessYouLike;
  public $alimama;
  public $tpwdService;

  public function __construct(GuessYouLikeService $guess, AlimamaRepositoryInterface $alimama, TpwdService $tpwd)
  {
    $this->guessYouLike = $guess;
    $this->alimama = $alimama;
    $this->tpwdService = $tpwd;
  }

  // 获取猜你喜欢的优惠券数量
  public function guessYouLike($adzonId, $num)
  {
    return $this->guessYouLike->coupons($adzonId, $num);
  }

  // 获取指定id的商品信息
  public function itemInfo($para)
  {
    return $this->alimama->taobaoTbkItemInfoGet($para);
  }

  // 返回商品图片的数组
  public function images($itemInfo)
  {
    $images[] = $itemInfo->pict_url;

    if (!empty($itemInfo->small_images)) {
      foreach ($itemInfo->small_images->string as $image) {
        $images[] = $image;
      }
    }

    return $images;
  }

  // 获取优惠券的信息
  public function couponInfo($request, $para = null)
  {
    if ($para == null) {
      if (empty($request->url)) {
        return false;
      }

      $e = explode('&', $request->url);
      $e = explode('?e=', $e[0]);

      if (empty($e[1])) {
        return false;
      }

      return $this->alimama->taobaoTbkCouponGet(['me' => $e[1]]);
    } else {
      return $this->alimama->taobaoTbkCouponGet($para);
    }
  }

  // 获取优惠券的信息
  public function couponInfoFromUrl($request)
  {
    if (
      empty($request->all()) ||
      empty($request->url) ||
      empty($request->coupon_start_time) ||
      empty($request->coupon_end_time) ||
      empty($request->coupon_amount)
    ) {
      return false;
    }

    return (object)$request->all();
  }
}
