<?php

namespace App\Repositories\Contracts;

interface GoodsCategoryInterface
{
  // 根据条件筛选数据
  public function filterData($parentId, $level, $recommended);

  // 插入一条数据
  public function store(Array $data);

  // 根据id获取信息
  public function getInfoById($id);

  // 获取所有的信息
  public function getItems($pageSize);

  // 获取制定id的信息
  public function getItemByItem($id);

  // 根据id来更新信息
  public function updateById($id, $data);

  // 根据id删除信息
  public function deleteById($id);

  // 获取顶级分类的信息
  public function topCategory(Array $para);
}
