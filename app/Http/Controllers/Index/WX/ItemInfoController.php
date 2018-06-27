<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\ItemInfoService;

class ItemInfoController extends Controller
{
    public $repository;
    public $guessYouLikeAdzoneId;

    public function __construct(ItemInfoService $repository)
    {
      $this->repository = $repository;
      $this->guessYouLikeAdzoneId = config('adzoneID.wx_coupon_guess_you_like');
    }

    // 商品详情页面
    public function item($id = null, Request $request)
    {
      if (
        empty($request->all()) ||
        empty($request->url) ||
        empty($request->coupon_start_time) ||
        empty($request->coupon_end_time) ||
        empty($request->coupon_amount)
      ) {
        $fromCoupon = true;
      } else {
        $fromCoupon = false;
      }

      $id == null ? abort(404) : '';
      $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '2']);
      $itemInfo == false ? abort(404) : '';
      $title = $itemInfo->title;
      $images = $this->repository->images($itemInfo);
      $guessYouLikeCoupons = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, '5');
      $couponLinkPara = $this->repository->couponLinkPrar($request->all());

      if ($fromCoupon) {
        $couponInfo = $this->repository->couponInfo($request);
        return view('wx.itemInfo.coupon.index', compact('title', 'itemInfo', 'images', 'couponInfo', 'guessYouLikeCoupons', 'couponLinkPara'));
      } else {
        $couponInfo = $this->repository->couponInfoFromUrl($request);
        return view('wx.itemInfo.material.index', compact('title', 'itemInfo', 'images', 'couponInfo', 'guessYouLikeCoupons', 'couponLinkPara'));
      }
    }

    // 优惠券的详情页面  用于优惠券api获取
    public function couponIndex($id = null, Request $request)
    {
      $id == null ? abort(404) : '';
      $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '2']);
      $itemInfo == false ? abort(404) : '';
      $title = $itemInfo->title;
      $images = $this->repository->images($itemInfo);
      $couponInfo = $this->repository->couponInfo($request);
      $guessYouLikeCoupons = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, '5');
      return view('wx.itemInfo.coupon.index', compact('title', 'itemInfo', 'images', 'couponInfo', 'guessYouLikeCoupons'));
    }

    // 优惠券的详情页面 用于通用优惠券的获取
    public function itemIndex($id = null, Request $request)
    {
      $id == null ? abort(404) : '';
      $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '2']);
      $itemInfo == false ? abort(404) : '';
      $title = $itemInfo->title;
      $images = $this->repository->images($itemInfo);
      $couponInfo = $this->repository->couponInfoFromUrl($request);
      $guessYouLikeCoupons = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, '5');
      return view('wx.itemInfo.material.index', compact('title', 'itemInfo', 'images', 'couponInfo', 'guessYouLikeCoupons'));
    }
}
