<?php

namespace App\Presenters;

class GoodsCategoryPresenter
{
  public function isShown($data)
  {
    if ($data == 0) {
      return '<td  class="text-center text-warning">不展示</td>';
    }

    return '<td  class="text-center text-navy">展示</td>';
  }

  public function isRecommended($data)
  {
    if ($data == 0) {
      return '<td  class="text-center text-warning">不推荐</td>';
    }

    return '<td  class="text-center text-navy">推荐</td>';
  }

  public function nbspBeforeName($name, $level)
  {
    $preStr = '';
    $preNbsp = '';

    for ($i=1; $i < $level; $i++) {
      $preNbsp .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

      if ($level == $i+1) {
        $preStr = '+—';
      }
    }

    return $preNbsp.$preStr.$name;
  }
}
