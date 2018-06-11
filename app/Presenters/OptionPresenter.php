<?php

namespace App\Presenters;

class OptionPresenter
{
  public function goodsCategoryOptions($data, $selectId = 0)
  {
    $options = '';

    foreach ($data as $goodsCategory) {
      $str = '';
      for ($i=1; $i < $goodsCategory->level; $i++) {
        $str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      }
      $options .= '<option value="'.$goodsCategory->id.'">'.$str.$goodsCategory->name.'</option>';
    }

    return $options;
  }
}
