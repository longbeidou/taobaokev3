<?php

namespace App\Repositories\Contracts;

/**
 * 阿里妈妈淘宝客api接口
 */
interface AlimamaRepositoryInterface
{
  // 好券清单api
  public function taobaoTbkDgItemCouponGet(Array $para);
}
