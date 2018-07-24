<?php

namespace App\Services\PC;

use App\Services\WX\OptimusMaterialService as OptimusMaterial;
use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Services\Share\GuessYouLikeService;

class OptimusMaterialService extends OptimusMaterial
{
    public $alimama;
    public $guessYouLike;

    public function __construct(AlimamaRepositoryInterface $alimama, GuessYouLikeService $guessYouLike)
    {
        $this->alimama = $alimama;
        $this->guessYouLike = $guessYouLike;
    }

    // 获取猜你喜欢的优惠券数量
    public function guessYouLike($adzonId, $num)
    {
        return $this->guessYouLike->coupons($adzonId, $num);
    }
}
