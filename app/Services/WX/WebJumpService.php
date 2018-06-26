<?php

namespace App\Services\WX;

use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Services\Share\CheckSourceClient;
use App\Services\Share\TpwdService;

class WebJumpService
{
  const TQG_URL_PREFIX = 'https://s.click.taobao.com/t'; // 淘抢购网址的前缀
  public $client;
  public $tpwd;

  public function __construct(AlimamaRepositoryInterface $alimama, CheckSourceClient $client, TpwdService $tpwd)
  {
    $this->alimamaRepository = $alimama;
    $this->client = $client;
    $this->tpwd = $tpwd;
  }

  // 是否展示链接跳转按钮
  public function showClient($canShowClientArr = ['pc', 'wx'])
  {
    $client = $this->client->from();

    return in_array($client, $canShowClientArr);
  }
}
