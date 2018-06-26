<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use Carbon\Carbon;

class TaoQiangGouService
{
  public $alimamaRepository;

  public function __construct(AlimamaRepositoryInterface $alimama)
  {
    $this->alimamaRepository = $alimama;
  }

  // 根据配置数字获取对应的淘抢购商品
  public function tqgItems($rulesArr)
  {
    if (empty($rulesArr)) {
      return [];
    }

    $items = [];
    foreach ($rulesArr as $key => $rule) {
      $items[$key] = $this->taobaoTbkJuTqgGet($rule);
    }

    return $items;
  }

  // 根据规则获取商品信息
  public function taobaoTbkJuTqgGet(Array $para)
  {
    $result = $this->alimamaRepository->taobaoTbkJuTqgGet($para);

    return $result;
  }

  // 淘口令的规则
  public function rulesArr($adzone_id = null, $pageSize = 20)
  {
    $today = Carbon::now();
    $todayStr = $today->year.' '.$today->month.' '.$today->day;

    return [
      0 => ['hour' => '00', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(0), 'end_time' => $this->getDateTimeStr(7, 59, 59), 'page_size' => $pageSize],
      1 => ['hour' => '08', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(8), 'end_time' => $this->getDateTimeStr(9, 59, 59), 'page_size' => $pageSize],
      2 => ['hour' => '10', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(10), 'end_time' => $this->getDateTimeStr(12, 59, 59), 'page_size' => $pageSize],
      3 => ['hour' => '13', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(13), 'end_time' => $this->getDateTimeStr(14, 59, 59), 'page_size' => $pageSize],
      4 => ['hour' => '15', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(15), 'end_time' => $this->getDateTimeStr(16, 59, 59), 'page_size' => $pageSize],
      5 => ['hour' => '17', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(17), 'end_time' => $this->getDateTimeStr(18, 59, 59), 'page_size' => $pageSize],
      6 => ['hour' => '19', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(19), 'end_time' => $this->getDateTimeStr(20, 59, 59), 'page_size' => $pageSize],
      7 => ['hour' => '21', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(21), 'end_time' => $this->getDateTimeStr(21, 59, 59), 'page_size' => $pageSize],
      8 => ['hour' => '23', 'adzone_id' => $adzone_id, 'start_time' => $this->getDateTimeStr(23), 'end_time' => $this->getDateTimeStr(23, 59, 59), 'page_size' => $pageSize]
    ];
  }

  // 获取开始时间的字符串
  public function getDateTimeStr($hour = 0, $minute = 0, $second =0)
  {
    $today = Carbon::now();
    $today->month >= 10 ? $month = $today->month : $month = '0'.$today->month;
    $today->day >= 10 ? $day = $today->day : $day = '0'.$today->day;
    $hour >= 10 ? : $hour = '0'.$hour;
    $minute >= 10 ? : $minute = '0'.$minute;
    $second >= 10 ? : $second = '0'.$second;

    return $today->year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.$second;
  }
}
