<?php

namespace App\Services;

use App\Repositories\Contracts\GoodsCategoryInterface;
use App\Traits\UploadFiles;

class GoodsCategoryService
{
  use UploadFiles;

  protected $goodsCategory;

  function __construct(GoodsCategoryInterface $goodsCategory)
  {
    $this->goodsCategory = $goodsCategory;
  }

  // 为分类选择的option提供数据
  function optionsForSelect($parentId = 0, $level = 0)
  {
    return $this->goodsCategory->filterData($parentId, $level);
  }

  // 存储新增的商品分类
  public function store($request)
  {
    $data['name'] = $request->name;
    $data['parent_id'] = $request->parent_id;
    $data['order'] = $request->order;
    $data['is_shown'] = $request->is_shown;
    $data['is_recommended'] = $request->is_recommended;
    $data['font_icon'] = $request->font_icon;
    $data['image'] = $this->getImagesSavePath($request, 'upload/images/goodsCategory/', 'image');

    if ($request->parent_id == 0) {
      $data['level'] = '1';
      $data['path'] = '0,';
    } else {
      $fatherData = $this->goodsCategory->getInfoById($request->parent_id);
      $data['level'] = $fatherData->level + 1;
      $data['path'] = $this->getPath($fatherData);
    }

    return $this->goodsCategory->store($data);
  }

  // 获取栏目的等级，即：level字段的值
  public function getPath($fatherData)
  {
    return $fatherData->path.$fatherData->id.',';
  }

  // 查询数据表的所有信息
  public function get($pageSize)
  {
    return $this->goodsCategory->getItems($pageSize);
  }

  // 获取指定id的信息
  public function find($id)
  {
    return $this->goodsCategory->getItemByItem($id);
  }
}
