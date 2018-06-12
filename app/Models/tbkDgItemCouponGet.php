<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbkDgItemCouponGet extends Model
{
  protected $table = "tbk_dg_item_coupon_get";

  protected $fillable = [
    'goods_category_id', 'cat', 'page_size', 'q'
  ];

  protected $hidden = [
  ];

  // 与优惠券规则建立一对一关系
  public function goodsCategory()
  {
    return $this->belongsTo('App\Models\GoodsCategory', 'goods_category_id');
  }
}
