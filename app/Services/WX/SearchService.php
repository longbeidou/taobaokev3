<?php

namespace App\Services\WX;

use App\Services\Share\GuessYouLikeService;
use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Services\Share\TpwdService;

class SearchService
{
  public $guessYouLike;
  public $alimama;
  public $tpwdService;

  public function __construct(GuessYouLikeService $guess, AlimamaRepositoryInterface $alimama, TpwdService $tpwd)
  {
    $this->guessYouLike = $guess;
    $this->alimama = $alimama;
    $this->tpwdService = $tpwd;
  }

  // 获取猜你喜欢的优惠券数量
  public function guessYouLike($adzonId, $num)
  {
    return $this->guessYouLike->coupons($adzonId, $num);
  }

  // 默认搜索（淘宝+天猫）
  public function all($para)
  {
    $para['has_coupon'] = 'true';

    if (empty($para['sort'])) {
      unset($para['sort']);
    } else {
      $para['sort'] = $this->getSortValue($para['sort']);
    }

    $result = $this->alimama->taobaoTbkDgMaterialOptional($para);

    if (empty($result)) {
      return [];
    }

    return $result;
  }

  // 至搜索天猫
  public function tmall($para)
  {
    $para['has_coupon'] = 'true';
    $para['is_tmall'] = 'true';

    if (empty($para['sort'])) {
      unset($para['sort']);
    } else {
      $para['sort'] = $this->getSortValue($para['sort']);
    }

    $result = $this->alimama->taobaoTbkDgMaterialOptional($para);

    if (empty($result)) {
      return [];
    }

    return $result;
  }

  // 搜索聚划算的商品
  public function ju($para)
  {
    $result = $this->alimama->taobaoJuItemsSearch($para);

    if (empty($result)) {
      return [];
    }

    return $result;
  }

  // 获取解析淘口令
  public function tpwdQuery($str)
  {
    $tpwdResult = $this->alimama->taobaoWirelessShareTpwdQuery($str);

    if (empty($tpwdResult)) {
      return '';
    }

    return $tpwdResult->content;
  }

  // 获取sort的值
  public function getSortValue($para)
  {
    switch ($para) {
      case 'price':
        $sort = 'price_asc';
        break;

      case 'sales':
        $sort = 'total_sales_des';
        break;

      case 'commi':
        $sort = 'tk_total_commi_des';
        break;

      default:
        $sort = '';
    }

    return $sort;
  }

  // 获取淘口令对应的商品名称
  public function getGoodsTitle($str)
  {
    return empty($str) ? '' : $this->tpwdService->getGoodsTitle($str);
  }
}
