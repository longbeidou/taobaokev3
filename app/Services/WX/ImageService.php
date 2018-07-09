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

  // 获取生成聚划算拼团图片需要的信息
  public function imagePinTuanInfo($itemInfo, $requestArr)
  {
    $info = [];

    if (empty($itemInfo))
    {
      return [];
    }

    if (empty($requestArr['pintuan_info'])) {
      return $this->imageInfo($itemInfo, $requestArr);
    }

    $pintuanInfo = $this->pintuanInfo($requestArr['pintuan_info']);
    $info['pict_url'] = $itemInfo->pict_url;
    $info['title'] = $itemInfo->title;
    $info['num_iid'] = $itemInfo->num_iid;
    $info['zk_final_price'] = $pintuanInfo->orig_price;
    $info['coupon_amount'] = $pintuanInfo->orig_price - $pintuanInfo->jdd_price;
    $info['tpwd'] = empty($requestArr['tpwd']) ? '' : $requestArr['tpwd'];

    return (object)$info;
  }

  // 获取拼团的信息，由字符串转化而来
  public function pintuanInfo($pintuanStr)
  {
      $pintuanArr = explode('and', $pintuanStr);
      $pintuanInfo['ostime'] = $pintuanArr[0];
      $pintuanInfo['oetime'] = $pintuanArr[1];
      $pintuanInfo['orig_price'] = $pintuanArr[2];
      $pintuanInfo['jdd_price'] = $pintuanArr[3];

      return (object)$pintuanInfo;
  }
}
