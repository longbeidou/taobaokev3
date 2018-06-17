<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Repositories\Contracts\GoodsCategoryInterface;

class AllGoodsCategoryService
{
  public $alimamaRepository;
  public $goodsCategory;

  public function __construct(AlimamaRepositoryInterface $alimama, GoodsCategoryInterface $goodsCategory)
  {
    $this->alimamaRepository = $alimama;
    $this->goodsCategory = $goodsCategory;
  }

  // 获取左侧的导航一级分类
  public function leftTopCategory()
  {
    $result = $this->goodsCategory->topCategory();

    if (empty($result)) {
      return $result;
    }

    return $result;
  }

  // 获取商品分类的2级导航
  public function subCategory($leftTopCategory)
  {
    if (empty($leftTopCategory)) {
      return [];
    }

    $result = [];

    foreach ($leftTopCategory as $key => $category) {
      $result[$key]['subCategoryList'] = $this->goodsCategory->subCategory($category->id, ['is_shown'=>1]);
      $result[$key]['topCategoryInfo'] = $category;
    }

    return $result;
  }

  // 获取商品三级分类的导航
  public function sonCategory($subCategory)
  {
    if (empty($subCategory)) {
      return [];
    }

    $result = [];

    foreach ($subCategory as $topKey => $topInfoArr) {
      foreach ($topInfoArr['subCategoryList'] as $subkey => $subInfo) {
        $result[$topKey]['topCategoryInfo'] = $topInfoArr['topCategoryInfo'];
        $result[$topKey]['subList'][$subkey]['subCategoryInfo'] = $subInfo;
        $result[$topKey]['subList'][$subkey]['sonList'] = $this->goodsCategory->subCategory($subInfo->id, ['is_shown'=>1]);
       }
    }

    return $result;
  }

  // 获取推荐的商品分类
  public function recommendCategory($level)
  {
    $result = $this->goodsCategory->getItemsByParas(['level'=>$level, 'is_shown'=>'1', 'is_recommended'=>'1', 'order'=>'desc']);

    if (empty($result)) {
      return [];
    }

    return $result;
  }
}
