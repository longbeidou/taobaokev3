<?php

namespace App\Services\PC;

use App\Services\WX\ItemInfoService as ItemInfo;

class ItemInfoService extends ItemInfo
{
    // 制作优惠券领券链接
    public function makeCouponLink($paras)
    {
        $result = null;
        $domain = 'https://uland.taobao.com/coupon/edetail?';
        $paraArr = (array)$paras;

        // 来自优惠券api的优惠券参数
        if (!empty($paraArr['e']) && !empty($paraArr['traceId'])) {
          $linkParaStr = $this->makeParasToStr($paras);
          $result = $domain.$linkParaStr;
        }

        // 来自通用搜索api的优惠券参数
        if(
          !empty($paraArr['e']) &&
          !empty($paraArr['app_pvid']) &&
          !empty($paraArr['ptl']) &&
          !empty($paraArr['mt']) &&
          !empty($paraArr['union_lens'])
        ) {
          $linkParaStr = $this->makeParasToStr($paras);
          $result = $domain.$linkParaStr;
        }

        return $result;
    }

    // 组合参数
    public function makeParasToStr($paras)
    {
        $result = [];
        foreach ($paras as $key => $value) {
          $result[] = $key.'='.$value;
        }
        return implode('&', $result);
    }
}
