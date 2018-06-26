<?php

namespace App\Presenters;

class JuPresenter
{
  // 获取淘抢购链接的参数
  public function getParasStrFromWapUrl($click_url)
  {
    $url = str_replace('taobao', 'jd', $click_url);

    return urlencode($url);
  }
}
