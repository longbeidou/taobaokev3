<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Services\Share\CheckSourceClient;
use App\Services\Share\TpwdService;
use Carbon\Carbon;

class CouponActionService
{
  const TAOBAO_DOMAIN = '//uland.taobao.com/coupon/edetail';
  public $alimamaRepository;
  public $client;
  public $tpwd;

  public function __construct(AlimamaRepositoryInterface $alimama, CheckSourceClient $client, TpwdService $tpwd)
  {
    $this->alimamaRepository = $alimama;
    $this->client = $client;
    $this->tpwd = $tpwd;
  }

  // 获取优惠券链接
  public function couponLink($paraArr)
  {
    return $this->linkFromPara($paraArr);
  }

  // 获取优惠券短连接
  public function shortCouponLink($couponLink)
  {
    return $couponLink;
  }

  // 通过传参的方式获取优惠券的链接
  public function linkFromPara($paraArr)
  {
    $result = $this->couponLinkPrar($paraArr);

    $paraArrNew = [];
    foreach ($result  as $para => $value) {
      $paraArrNew[] = $para.'='.$value;
    }

    return self::TAOBAO_DOMAIN.'?'.implode('&', $paraArrNew);
  }

  // 获取优惠券链接的参数
  public function couponLinkPrar($paraArr)
  {
    $result = [];

    // 来自优惠券api的优惠券参数
    if (!empty($paraArr['e']) && !empty($paraArr['traceId'])) {
      $result['e'] = $paraArr['e'];
      $result['traceId'] = $paraArr['traceId'];
    }

    // 来自通用搜索api的优惠券参数
    if(
      !empty($paraArr['e']) &&
      !empty($paraArr['app_pvid']) &&
      !empty($paraArr['ptl']) &&
      !empty($paraArr['mt']) &&
      !empty($paraArr['union_lens'])
    ) {
      $result['e'] = $paraArr['e'];
      $result['app_pvid'] = $paraArr['app_pvid'];
      $result['ptl'] = $paraArr['ptl'];
      $result['mt'] = $paraArr['mt'];
      $result['union_lens'] = $paraArr['union_lens'];
    }

    return $result;
  }

  // 获取js实现跳转的链接数组
  public function linkPara($link)
  {
    $linkPara = [];
    $linkPara[] = substr($link, 0, 5);
    $linkPara[] = substr($link, 5, 5);
    $linkPara[] = substr($link, 10, 5);
    $linkPara[] = substr($link, 15);

    return $linkPara;
  }

  // 制作淘口令
  public function makeTpwd($link, $itemInfo = null)
  {
    return $this->tpwd->makeTpwdByConfigureStandard($link, $itemInfo);
  }

  // 获取对应id的商品信息
  public function itemInfo($id)
  {
    return $this->alimamaRepository->taobaoTbkItemInfoGet(['num_iids' => $id, 'platform' => '2']);
  }

  // 是否展示链接跳转按钮
  public function showClient($canShowClientArr = ['pc', 'wx'])
  {
    $client = $this->client->from();

    return in_array($client, $canShowClientArr);
  }
}
