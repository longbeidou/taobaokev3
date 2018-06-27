<?php

namespace App\Presenters;

class JuPresenter
{
  // 获取淘抢购链接的参数
  public function getParasStrFromWapUrl($click_url)
  {
    $para = explode('?e=', $click_url);

    return empty($para[1]) ? '' : urlencode($para[1]);
  }
}
