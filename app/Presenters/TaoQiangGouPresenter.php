<?php

namespace App\Presenters;

use Carbon\Carbon;

class TaoQiangGouPresenter
{
  public function isBeginning($hour = null)
  {
    $hourNow = Carbon::now()->hour;
    $hour > $hourNow ? $str = '即将开抢' : $str = '已经开抢';

    return $str;
  }

  public function activeShow($rulesArr, $key, $value)
  {
    $hour = Carbon::now()->hour;

    if ($value < 23 && in_array($value, $rulesArr[$key]) && $value <= $hour && $rulesArr[$key+1]['hour'] > $hour) {
      return 'mui-active';
    }
    if ($value == 23 && in_array($value, $rulesArr[$key]) && $value <= $hour) {
      return 'mui-active';
    }

    return '';
  }

  // 获取淘抢购链接的参数
  public function getParasStrFromClickUrl($click_url)
  {
    $url = str_replace('taobao', 'jd', $click_url);

    return urlencode($url);
  }
}
