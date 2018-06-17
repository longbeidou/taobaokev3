<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\AllGoodsCategoryService;

class AllGoodsCategoryController extends Controller
{
  public $repository;

  public function __construct(AllGoodsCategoryService $api)
  {
    $this->repository = $api;
  }

  public function index()
  {
    $title = '淘宝天猫优惠券商品分类';
    $leftTopCategory = $this->repository->leftTopCategory();
    $subCategory = $this->repository->subCategory($leftTopCategory);
    $sonCategory = $this->repository->sonCategory($subCategory);
    $recommendSonCategory = $this->repository->recommendCategory(3);

    return view('wx.allGoodsCategory.index', compact('title', 'leftTopCategory', 'recommendSonCategory', 'sonCategory'));
  }
}
