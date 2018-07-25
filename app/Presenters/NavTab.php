<?php

namespace App\Presenters;

class NavTab
{
    // 判断导航条的栏目是否是当前的访问状态，如果是则返回 active
    public function pcNavTabActive($targetURL, $currentURL = null)
    {
        $active = 'active';

        if ($currentURL === null) {
            $currentURL = url()->current();
        }
        // 搜素情况的返回
        if ($targetURL == route('pc.search.index')) {
            $group = [
              route('pc.search.all'),
              route('pc.search.tmall'),
              route('pc.search.ju'),
              route('pc.search.tpwd'),
            ];
            if (in_array($currentURL, $group)) {
              return $active;
            }
        }
        // 判断是否是优惠券直播、母婴专场、大牌券的访问
        $group = array(
          route('pc.optimusMaterial.zhibo'),
          route('pc.optimusMaterial.brand'),
          route('pc.optimusMaterial.baby')
        );
        if (in_array($targetURL, $group)) {
          if (stripos($currentURL, $targetURL) !== false) {
              return $active;
          }
        }
        // 判断拼团的详情页
        if ($targetURL == route('pc.optimusMaterial.pintuan') && stripos($currentURL, route('pc.itemInfo.pinTuanInfo'))  !== false) {
          return $active;
        }

        return $targetURL == $currentURL ? $active : '';
    }
}
