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

  public function index($id, Request $request)
  {
    $showClient = config('website.show_client');
    $title = '领淘宝天猫优惠券';
    $name = '领淘宝优惠券';
    $couponLink = $this->repository->couponLink($request->all());
    $linkPara = $this->repository->linkPara($couponLink);

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

    return view('wx.actionPage.coupon', compact('title', 'name', 'linkPara', 'tpwd', 'itemInfo', 'showClient'));
  }
}
