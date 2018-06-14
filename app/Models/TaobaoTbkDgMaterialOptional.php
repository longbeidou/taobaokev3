<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaobaoTbkDgMaterialOptional extends Model
{
  protected $table = "taobao_tbk_dg_material_optional";

  protected $fillable = [
    'goods_category_id',
    'start_dsr',
    'page_size',
    'page_no',
    'platform',
    'end_tk_rate',
    'start_tk_rate',
    'end_price',
    'start_price',
    'is_overseas',
    'is_tmall',
    'sort',
    'itemloc',
    'cat',
    'q',
    'has_coupon',
    'ip',
    'adzone_id',
    'need_free_shipment',
    'need_prepay',
    'include_pay_rate_30',
    'include_good_rate',
    'include_rfd_rate',
    'npx_level',
    'created_at',
    'updated_at'
  ];

  protected $hidden = [
  ];

  // 与优惠券规则建立一对一关系
  public function goodsCategory()
  {
    return $this->belongsTo('App\Models\GoodsCategory', 'goods_category_id');
  }
}
