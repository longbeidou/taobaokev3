<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\CouponActionService;

class CouponActionController extends Controller
{
  const ADZONE_ID = '770398581';

  public $repository;

  public function __construct(CouponActionService $repository)
  {
    $this->repository = $repository;
  }

  public function index($id, Request $request)
  {
    $title = '领淘宝天猫优惠券';
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

    return view('wx.couponAction.index', compact('title', 'linkPara', 'tpwd', 'itemInfo'));
  }
}
