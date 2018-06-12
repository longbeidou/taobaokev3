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
    $data = $this->getStanderData($request);

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

  // 更加id更新商品分类信息
  public function updateById($id, $request)
  {
    $data = $this->getStanderData($request);

    if (!empty($data['image'])) {
      $imagePath = $this->find($id)->image;
      $this->unlinkFiles($imagePath);
    }

    $parentId = $this->goodsCategory->getInfoById($id)->parent_id;

    if ($parentId != $request->parent_id) {
      $sonCount = $this->goodsCategory->goodsCategory->where('parent_id', $id)->count();

      if ($sonCount) {
        unset($data['parent_id']);
        unset($data['path']);
        unset($data['level']);
        session()->flash('warning', '该栏目下存在子栏目，请删除子栏目再进行更新栏目操作！');
        return $this->goodsCategory->updateById($id, $data);
      }
    }

    return $this->goodsCategory->updateById($id, $data);
  }

  // 获取标准数据
  public function getStanderData($request)
  {
    $data['name'] = $request->name;
    $data['parent_id'] = $request->parent_id;
    $data['order'] = $request->order;
    $data['is_shown'] = $request->is_shown;
    $data['is_recommended'] = $request->is_recommended;
    $data['font_icon'] = $request->font_icon;

    if ($request->has('image')) {
      $data['image'] = $this->getImagesSavePath($request, 'upload/images/goodsCategory/', 'image');
    }

    if ($request->parent_id == 0) {
      $data['level'] = '1';
      $data['path'] = '0,';
    } else {
      $fatherData = $this->goodsCategory->getInfoById($request->parent_id);
      $data['level'] = $fatherData->level + 1;
      $data['path'] = $this->getPath($fatherData);
    }

    return $data;
  }

  // 根据文件路径删除文件
  public function unlinkFiles (String $path)
  {
    if ( !empty($path) ) {
      $fullPath = public_path().$path;
      if ( is_file($fullPath) ) {
        unlink($fullPath);
      }
    }
  }
}
