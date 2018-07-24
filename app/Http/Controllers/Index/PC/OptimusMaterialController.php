<?php

namespace App\Http\Controllers\Index\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PC\OptimusMaterialService;

// use Taobaoke;

class OptimusMaterialController extends Controller
{
    const GUESS_YOU_LIKE_NUM = '10';
    const PAGE_SIZE = '100';

    public $repository;
    public $rulesArr;
    public $guessYouLikeAdzoneId; // 猜你喜欢

    public function __construct(OptimusMaterialService $repository)
    {
      $this->repository = $repository;
      $this->rulesArr = config('category');
      $this->guessYouLikeAdzoneId = config('adzoneID.pc_coupon_guess_you_like');
    }

    // 好券直播
    public function zhibo($id)
    {
      if ($id < 0 || $id > 10) {
        abort(404);
      }

      $category = $this->repository->getCategoryName(0, $id);
      $title = empty($category) ? '淘宝天猫优惠券直播专场' : $category.'-'.'淘宝天猫优惠券直播专场';
      $currentId = $id;
      $allInfo = $this->rulesArr[0];
      $requestPara = $allInfo['rules'][$id];
      unset($requestPara['page_size']);
      $requestPara['page_size'] = self::PAGE_SIZE;
      $optimusMaterialItems = $this->repository->getItems($requestPara);
      $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

      return view('pc.material.index_zhibo', compact('title', 'allInfo', 'currentId', 'optimusMaterialItems', 'requestPara', 'guessYouLikeItems'));
    }

    // 品牌券
    public function brand($id)
    {
      if ($id < 0 || $id > 10) {
        abort(404);
      }

      $category = $this->repository->getCategoryName(1, $id);
      $title = empty($category) ? '大牌淘宝内部优惠券专场' : $category.'-'.'大牌淘宝内部优惠券专场';
      $currentId = $id;
      $allInfo = $this->rulesArr[1];
      $requestPara = $allInfo['rules'][$id];
      unset($requestPara['page_size']);
      $requestPara['page_size'] = self::PAGE_SIZE;
      $optimusMaterialItems = $this->repository->getItems($requestPara);
      $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

      return view('pc.material.index_brand', compact('title', 'allInfo', 'currentId', 'optimusMaterialItems', 'requestPara', 'guessYouLikeItems'));
    }

    // 母婴专场
    public function baby($id)
    {
      if ($id < 0 || $id > 5) {
        abort(404);
      }

      $category = $this->repository->getCategoryName(2, $id);
      $title = empty($category) ? '母婴类淘宝优惠券专场' : $category.'-'.'母婴类淘宝优惠券专场';
      $currentId = $id;
      $allInfo = $this->rulesArr[2];
      $requestPara = $allInfo['rules'][$id];
      unset($requestPara['page_size']);
      $requestPara['page_size'] = self::PAGE_SIZE;
      $optimusMaterialItems = $this->repository->getItems($requestPara);
      $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

      return view('pc.material.index_baby', compact('title', 'allInfo', 'currentId', 'optimusMaterialItems', 'requestPara', 'guessYouLikeItems'));
    }

    // 聚划算拼团
    public function pintuan()
    {
      $title = '聚划算拼团专场';
      $allInfo = $this->rulesArr[3];
      $requestPara = $allInfo['rules'][0];
      $items = $this->repository->getItems($allInfo['rules'][0]);

      return view('wx.material.index_pintuan', compact('title', 'allInfo', 'items', 'requestPara'));
    }

    // 特惠
    public function sales()
    {
       $title = '特价淘宝天猫优惠券专场';
       $allInfo = $this->rulesArr[6];
       $requestPara = $allInfo['rules'][0];
       unset($requestPara['page_size']);
       $requestPara['page_size'] = self::PAGE_SIZE;
       $optimusMaterialItems = $this->repository->getItems($requestPara);
       $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

       return view('pc.material.index_common', compact('title', 'name', 'allInfo', 'optimusMaterialItems', 'requestPara', 'guessYouLikeItems'));
    }

    // 潮流范
    public function fashion()
    {
      $title = '淘宝天猫优惠券潮流范专场';
      $allInfo = $this->rulesArr[4];
      $requestPara = $allInfo['rules'][0];
      unset($requestPara['page_size']);
      $requestPara['page_size'] = self::PAGE_SIZE;
      $optimusMaterialItems = $this->repository->getItems($requestPara);
      $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

      return view('pc.material.index_common', compact('title', 'name', 'allInfo', 'optimusMaterialItems', 'requestPara', 'guessYouLikeItems'));
    }

    // 有好货
    public function recommend()
    {
      $title = '淘宝内部优惠券推荐专场';
      $allInfo = $this->rulesArr[5];
      $requestPara = $allInfo['rules'][0];
      unset($requestPara['page_size']);
      $requestPara['page_size'] = self::PAGE_SIZE;
      $optimusMaterialItems = $this->repository->getItems($requestPara);
      $guessYouLikeItems = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, self::GUESS_YOU_LIKE_NUM);

      return view('pc.material.index_common', compact('title', 'name', 'allInfo', 'optimusMaterialItems', 'requestPara', 'guessYouLikeItems'));
    }
}
