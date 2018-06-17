<?php

namespace App\Services\WX;

use App\Services\Share\GuessYouLikeService;

class SearchService
{
  public $guessYouLike;

  public function __construct(GuessYouLikeService $guess)
  {
    $this->guessYouLike = $guess;
  }

  // 获取猜你喜欢的优惠券数量
  public function guessYouLike($adzonId, $num)
  {
    return $this->guessYouLike->coupons($adzonId, $num);
  }
}
