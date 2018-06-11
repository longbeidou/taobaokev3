<?php

namespace App\Presenters;

class OptionPresenter
{
  public function goodsCategoryOptions($data, $selectId = 0, $selfId = 0)
  {
    $options = '';

    foreach ($data as $goodsCategory) {
      $str = '';

      for ($i=1; $i < $goodsCategory->level; $i++) {
        $str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      }

      $selfId == $goodsCategory->id ? $disabled = 'disabled' : $disabled = '';

      if ($goodsCategory->id == 0) {
        $selected = '';
      } else {
        $selectId == $goodsCategory->id ? $selected = 'selected' : $selected = '';
      }

      $options .= '<option '.$disabled.'  '.$selected.' value="'.$goodsCategory->id.'">'.$str.$goodsCategory->name.'</option>';
    }

    return $options;
  }
}
