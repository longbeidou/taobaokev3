<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\OptimusMaterialService;

class OptimusMaterialController extends Controller
{
    public $repository;
    public $rulesArr;

    public function __construct(OptimusMaterialService $repository)
    {
      $this->repository = $repository;
      $this->rulesArr = config('category');
    }

    // 好券直播
    public function zhibo($id)
    {
      if ($id < 0 || $id > 10) {
        abort(404);
      }

      $title = '淘宝天猫优惠券直播专场';
      $allInfo = $this->rulesArr[0];
      $items = $this->repository->getItems($allInfo['rules'][$id]);

      dd($items);
    }

    // 品牌券
    public function brand($id)
    {
      if ($id < 0 || $id > 10) {
        abort(404);
      }

      $title = '大牌淘宝内部优惠券专场';
      $allInfo = $this->rulesArr[1];
      $items = $this->repository->getItems($allInfo['rules'][$id]);

      dd($items);
    }

    // 母婴专场
    public function baby($id)
    {
      if ($id < 0 || $id > 5) {
        abort(404);
      }

      $title = '母婴类淘宝优惠券专场';
      $allInfo = $this->rulesArr[2];
      $items = $this->repository->getItems($allInfo['rules'][$id]);

      dd($items);
    }

    // 聚划算拼团
    public function pintuan()
    {
      $title = '聚划算拼团专场';
      $allInfo = $this->rulesArr[3];
      $items = $this->repository->getItems($allInfo['rules'][0]);

      dd($items);
    }

    // 特惠
    public function sales()
    {
      $title = '特价淘宝天猫优惠券专场';
       $allInfo = $this->rulesArr[6];
       $items = $this->repository->getItems($allInfo['rules'][0]);

       dd($items);
    }

    // 潮流范
    public function fashion()
    {
      $title = '淘宝天猫优惠券潮流范专场';
      $allInfo = $this->rulesArr[4];
      $items = $this->repository->getItems($allInfo['rules'][0]);

      dd($items);
    }

    // 有好货
    public function recommend()
    {
      $title = '淘宝内部优惠券推荐专场';
      $allInfo = $this->rulesArr[5];
      $items = $this->repository->getItems($allInfo['rules'][0]);

      dd($items);
    }
}
