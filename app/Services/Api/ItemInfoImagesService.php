<?php

namespace App\Services\Api;

/**
 * 生成优惠券分享的海报图片
 */
class ItemInfoImagesService
{
  public $user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; .NET CLR 1.1.4322)";
  // 获取外部链接的信息
  public function getOutUrlInfo ($out_url)
  {
    $ch = curl_init();

    // 设置选项，包括url
    curl_setopt($ch, CURLOPT_URL, $out_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);

    //执行并获取HTML文档内容
    $output = curl_exec($ch);

    //释放curl句柄
    curl_close($ch);

    return $output;
  }

  // 获取目标信息
  public function getImages ($goods_id)
  {
    $images = $this->getKeMaiDeInfo($goods_id);
    $images === false ? $result = false : $result = $images;

    return $result;
  }

  // m.kemaide.com的商品详情页信息
  public function getKeMaiDeInfo ($goods_id)
  {
    $url = 'https://m.kemaide.com/item/productinfo/numiid/'.$goods_id.'.html';
    $allInfo = $this->getOutUrlInfo($url);
    $content = json_decode($allInfo)->content;
    $content === '' ? $result = false : $result = $content;

    return $result;
  }
}
