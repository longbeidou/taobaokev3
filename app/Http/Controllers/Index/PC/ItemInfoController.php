<?php

namespace App\Http\Controllers\Index\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PC\ItemInfoService;

class ItemInfoController extends Controller
{
    const GUESS_YOU_LIKE_NUM = '20';

    public $repository;
    public $guessYouLikeAdzoneId;

    public function __construct(ItemInfoService $repository)
    {
        $this->repository = $repository;
        $this->guessYouLikeAdzoneId = config('adzoneID.pc_coupon_guess_you_like');
    }

    // 商品详情页面 全部对应传url参数的原则获取详情
    public function iteminfo($id = null, Request $request)
    {
        $id == null ? abort(404) : '';
        $allParas = $request->all();
        $couponInfoStr = $request->coupon_info;
        unset($allParas['coupon_info']);
        $couponLinkPara = (object)$allParas;
        $couponLink = $this->repository->makeCouponLink($couponLinkPara);
        $currentURL = url()->full();
        $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '1']);
        $itemInfo == false ? abort(404) : '';
        $title = $itemInfo->title;
        $images = $this->repository->images($itemInfo);
        $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

        if (empty($couponInfoStr)) {
            $couponInfo = empty($couponLinkPara->e) ? [] : $this->repository->couponInfo(null, ['me' => $couponLinkPara->e]);
        } else {
            $couponInfo = $this->repository->couponInfoFromURLPara($couponInfoStr);
        }

        return view('pc.itemInfo.index.index', compact('title', 'itemInfo', 'images', 'couponInfo', 'couponLink', 'id', 'currentURL', 'guessYouLikeItems'));
    }

    // 拼团详情页
    public function pinTuanInfo($id = null, Request $request)
    {
        $id == null ? abort(404) : '';
        $allParas = $request->all();
        unset($allParas['pintuan_info']);
        $pintuanLinkPara = (object)$allParas;
        $pinTuanLink = $this->repository->makePinTuanLink($pintuanLinkPara);
        $currentURL = url()->full();
        $itemInfo = $this->repository->itemInfo(['num_iids' => $id, 'platform' => '1']);
        $itemInfo == false ? abort(404) : '';
        $title = $itemInfo->title;
        $images = $this->repository->images($itemInfo);
        $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

        if (empty($request->pintuan_info)) {
            $pinTuanInfo = [];
        } else {
            $pinTuanInfo = $this->repository->pinTuanInfo($request->pintuan_info);
        }

        return view('pc.itemInfo.pintuan.index', compact('title', 'itemInfo', 'images', 'pinTuanInfo', 'pinTuanLink', 'currentURL', 'id', 'guessYouLikeItems'));
    }
}
