<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;

class ImageService
{
  public function __construct(AlimamaRepositoryInterface $alimama)
  {
    $this->alimamaRepository = $alimama;
  }

  // 获取指定id的商品信息
  public function itemInfo($para)
  {
    return $this->alimamaRepository->taobaoTbkItemInfoGet($para);
  }

  // 获取生成图片需要的信息
  public function imageInfo($itemInfo, $requestArr)
  {
    $info = [];

    if (empty($itemInfo))
    {
      return [];
    }

    $info['pict_url'] = $itemInfo->pict_url;
    $info['title'] = $itemInfo->title;
    $info['zk_final_price'] = $itemInfo->zk_final_price;
    $info['num_iid'] = $itemInfo->num_iid;
    $info['coupon_amount'] = empty($requestArr['couponAmount']) ? null : $requestArr['couponAmount'];

    return (object)$info;
  }
}
