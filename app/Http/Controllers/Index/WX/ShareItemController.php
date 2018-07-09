<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\CouponActionService;

class ShareItemController extends Controller
{
    public $repository;

    public function __construct(CouponActionService $repository)
    {
      $this->repository = $repository;
    }

    // 分享优惠券的页面
    public function coupon($id, Request $request)
    {
      $title = '分享淘宝天猫优惠券';
      $name = '分享淘宝优惠券';
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

      return view('wx.shareItem.coupon', compact('title', 'name', 'linkPara', 'tpwd', 'itemInfo', 'couponAmount'));
    }

    // 分享拼团的页面
    public function pintuan($id, Request $request)
    {
      $title = '分享聚划算拼团';
      $name = '分享聚划算拼团';
      $requestArr = $request->all();
      $pintuanStr = empty($request->pintuan_info) ? '' : $request->pintuan_info;
      $pintuanInfo = $this->repository->pintuanInfo($request->pintuan_info);
      unset($requestArr['pintuan_info']);
      $pintuanLinkPara = $requestArr;
      $pintuanLink = $this->repository->pinTuanLink($pintuanLinkPara);

      if (
        empty(config('taobaoke.tpwd')['logo']) ||
        empty(config('taobaoke.tpwd')['text'])
      ) {
        $itemInfo = $this->repository->itemInfo($id);
      } else {
        $itemInfo = null;
      }
      $tpwd = $this->repository->makeTpwd($pintuanLink, $itemInfo);

      return view('wx.shareItem.pintuan', compact('title', 'name', 'tpwd', 'itemInfo', 'pintuanInfo', 'pintuanStr'));
    }
}
