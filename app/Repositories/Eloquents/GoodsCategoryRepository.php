<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use App\Repositories\Contracts\GoodsCategoryInterface;
use App\Models\GoodsCategory;

class GoodsCategoryRepository implements GoodsCategoryInterface
{
  public $goodsCategory;

  function __construct(GoodsCategory $goodsCategory)
  {
    $this->goodsCategory = $goodsCategory;
  }

  // 根据条件筛选数据
  public function filterData($parentId = 0, $level = 0, $recommended = 'all', $isShown = 'all')
  {
    $goodsCategory = $this->goodsCategory->selectRaw('*, concat(path, id) as newPath');

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

    switch ($isShown) {
      case 'all':
        $goodsCategory = $goodsCategory;
        break;

      case true:
        $goodsCategory = $goodsCategory->where('is_shown', true);
        break;

      case false:
        $goodsCategory = $goodsCategory->where('is_shown', false);
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

  // 获取制定id的信息
  public function getItemByItem($id){
    return $this->goodsCategory->find($id);
  }

  // 根据id来更新信息
  public function updateById($id, $data)
  {
    return $this->goodsCategory->where('id', $id)->update($data);
  }

  // 根据id删除信息
  public function deleteById($id)
  {
    return $this->goodsCategory->where('id', $id)->delete();
  }

  // 获取顶级分类的信息
  public function topCategory(Array $para = ['name'=>null, 'order'=>'desc', 'is_shown'=>1, 'is_recommended'=>null, 'level' => 1, 'parent_id' => null])
  {
    $goodsCategory = $this->goodsCategory;;

    if (isset($para['level'])) {
      $goodsCategory = $goodsCategory->where('level', $para['level']);
    }

    if (isset($para['name'])) {
      $goodsCategory = $goodsCategory->where('name', 'like', '%'.$para['name'].'%');
    }
    if (isset($para['is_shown'])) {
      $goodsCategory = $goodsCategory->where('is_shown', $para['is_shown']);
    }
    if (isset($para['is_recommended'])) {
      $goodsCategory = $goodsCategory->where('is_recommended', $para['is_recommended']);
    }
    if (isset($para['parent_id'])) {
      $goodsCategory = $goodsCategory->where('parent_id', $para['parent_id']);
    }
    if (isset($para['order'])) {
      $goodsCategory = $goodsCategory->orderBy('order', $para['order']);
    }

    return $goodsCategory->get();
  }

  // 获取子分类的信息
  public function subCategory($parentId, Array $para = ['name'=>null, 'order'=>'', 'is_shown'=>1, 'is_recommended'=>null, 'limit'=>8])
  {
    $goodsCategory = $this->goodsCategory->where('parent_id', $parentId);

    if (isset($para['name'])) {
      $goodsCategory = $goodsCategory->where('name', 'like', '%'.$para['name'].'%');
    }
    if (isset($para['is_shown'])) {
      $goodsCategory = $goodsCategory->where('is_shown', $para['is_shown']);
    }
    if (isset($para['is_recommended'])) {
      $goodsCategory = $goodsCategory->where('is_recommended', $para['is_recommended']);
    }
    if (isset($para['order'])) {
      $goodsCategory = $goodsCategory->orderBy('order', $para['order']);
    }
    if (isset($para['limit'])) {
      $goodsCategory = $goodsCategory->take($para['limit']);
    }

    return $goodsCategory->get();
  }

  // 根据参数获取信息
  public function getItemsByParas(Array $para = ['name'=>null, 'order'=>'', 'is_shown'=>1, 'is_recommended'=>null, 'level'=>'', 'limit'=>null])
  {
    $goodsCategory = $this->goodsCategory;

    if (isset($para['name'])) {
      $goodsCategory = $goodsCategory->where('name', 'like', '%'.$para['name'].'%');
    }
    if (isset($para['is_shown'])) {
      $goodsCategory = $goodsCategory->where('is_shown', $para['is_shown']);
    }
    if (isset($para['is_recommended'])) {
      $goodsCategory = $goodsCategory->where('is_recommended', $para['is_recommended']);
    }
    if (isset($para['level'])) {
      $goodsCategory = $goodsCategory->where('level', $para['level']);
    }
    if (isset($para['order'])) {
      $goodsCategory = $goodsCategory->orderBy('order', $para['order']);
    }
    if (isset($para['limit'])) {
      $goodsCategory = $goodsCategory->take($para['limit']);
    }

    return $goodsCategory->get();
  }

  // 更加goods_category_id获取对应的调用api的规则
  public function getRuleById($id)
  {
    return $this->goodsCategory->find($id)->dgMaterialOptionalRule;
  }
}
