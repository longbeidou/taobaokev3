<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use Longbeidou\Taobaoke\Contracts\Contract;

/**
 * 阿里妈妈淘宝客api实现
 */
class AlimamaRepository implements AlimamaRepositoryInterface
{
  public $alimamaSdk;

  public function __construct(Contract $api)
  {
    $this->alimamaSdk = $api;
  }

  public function test()
  {
    return 999;
  }
}
