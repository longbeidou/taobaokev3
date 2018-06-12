<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TbkdgitemcoupongetInterface;
use App\Models\tbkDgItemCouponGet;

class TbkdgitemcoupongetRepository implements TbkdgitemcoupongetInterface
{
  public $itemCoupon;

  function __construct(tbkDgItemCouponGet $itemCoupon)
  {
    $this->itemCoupon = $itemCoupon;
  }

  // 根据id获取信息
  public function getItemById($id)
  {
    return $this->itemCoupon->find($id);
  }
}
