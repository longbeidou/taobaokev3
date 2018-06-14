<?php

namespace App\Repositories\Contracts;

interface TaobaoTbkDgMaterialOptionalInterface
{
  // 根据id获取信息
  public function getItemById($id);

  // 更新现有或创建新数据
  public function updateOrCreateItem(Array $data);

  // 根据goods_category_id删除信息
  public function deleteByGoodsCategoryId($goodsCategoryId);
}
