<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\CouponActionService;

class CouponActionController extends Controller
{
  public $repository;

  public function __construct(CouponActionService $repository)
  {
    $this->repository = $repository;
  }

  // 优惠券的领取页面
  public function index($id, Request $request)
  {
    $showClient = config('website.show_client');
    $title = '领淘宝天猫优惠券';
    $name = '领淘宝优惠券';
    $couponLink = $this->repository->couponLink($request->all());
    // $linkPara = $this->repository->linkPara($couponLink);

    if (
      empty(config('taobaoke.tpwd')['logo']) ||
      empty(config('taobaoke.tpwd')['text'])
    ) {
      $itemInfo = $this->repository->itemInfo($id);
    } else {
      $itemInfo = null;
    }
    $tpwd = $this->repository->makeTpwd($couponLink, $itemInfo);
    $showClient = $this->repository->showClient($showClient);

    if (env('IS_APP')) {
      return view('wx.actionPage.coupon_app', compact('title', 'name', 'couponLink', 'tpwd', 'itemInfo', 'showClient'));
    } else {
      return view('wx.actionPage.coupon', compact('title', 'name', 'couponLink', 'tpwd', 'itemInfo', 'showClient'));
    }
  }

  // 优惠券的领取页面_app专用
  public function appIndex($id, Request $request)
  {
    $showClient = config('website.show_client');
    $title = '领淘宝天猫优惠券';
    $name = '领淘宝优惠券';
    $couponLink = $this->repository->couponLink($request->all());
    // $linkPara = $this->repository->linkPara($couponLink);

    if (
      empty(config('taobaoke.tpwd')['logo']) ||
      empty(config('taobaoke.tpwd')['text'])
    ) {
      $itemInfo = $this->repository->itemInfo($id);
    } else {
      $itemInfo = null;
    }
    $tpwd = $this->repository->makeTpwd($couponLink, $itemInfo);
    $showClient = $this->repository->showClient($showClient);

    return view('wx.actionPage.coupon_app', compact('title', 'name', 'couponLink', 'tpwd', 'itemInfo', 'showClient'));
  }

  // 拼团的领取页面
  public function pintuan($id, Request $request)
  {
    $showClient = config('website.show_client');
    $title = '参与聚划算拼团';
    $name = '参与聚划算拼团';
    $pinTuanLink = $this->repository->pinTuanLink($request->all());
    // $linkPara = $this->repository->linkPara($pinTuanLink);

    if (
      empty(config('taobaoke.tpwd')['logo']) ||
      empty(config('taobaoke.tpwd')['text'])
    ) {
      $itemInfo = $this->repository->itemInfo($id);
    } else {
      $itemInfo = null;
    }
    $tpwd = $this->repository->makeTpwd($pinTuanLink, $itemInfo);
    $showClient = $this->repository->showClient($showClient);

    return view('wx.actionPage.pintuan', compact('title', 'name', 'pinTuanLink', 'tpwd', 'itemInfo', 'showClient'));
  }
}
