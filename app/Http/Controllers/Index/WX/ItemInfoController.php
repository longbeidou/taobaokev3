<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\ItemInfoService;

class ItemInfoController extends Controller
{
    const ADZONE_ID = '770398581';

    public $repository;

    public function __construct(ItemInfoService $repository)
    {
      $this->repository = $repository;
    }

    // 优惠券的详情页面
    public function couponIndex($id = null, Request $request)
    {
      $id == null ? abort(404) : '';
      $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '2']);
      $itemInfo == false ? abort(404) : '';
      $title = $itemInfo->title;
      $images = $this->repository->images($itemInfo);
      $couponInfo = $this->repository->couponInfo($request);
      $guessYouLikeCoupons = $this->repository->guessYouLike(self::ADZONE_ID, '5');
      return view('wx.itemInfo.coupon.index', compact('title', 'itemInfo', 'images', 'couponInfo', 'guessYouLikeCoupons'));
    }
}
