<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use App\Repositories\Contracts\GoodsCategoryInterface;
use App\Models\GoodsCategory;

class GoodsCategoryRepository implements GoodsCategoryInterface
{
  protected $goodsCategory;

  function __construct(GoodsCategory $goodsCategory)
  {
    $this->goodsCategory = $goodsCategory;
  }

  // 根据条件筛选数据
  public function filterData($parentId = 0, $level = 0, $recommended = 'all')
  {
    $goodsCategory = $this->goodsCategory->selectRaw('*, concat(path, id) as newPath')->where('is_shown', true);

    if ($parentId > 0) {
      $goodsCategory = $goodsCategory->where('parent_id', $parentId);
    }

    switch ($recommended) {
      case 'all':
        $goodsCategory = $goodsCategory;
        break;
      case true:
        $goodsCategory = $goodsCategory->where('is_recommended', true);
        break;

      case false:
        $goodsCategory = $goodsCategory->where('is_recommended', false);
        break;
    }

    if ($level > 0) {
      $goodsCategory = $goodsCategory->where('level', $level);
    }

    return $goodsCategory->orderBy('newPath', 'asc')->get();
  }

  // 插入一条数据
  public function store(Array $data)
  {
    foreach ($data as $field => $value) {
      $this->goodsCategory->$field = $value;
    }

    return $this->goodsCategory->save();
  }

  // 根据id获取信息
  public function getInfoById($id)
  {
    return $this->goodsCategory->find($id);
  }

  // 获取对应每页显示的信息
  public function getItems($pageSize)
  {
    return $this->goodsCategory->selectRaw('*, concat(path, id) as newPath')->orderBy('newPath', 'asc')->paginate($pageSize);
  }
}
