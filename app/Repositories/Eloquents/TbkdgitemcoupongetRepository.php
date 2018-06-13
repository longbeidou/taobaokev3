<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TbkdgitemcoupongetInterface;
use App\Models\TbkDgItemCouponGet;

class TbkdgitemcoupongetRepository implements TbkdgitemcoupongetInterface
{
  public $itemCoupon;

  function __construct(TbkDgItemCouponGet $itemCoupon)
  {
    $this->itemCoupon = $itemCoupon;
  }

  // 根据id获取信息
  public function getItemById($id)
  {
    return $this->itemCoupon->find($id);
  }

  // 更新现有或创建新数据
  public function updateOrCreateItem(Array $data)
  {
    return $this->itemCoupon->updateOrCreate(
              ['goods_category_id' => $data['goods_category_id']],
              $data
            );
  }

  // 更加goods_category_id获取信息
  public function getItemByGoodsCategoryId($goodsCategoryId)
  {
    return $this->itemCoupon->where('goods_category_id', $goodsCategoryId)->first();
  }
}
