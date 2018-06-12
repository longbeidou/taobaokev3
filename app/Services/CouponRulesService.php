<?php

namespace App\Services;

use App\Repositories\Contracts\TbkdgitemcoupongetInterface;

class CouponRulesService
{
  protected $couponRuleService;

  function __construct(TbkdgitemcoupongetInterface $couponRule)
  {
    $this->couponRuleService = $couponRule;
  }

  // 根据id获取信息
  public function getItemById($id)
  {
    return $this->couponRuleService->getItemById($id);
  }
}
