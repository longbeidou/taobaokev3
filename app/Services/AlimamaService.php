<?php

namespace App\Services;

use App\Repositories\Contracts\AlimamaRepositoryInterface;

/**
 * 好券清单API【导购】
 */
class AlimamaService
{
  public $alimamaRepository;

  public function __construct(AlimamaRepositoryInterface $api)
  {
    $this->alimamaRepository = $api;
  }
}
