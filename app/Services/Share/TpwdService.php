<?php

namespace App\Services\Share;

/**
 * 处理淘口令
 */
class TpwdService
{
  // 获取考口令对应的商品名称
  public function getGoodsTitle($str)
  {
    $str = str_replace(PHP_EOL, '', $str);
    $str = $this->filterStrByBookmark($str);

    return $str;
  }

  // 根据【包邮】 【在售价】 来获取可能的商品名称
  public function filterStrByBookmark($str)
  {
    $r = explode('【包邮】', $str);
    $r = explode('【在售价】', $r[0]);

    return trim($r[0]);
  }
}
