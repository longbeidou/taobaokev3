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

    if (
      $value < 23 &&
      in_array($value, $rulesArr[$key]) &&
      $value <= $hour &&
      $rulesArr[$key+1]['hour'] > $hour
    ) {
      return 'mui-active';
    }

    if ($value == 23 && in_array($value, $rulesArr[$key]) && $value <= $hour) {
      return 'mui-active';
    }

    return '';
  }

  // 相对现在的时刻的状态  0：激活 -1：一开始 1：未开始
  public function statusShow($rulesArr, $key, $value)
  {
    $hour = Carbon::now()->hour;
    $count = count($rulesArr);
    $status = -1;

    if (
      $value < 23 &&
      in_array($value, $rulesArr[$key]) &&
      $key < $count-1 &&
      $rulesArr[$key+1]['hour'] > $hour
    ) {
      $status = 1;
    }

    if (
      $value < 23 &&
      in_array($value, $rulesArr[$key]) &&
      $value <= $hour &&
      $rulesArr[$key+1]['hour'] > $hour
    ) {
      $status = 0;
    }

    if (in_array($value, $rulesArr[$key]) && $key == $count-1)
    {
      $status = 1;
    }

    if ($value == 23 && in_array($value, $rulesArr[$key]) && $value <= $hour) {
      $status = 0;
    }

    return $status;
  }

  public function activeShowpc($rulesArr, $key, $value)
  {
    $hour = Carbon::now()->hour;

    if (
      $value < 23 &&
      in_array($value, $rulesArr[$key]) &&
      $value <= $hour &&
      $rulesArr[$key+1]['hour'] > $hour
    ) {
      return 'active';
    }

    if ($value == 23 && in_array($value, $rulesArr[$key]) && $value <= $hour) {
      return 'active';
    }

    return '';
  }

  public function activeId($rulesArr, $key, $value)
  {
    $hour = Carbon::now()->hour;

    if (
      $value < 23 &&
      in_array($value, $rulesArr[$key]) &&
      $value <= $hour &&
      $rulesArr[$key+1]['hour'] > $hour
    ) {
      return 'id="active-img"';
    }

    if ($value == 23 && in_array($value, $rulesArr[$key]) && $value <= $hour) {
      return 'id="active-img"';
    }

    return '';
  }

  // 获取淘抢购链接的参数
  public function getParasStrFromClickUrl($click_url)
  {
    $paraArr = explode('?e=', $click_url);
    $e = empty($paraArr[1]) ? '' : $paraArr[1];

    return urlencode($e);
  }

  // 转换时间格式
  public function getBeginDate($dateStr)
  {
      $c = Carbon::parse($dateStr);
      $hour = $c->hour > 9 ? $c->hour : '0'.$c->hour;
      $minute = $c->minute > 9 ? $c->minute : '0'.$c->minute;

      return $c->month.'月'.$c->day.'日 '.$hour.':'.$minute;
  }

  // 获取当前抢购专场的结束时间
  public function getActiveEndTime($rulesArr, $key)
  {
    $count = count($rulesArr);

    if ($key < $count-1) {
      $hour = (int)$rulesArr[$key+1]['hour']-1;
    } else {
      $hour = 23;
    }

    return $hour;
  }

  // 根据商品开始的日期判断是否处于抢购状态
  public function isBegin($start_time)
  {
    $h = substr($start_time, 11, 2);
    $time = new Carbon();
    $hourNOw = $time->hour;

    return $hourNOw >= (int)$h;
  }
}
