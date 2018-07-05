<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;

class OptimusMaterialService
{
  public $alimama;

  public function __construct(AlimamaRepositoryInterface $alimama)
  {
     $this->alimama = $alimama;
  }

  // 获取淘宝客物料下行-导购的数据
  public function getItems($para)
  {
    $result = $this->alimama->taobaoTbkDgOptimusMaterial($para);

    return $result;
  }
}
