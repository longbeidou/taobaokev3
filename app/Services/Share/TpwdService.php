<?php

namespace App\Services\Share;

use App\Repositories\Contracts\AlimamaRepositoryInterface;

/**
 * 处理淘口令
 */
class TpwdService
{
  public $alimamaRepository;

  public function __construct(AlimamaRepositoryInterface $alimama)
  {
    $this->alimamaRepository = $alimama;
  }

  // 获取考口令对应的商品名称
  public function getGoodsTitle($str)
  {
    $str = str_replace(PHP_EOL, '', $str);
    $str = $this->filterStrByBookmark($str);

    return $str;
  }

  // 根据【包邮】 【在售价】 来获取可能的商品名称
  public function filterStrByBookmark($str)
  {
    $r = explode('【包邮】', $str);
    $r = explode('【在售价】', $r[0]);

    return trim($r[0]);
  }

  // 根据配置参数来获取淘口令，优先以configure中的tpwd参数为主
  public function makeTpwdByConfigureStandard($link, $itemInfo = null)
  {
    $tpwdConfig = config('taobaoke.tpwd');
    $tpwdPara = [
      'logo' => empty($tpwdConfig['logo']) ? $itemInfo->pict_url : $tpwdConfig['logo'],
      'text' => empty($tpwdConfig['text']) ? $itemInfo->title : $tpwdConfig['text'],
      'user_id' => $tpwdConfig['user_id'],
    ];
    $tpwdPara['url'] = $link;

    return $this->alimamaRepository->taobaoWirelessShareTpwdCreate($tpwdPara);
  }
}
