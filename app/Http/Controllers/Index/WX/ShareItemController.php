<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\CouponActionService;

class ShareItemController extends Controller
{
    const ADZONE_ID = '770398581';

    public $repository;

    public function __construct(CouponActionService $repository)
    {
      $this->repository = $repository;
    }

    // 分享优惠券的页面
    public function coupon($id, Request $request)
    {
      $title = '分享淘宝天猫优惠券';
      $couponLink = $this->repository->couponLink($request->all());
      $linkPara = $this->repository->linkPara($couponLink);
      // $shortCouponLink = $this->repository->shortCouponLink($couponLink);
      $couponAmount = $request->coupon_amount;

      if (
        empty(config('taobaoke.tpwd')['logo']) ||
        empty(config('taobaoke.tpwd')['text'])
      ) {
        $itemInfo = $this->repository->itemInfo($id);
      } else {
        $itemInfo = null;
      }
      $tpwd = $this->repository->makeTpwd($couponLink, $itemInfo);

      return view('wx.shareItem.coupon', compact('title', 'linkPara', 'tpwd', 'itemInfo', 'couponAmount'));
    }
}
