<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\ItemInfoService;

class ItemInfoController extends Controller
{
    public $repository;
    public $guessYouLikeAdzoneId;
    public $guessYouLikePintuanAdzoneId;

    public function __construct(ItemInfoService $repository)
    {
      $this->repository = $repository;
      $this->guessYouLikeAdzoneId = config('adzoneID.wx_coupon_guess_you_like');
      $this->guessYouLikePintuanAdzoneId = config('adzoneID.wx_coupon_guess_you_like_pintuan');
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

    // 商品详情页面 更加全部对应传url参数的原则获取详情，是item的升级版
    public function iteminfo($id = null, Request $request)
    {
      $id == null ? abort(404) : '';
      $allParas = $request->all();
      $couponInfoStr = $request->coupon_info;
      unset($allParas['coupon_info']);
      $couponLinkPara = (object)$allParas;
      $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '2']);
      $itemInfo == false ? abort(404) : '';
      $title = $itemInfo->title;
      $images = $this->repository->images($itemInfo);
      $guessYouLikeCoupons = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, '10');

      if (empty($couponInfoStr)) {
        $couponInfo = $this->repository->couponInfo(null, ['me' => $couponLinkPara->e]);
      } else {
        $couponInfo = $this->repository->couponInfoFromURLPara($couponInfoStr);
      }

      return view('wx.itemInfo.index.index', compact('title', 'itemInfo', 'images', 'couponInfo', 'guessYouLikeCoupons', 'couponLinkPara'));
    }

    // 拼团详情页
    public function pinTuanInfo($id = null, Request $request)
    {
      $id == null ? abort(404) : '';
      $allParas = $request->all();
      unset($allParas['pintuan_info']);
      $pintuanLinkPara = (object)$allParas;
      $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '2']);
      $itemInfo == false ? abort(404) : '';
      $title = $itemInfo->title;
      $images = $this->repository->images($itemInfo);
      $guessYouLikePinTuan = $this->repository->guessYouLikePinTuan($this->guessYouLikePintuanAdzoneId, '10');

      if (empty($request->pintuan_info)) {
        return view('wx.itemInfo.pintuan.index_no', compact('title', 'itemInfo', 'images', 'guessYouLikePinTuan', 'pintuanLinkPara'));
      } else {
        $pintuanInfo = $this->repository->pinTuanInfo($request->pintuan_info);
        $pintuanInfoStr = $request->pintuan_info;
        return view('wx.itemInfo.pintuan.index', compact('title', 'itemInfo', 'images', 'pintuanInfo', 'pintuanInfoStr', 'guessYouLikePinTuan', 'pintuanLinkPara'));
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
