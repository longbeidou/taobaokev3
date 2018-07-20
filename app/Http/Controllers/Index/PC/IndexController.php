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

    // 顶级栏目分类
    public function categoryOne($id, $sort = null)
    {
      $topGoodsCategory = $this->repository->topGoodsCategory(['order' => 'desc', 'level' => 1]);
      $goodsCategoryInfo = $this->repository->currentCategoryInfo($id);
      $title = $this->repository->title($sort, $goodsCategoryInfo->name);
      $currentCouponGetRule = $this->repository->currentCouponGetRule($id);
      $couponItems = $this->repository->subGoodsCategoryCouponItems($currentCouponGetRule, $sort);
      $subGoodsCategory = $this->repository->subGoodsCategory($id, ['order' => 'desc', 'is_shown' => 1]);
      $para = $this->repository->getAjaxPara($goodsCategoryInfo, $sort);

      return view('wx.goodsCategory.index', compact('para', 'title', 'id', 'sort', 'couponItems', 'goodsCategoryInfo', 'topGoodsCategory', 'subGoodsCategory'));
    }

    // 二级栏目分类
    public function categoryTwo($id, $sort = null)
    {
      $goodsCategoryInfo = $this->repository->currentCategoryInfo($id);
      $olderFatherid = $this->repository->currentCategoryInfo($goodsCategoryInfo->parent_id)->id;
      $topGoodsCategory = $this->repository->topGoodsCategory(['order' => 'desc', 'level' => 1]);
      $upGoodsCategory = $this->repository->topGoodsCategory(['order' => 'desc', 'level4' => $goodsCategoryInfo->level, 'parent_id' => $olderFatherid]);
      $title = $this->repository->title($sort, $goodsCategoryInfo->name);
      $currentCouponGetRule = $this->repository->currentCouponGetRule($id);
      $couponItems = $this->repository->subGoodsCategoryCouponItems($currentCouponGetRule, $sort);
      $subGoodsCategory = $this->repository->subGoodsCategory($id, ['order' => 'desc', 'is_shown' => 1, 'limt' => 8]);
      $para = $this->repository->getAjaxPara($goodsCategoryInfo, $sort);

      return view('wx.goodsCategory.index_two', compact('para', 'title', 'id', 'sort', 'couponItems', 'goodsCategoryInfo', 'topGoodsCategory', 'subGoodsCategory', 'upGoodsCategory'));
    }

    // 子栏目的分类
    public function categorySon($id, $sort = null)
    {
      $goodsCategoryInfo = $this->repository->currentCategoryInfo($id);
      $topGoodsCategory = $this->repository->topGoodsCategory(['order' => 'desc', 'level' => 1]);
      $upGoodsCategory = $this->repository->topGoodsCategory(['order' => 'desc', 'level' => $goodsCategoryInfo->level]);
      $title = $this->repository->title($sort, $goodsCategoryInfo->name);
      $currentCouponGetRule = $this->repository->currentCouponGetRule($id);
      $couponItems = $this->repository->subGoodsCategoryCouponItems($currentCouponGetRule, $sort);
      $subGoodsCategory = $this->repository->subGoodsCategory($id, ['order' => 'desc', 'is_shown' => 1, 'limt' => 8]);
      $para = $this->repository->getAjaxPara($goodsCategoryInfo, $sort);

      return view('wx.sonGoodsCategory.index', compact('para', 'title', 'id', 'sort', 'couponItems', 'goodsCategoryInfo', 'topGoodsCategory', 'subGoodsCategory', 'upGoodsCategory'));
    }
}
