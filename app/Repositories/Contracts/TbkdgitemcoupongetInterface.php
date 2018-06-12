<?php

namespace App\Repositories\Contracts;

interface TbkdgitemcoupongetInterface
{
  // 根据id获取信息
  public function getItemById($id);

  // 更新现有或创建新数据
  public function updateOrCreateItem(Array $data);
}
