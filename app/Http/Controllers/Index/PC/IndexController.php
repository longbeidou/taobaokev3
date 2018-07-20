<?php

namespace App\Http\Controllers\Index\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PC\IndexService;

class IndexController extends Controller
{
    const PAGE_SIZE = 100;

    public $repository;
    public $couponAdzoneId; // 优惠券api获取的数据

    public function __construct(IndexService $api)
    {
      $this->repository = $api;
      $this->couponAdzoneId = config('adzoneID.pc_index_coupon_adzone_id');
    }

    public function index()
    {
        $title = config('website.indexTitle');
        $adzoneId = $this->couponAdzoneId;
        $pageSize = self::PAGE_SIZE;
        $couponItems = $this->repository->recommendCoupons(['adzone_id' => $this->couponAdzoneId, 'page_size'=>self::PAGE_SIZE]);
        $topGoodsCategory = $this->repository->topGoodsCategory(['order' => 'desc', 'level' => 1]);
        $subCategory = $this->repository->subCategory($topGoodsCategory);
        $sonCategory = $this->repository->sonCategory($subCategory);

        return view('pc.index.index', compact('title', 'couponItems', 'topGoodsCategory', 'sonCategory', 'pageSize', 'adzoneId'));
    }
}
