<?php

namespace App\Http\Controllers\Index\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PC\AllGoodsCategoryService;

class AllGoodsCategoryController extends Controller
{
    // 猜你喜欢，商品的数量
    const GUESS_YOU_LIKE_NUM = '15';

    public $guessYouLikeAdzoneId; // 猜你喜欢

    public function __construct(AllGoodsCategoryService $api)
    {
        $this->repository = $api;
        $this->guessYouLikeAdzoneId = config('adzoneID.pc_coupon_guess_you_like');
    }

    // 所有商品列表
    public function index()
    {
        $title = '淘宝天猫优惠券商品分类';
        $leftTopCategory = $this->repository->leftTopCategory();
        $subCategory = $this->repository->subCategory($leftTopCategory);
        $sonCategory = $this->repository->sonCategory($subCategory);
        $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

        return view('pc.allGoodsCategory.index', compact('title', 'guessYouLikeItems', 'sonCategory'));
    }
}
