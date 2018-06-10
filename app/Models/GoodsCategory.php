<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
  protected $table = "goods_categorys";

  protected $fillable = [
    'name', 'parent_id', 'path', 'order', 'is_shown', 'is_recommended', 'font_icon', 'image'
  ];

  protected $hidden = [
  ];
}
