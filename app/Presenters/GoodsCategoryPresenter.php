<?php

namespace App\Presenters;

use App\Services\GoodsCategoryService;

class GoodsCategoryPresenter
{
  protected $goodsCategory;

  public function __construct(GoodsCategoryService $goodsCategory)
  {
    $this->goodsCategory = $goodsCategory;
  }

  public function isShown($data)
  {
    if ($data == 0) {
      return '<td  class="text-center text-warning">不显示</td>';
    }

    return '<td  class="text-center text-navy">显示</td>';
  }

  public function isRecommended($data)
  {
    if ($data == 0) {
      return '<td  class="text-center text-warning">不推荐</td>';
    }

    return '<td  class="text-center text-navy">推荐</td>';
  }

  public function nbspBeforeName($name, $level)
  {
    $preStr = '';
    $preNbsp = '';

    for ($i=1; $i < $level; $i++) {
      $preNbsp .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

      if ($level == $i+1) {
        $preStr = '+—';
      }
    }

    return $preNbsp.$preStr.$name;
  }

  public function isShownForYesOrNo($isShown)
  {
    if ($isShown == 0) {
      return '不显示';
    }

    return '显示';
  }

  public function isRecommendedForYesOrNo($isRecommended)
  {
    if ($isRecommended == 0) {
      return '不推荐';
    }

    return '推荐';
  }

  public function getParentItemName($parentId)
  {
    if ($parentId == 0) {
        return '顶级栏目';
    }

    return $this->goodsCategory->find($parentId)->name;
  }

  public function isChecked($option, $value)
  {
    $option == $value ? $checked = 'checked' : $checked = '';

    return $checked;
  }

  public function getImage($imgSrc)
  {
    if (empty($imgSrc)) {
      return '<p class="text-navy">无图片</p>';
    }

    if (!file_exists(public_path($imgSrc))) {
      return '<p class="text-danger">图片不存在</p>';
    }

    return '<img src="'.$imgSrc.'" style="max-width:43px;" />';
  }

  public function couponRuleAction($couponRule, $goodsCategoryId)
  {
    if (!empty($couponRule)) {
      $actioinStr = '<a href="'.route('admin.couponRule.edit', $goodsCategoryId).'" title="编辑规则"><i class="fa fa-edit text-navy"></i></a> | ';
      $actioinStr .= '<a href="'.route('admin.couponRule.show', $couponRule->id).'" title="查看规则"><i class="fa fa-info text-navy"></i></a>';

      return $actioinStr;
    }

    return '<a href="'.route('admin.couponRule.create', $goodsCategoryId).'" title="创建规则"><i class="fa fa-plus text-danger"></i></a>';
  }
}
