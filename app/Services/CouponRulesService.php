<?php

namespace App\Services;

use App\Repositories\Contracts\TbkdgitemcoupongetInterface;

class CouponRulesService
{
  public $couponRuleService;

  function __construct(TbkdgitemcoupongetInterface $couponRule)
  {
    $this->couponRuleService = $couponRule;
  }

  // 根据id获取信息
  public function getItemById($id)
  {
    return $this->couponRuleService->getItemById($id);
  }

  // 更新或创建商品分类规则
  public function updateOrCreateItem($data)
  {
    return $this->couponRuleService->updateOrCreateItem($data);
  }
}
